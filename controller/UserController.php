<?php

/* 
 * * #4.1    5 min 13 sec
 * Контроллер функций модуля
 */

//include_once '../models/CategoriesModel.php';
//include_once '../models/UsersModel.php';
//include_once '../models/OrderModel.php';


/**  # 4.2   15 min 58 sec
 * 
 */
 
function  registerAction(){ // ajax метод вызывается из js 
    
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    
    $pwd1  = isset($_REQUEST['pwd1'])  ? $_REQUEST['pwd1'] : null;
    $pwd2  = isset($_REQUEST['pwd2'])  ? $_REQUEST['pwd2'] : null;
    
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    
    $name  = isset($_REQUEST['name'])  ? $_REQUEST['name'] : null;
    $name  = trim($name);
    $adress  = isset($_REQUEST['adress'])  ? $_REQUEST['adress'] : null;
    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2); // проверка входных параметров
    
    
    // проверка почты, если ошибки нет!!! , то дальше по блоку
    if ( ! $resData && checkUserEmail($email)) {
        $resData['success'] = false;
        $resData['message'] = "Пользователь с таким email ('{$email}') уже зарегистрирован";
        
    }
    
    # 4.3 3 min 45 sec
    
    if ( ! $resData ){ // вносим пороль  в db
        $pwdMD5 = md5($pwd1); // создаем пременную и кодируем без обратного шифрования, 
        //получаем хеш пароля в строке
        
        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress); // вызываем функцию, 
        //которая записывает новые данные в таблицу 
        //и ввиде массива передает данные
        
        # 4.3 6 min 3 sec 
        // проверка регистрации
        
        if($userData['success']){
            $resData['message'] = 'Пользователь успешно зарегистрирован';
            $resData['success'] = 1;
            
            $userData = $userData[0]; // упрощение запроса 6 min 49 sec
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            // заполняем результирующее данные, если в массиве есть имя, то добавляем имя, иначе email в качестве логина
            $resData['userEmail'] = $email;
            
            // создаем сесионную переменную и присваиваем ей данные о пользователе
            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];// заполняем результирующее данные,
            // добавляя 'displayName'
        } else {// в противном случае при ощибке 'success'  = 0
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка регистрации';
        }
    }
    
    echo json_encode($resData); // подведение итогов по коду !!! 4.3 10 min 43 sec
     
}

/**
 * разлогинивание пользователя
 * 
 */

function logoutAction(){
    if(isset($_SESSION['user'])){
       unset($_SESSION['user']);
       unset($_SESSION['cart']);
    }
    redirect('/');
}

/*
 * AJAX  авторизация пользователя
 * @return json массив данных пользователя # 4.5 4 min
 */

function loginAction (){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
     
    $pwd  = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
    $pwd  = trim($pwd);
    
    $userData = loginUser($email, $pwd);
    //d($email);
    if($userData['success']){ // если есть 'success', то выполняем дальше
        $userData = $userData[0];
        
        //#4.6     10 min 13 sec
        $_SESSION['user'] = $userData; //инициализируем сессионую переменную user  и присваем  $userData
        // которые пришли из userModel
        $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        // к сессионой переменной user добавляем ключ displayName
        $resData = $_SESSION['user']; // массив  $resData и  записываем  в него $_SESSION['user']
        $resData['success'] = 1;
        
        //$resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'] ;
        //$resData['userEmail'] = $email;
         //# 4. 5      13 min 45 sec 
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Неверный логин или пароль';
    }
     
    echo json_encode($resData);
}
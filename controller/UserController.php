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
    d($_REQUEST['email']);
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
 * @return json массив данных пользователя # 4.5 4 min 20 sec
 */

function loginAction (){
     // передаем из js методом post
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    $pwd  = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
    $pwd  = trim($pwd);
    
    $userData = loginUser($email, $pwd);
    
    if($userData['success']){ // если есть 'success', то выполняем дальше
        $userData = $userData[0];
        
        //#4.6     10 min 13 sec
        $_SESSION['user'] = $userData; //инициализируем сессионую переменную user  и присваем  $userData
        // которые пришли из userModel и храним в сессии
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
/**
 * Формирование главной страницы пользователя
 * @param объект $smarty шаблонизатор
 */
function indexAction ($smarty){
    //echo "Тест - . Cтраница пользователя";
   
    //если пользователь не залогинен редирект на главную
    if(!isset($_SESSION['user'])){
        redirect('/'); //перенаправление на главную страницу сайта
        //получаем список категорий из меню
       }
        $rsCategories = getAllMainCatsWithChildren();
         
        $smarty->assign('pageTitle','Страница пользователя');
        $smarty->assign('rsCategories', $rsCategories);
        //d($smarty);
        loadTemplate($smarty, 'header'); // шаблон заголовка
        loadTemplate($smarty, 'user'); //шаблон центра страницы пользователя
        loadTemplate($smarty, 'footer'); // 'шаблоны страниц'
    
}
/**
 * Обновление данных пользователя
 */
function updateAction (){
    // если пользователь не залогинился, выходим
//    if( !isset($_SESSION['user'])) {
//        redirect('/');
//    }
//    
     
    if(isset($_SESSION['user'])){
       unset($_SESSION['user']);
       unset($_SESSION['cart']);
    }
  

    
    // инициализация переменных
    $resData = array(); // массив в формате json
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null; 
    // данные которые пришли POST(безопаснее!) или GET
    // $phone = isset($_POST['phone']) ? $_$_POST['phone'] : null; 
    //инициализация переменных
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    $curPwd = isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd'] : null;
    
    //проверка правильности пароля (введеный и тот под которым залогинились)
    # 4.10   min 6 05 sec
    $curPwdMD5 = md5($curPwd);
    if( ! $curPwd || ($_SESSION['user']['pwd'] != $curPwdMD5)){
        $resData['success'] = 0;
        $resData['message'] = 'Текущий пароль не верный';
        echo json_encode($resData);
        return FALSE;
    } 
    
    #4.10 min 6 min
    // обновление данных пользователя
    $res = updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwdMD5);
        if($res){
            $resData['success']  = 1; #4.10  10 min 10 sec оттступление по теме качественный код
            $resData['message']  = 'Данные сохранены';
            $resData['userName'] = $name;
            
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['phone'] = $phone;
            $_SESSION['user']['adress'] = $adress;
            
            #4.11   min 11.35
            $newPwd = $_SESSION['user']['pwd']; //новый пароль
            if($pwd1 &&($pwd1 == $pwd2)) {
            $newPwd = trim($pwd1);
    }
    
            $_SESSION['user']['pwd'] = $newPwd;
            $_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];
        } else {
            $resData['success']  = 0;
            $resData['message']  = 'Ошибка сохранения данных';
        }
          
        echo json_encode($resData);
    }

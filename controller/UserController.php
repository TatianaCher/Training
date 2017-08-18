<?php

/* 
 * * #4.1    5 min 13 sec
 * Контроллер функций модуля
 */

//include_once '../models/CategoriesModel.php';
//include_once '../models/UsersModel.php';
//include_once '../models/OrderModel.php';


/**  # 4.2   15 min 58 sec
 * Инициализация сессионной пременной  $_SESSION['user']
 * 
 * return json массив данных нового пользователя
 */
 

function  registerAction(){ // ajax метод вызывается из main js передает данные пользователя
    
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
   
    $pwd1  = isset($_REQUEST['pwd1'])  ? $_REQUEST['pwd1'] : null;
    $pwd2  = isset($_REQUEST['pwd2'])  ? $_REQUEST['pwd2'] : null;
    
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    
    $name  = isset($_REQUEST['name'])  ? $_REQUEST['name'] : null;
    $name  = trim($name);

    $resData = null;// промежуточне данные об  успехах или ошибках      18 33
    $resData = checkRegisterParams($email, $pwd1, $pwd2); // проверка входных параметров
    
    
    // проверка почты, если ошибки нет!!! , то дальше по блоку
    $chEmail = checkUserEmail($email);
    if ( ! $resData && $chEmail ) {
        $resData['success'] = false;
        $resData['message'] = "Пользователь с таким email ('{$email}') уже зарегистрирован";
        
    }
    
    # 4.3 3 min 45 sec
    
    if ( ! $resData ){ // вносим пороль в db
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
    
    echo json_encode($resData); // подведение итогов покоду !!! 4.3 10 min 43 sec
    
}


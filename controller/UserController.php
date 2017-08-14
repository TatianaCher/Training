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
function  registerAction(){
    
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    
    $pwd1  = isset($_REQUEST['pwd1'])  ? $_REQUEST['pwd1'] : null;
    $pwd2  = isset($_REQUEST['pwd2'])  ? $_REQUEST['pwd2'] : null;
    
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    
    $name  = isset($_REQUEST['name'])  ? $_REQUEST['name'] : null;
    $name  = trim($name);

    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);
     
}


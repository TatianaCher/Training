<?php

/** 
 * инициализация подключение к базе данных
 */


//подключение к БД
$db = mysqli_connect('127.0.0.1', 't', '1', 'my_shop');

if (mysqli_connect_errno()){
    echo 'Ошибка подключения к MySql ('.mysqli_connect_errno().'): ' . mysqli_connect_error();
    exit();
}
//if ( ! mysqli_select_db($db, 'my_shop')){
//    echo "Ошибка доступа в базе данных:('my_shop')";
//    exit();
//}


<?php

/** 
 * инициализация подключение к базе данных
 */

$host="127.0.0.1";
$dbname="my_shop";
$user="t";
$password="1";
$charset = "utf8";



//подключение к БД
$db = new mysqli($host, $user, $password, $dbname);

//if (mysqli_connect_errno()){
//    echo 'Ошибка подключения к MySql ('.mysqli_connect_errno().'): ' . mysqli_connect_error();
//    exit();
//}
// 

 if ($db->connect_errno)   die('Не удалось подключится к MySQL.') ;
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
$db = mysqli_connect($host, $user, $password, $dbname);

if (mysqli_connect_errno()){
    echo 'Ошибка подключения к MySql ('.mysqli_connect_errno().'): ' . mysqli_connect_error();
    exit();
}
if (! mysqli_select_db($db, $dbname)){
    echo "Ошибка доступа в базе данных:($dbname)";
    exit();
}

//$host="127.0.0.1";
//$user="t";
//$password="1";
//$dbname="my_shop";
//
//$con = new mysqli($host, $user, $password, $dbname)
//	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

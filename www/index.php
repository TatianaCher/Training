<?php session_start();
// если в сессии нет массива корзины, то создаем его
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array(); //инициализация переменной и присваение массива
}




include_once '../config/config.php';// Инициализация настроек

include_once '../config/db.php';// Инициализация бд
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';
//include_once '../models/OrderModel.php';
include_once '../library/mainFunctions.php'; //Основные функции

#определяем с каким контролерром будет работать
$controllerName = isset($_GET['controller'])? ucfirst($_GET['controller']):'Index';
 
# определяем с какой функцией будет работать в контроллере
$actionName = isset($_GET['action'])? $_GET['action'] :'index';


 // если в сессии есть данные об авторизированном  пользователе, то передаем их в шаблон
// # 4.7    3 min 30 sec

if(isset($_SESSION['user'])){
    $smarty->assign('arUser', $_SESSION['user']);
}


// инициализируем переменную шаблонизатора  cartCntItems количества элементов в корзине,функция count

$smarty->assign('cartCntItems', count($_SESSION['cart'])); 
 // вычисляем количество элементов корзине $cartCntItems

loadPage($smarty, $controllerName, $actionName);
 
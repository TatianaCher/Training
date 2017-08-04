<?php
session_start();// стартуеем сессию


 
// если в сессии нет массива корзины то создаем его
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}



include_once '../config/config.php';// Инициализация настроек

include_once '../config/db.php';// Инициализация бд
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';
include_once '../library/mainFunctions.php'; //Основные функции
#определяем с каким контролерром будет работать

$controllerName = isset($_GET['controller'])? ucfirst($_GET['controller']):'Index';
 
# определяем с какой функцией будет работать
$actionName = isset($_GET['action'])? $_GET['action'] :'index';
 echo count($_SESSION['cart']);
// инициализируем переменную шаблонизатора  cartCntItems количества элементов в корзине,функция count
$smarty->assing('cartCntItems', count($session_start)); // не работает

       
loadPage($smarty, $controllerName, $actionName);
 
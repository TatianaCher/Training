<?php

include_once '../config/config.php';// Инициализация настроек

include_once '../config/db.php';// Инициализация бд
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';
include_once '../library/mainFunctions.php'; //Основные функции
#определяем с каким контролерром будет работать

$controllerName = isset($_GET['controller'])? ucfirst($_GET['controller']):'Index';
 
# определяем с какой функцией будет работать
$actionName = isset($_GET['action'])? $_GET['action'] :'index';
 
loadPage($smarty, $controllerName, $actionName);
 
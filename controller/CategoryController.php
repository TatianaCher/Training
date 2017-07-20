<?php

/* 
 * Контролер страницы категорий (/category/1)
 */

//include_once '../models/CategoriesModel.php';
//include_once '../models/ProductsModel.php';

function indexAction($smarty){
   
$catID = isset($_GET['id'])? usfirst($_GET['id']):null;
    if($catID == null) exit(); // if( !$catID) exit();

    //echo "Test_ {$catID}";
    
    $rsCategory = getCatById($catID);
}
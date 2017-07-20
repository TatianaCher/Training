<?php

/* 
 * Контролер страницы категорий (/category/1)
 */

//include_once '../models/CategoriesModel.php';
//include_once '../models/ProductsModel.php';

function indexAction($smarty){
   
    $catId = isset($_GET['id']) ? $_GET['id'] : null;
    if($catId == null) exit(); // if( !$catID) exit();

    $rsCategory = getCatById($catId);
    //d($rsCategory);
    /**
     * если главная категория, то показываем дочернии категории, 
     * иначе показываем товар
     */
    if($rsCategory['parent_id'] == 0){
        $rsChildCats = get_ChildrenForCat($catId);
    } else {
        $rsProducts = getProductsByCat($catId);//#3.1.2
    }
    //d($rsChildCats);
}
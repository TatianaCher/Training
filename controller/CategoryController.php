<?php

/* 
 * Контролер страницы категорий (/category/1)
 */

//include_once '../models/CategoriesModel.php';
//include_once '../models/ProductsModel.php';

/**
 * формирование страницы категорий
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty){
   
    $catId = isset($_GET['id']) ? $_GET['id'] : null;
    if($catId == null) exit(); // if( !$catID) exit();
    
    
    $rsProducts = null; //странно, но ошибки нет
    $rsChildCats = null;
    $rsCategory = getCatById($catId);
    //d($rsCategory);
    /**
     * если главная категория, то показываем дочернии категории, 
     * иначе показываем товар
     */
    if($rsCategory['parent_id'] == 0){
        $rsChildCats = getChildrenForCat($catId);
    } else {
        $rsProducts = getProductsByCat($catId);//#3.1.2
    }
    //d($rsProducts);
    $rsCategories = getAllMainCatsWithChildren(); //$categories = get_Categories();
     
    $smarty->assign('pageTitle', 'Товары категории' . $rsCategory['name']);
    
    $smarty->assign('rsCategory', $rsCategory);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('rsChildCats', $rsChildCats);//#3.1.2 min 8 sec 13
    
    $smarty->assign('rsCategories', $rsCategories);
    //d($rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
     
}
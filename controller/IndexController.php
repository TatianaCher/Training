<?php

/* 
 * Контроллер загрузки главной страницы
 *  
 */
// подключение модели 
//include_once '../models/CategoriesModel.php';
function testAction() {
    echo 'IndexController.php > testAction';
}


/**
 * формирование главной страницы
 * @param type $smarty шаблонизатор
 */

function indexAction($smarty) {
   
    $rsCategories = getAllMainCatsWithChildren(); //get_Categories(); $categories
 
    $rsProducts = getLastProducts(16);

    
    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);
    
    $smarty->assign('rsProducts', $rsProducts);
    //d($rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
     
}

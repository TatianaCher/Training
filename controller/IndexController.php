<?php

/* 
 * Контроллер загрузки главной страницы
 *  
 */
// подключение модели 
include_once '../models/CategoriesModel.php';
function testAction() {
    echo 'IndexController.php > testAction';
}


/**
 * формирование главной страницы
 * @param type $smarty шаблонизатор
 */

function indexAction($smarty) {
   $rsCategories =  getAllMainCatsChildrens($db);
    d( $rsCategories);
    
    
    
    $smarty->assign('pageTitle', 'Главная страница сайта');
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
     
}

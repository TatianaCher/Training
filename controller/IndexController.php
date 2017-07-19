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
   
    $categories = get_Categories();
   var_dump($categories);

    
    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('categories', $categories);
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
     
}

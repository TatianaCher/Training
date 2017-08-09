<?php

/* 
 * Основные функции
 *  
 */

/**
 *  Формирование запрашиваемой страницы
 * @param type $controllerName название контроллера
 * @param type $actionName название функции обработки страницы
 * @param type $smarty  переменная шаблонизатора
 */

function loadPage($smarty, $controllerName, $actionName = 'index') {
    include_once PathPrefix. $controllerName. PathPosfix;
     
    $function = $actionName . 'Action';
    $function($smarty);
   // var_dump($smarty);
}
/**
 * Загрузка шаблона
 * 
 * @param object $smarty объект шаблонизатора
 * @param string $templateName название файла шаблона
 */
function loadTemplate($smarty, $templateName){
   
    $smarty->display($templateName . TemplatePostfix); 
    #в теле функции вызываем метод display передаем имя шаблона 
    # и присваевам постфикс .tpl 
}
/**
 * /Функция отладки Останавливает работу програмы, 
 *  выводя значение переменной $value
 * @param variant $value переменная вывода на странице
 * @param     $die = 1 программа останавливает загрузку
 * $die = 0 программа продолжает загрузку
 */
function d($value = null, $die = 1) {
    echo 'Debug:<br/> <pre>';
    print_r($value);
    echo '</pre>';
    if ($die) die;
}

/**
 * Преобразование результата работы функции выборки в ассщциативный массив
 * @param recordset $result набор строк -результат работы SELECT
 * @return array Description
 */

function createSmartyRsArray($result){
 
$smartyRs = array ();
         while ($row = $result->fetch_assoc()){
         $smartyRs[]=$row;
}

return $smartyRs;
}
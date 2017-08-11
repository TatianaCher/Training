<?php

/**
 * Модель для таблицы продукции (products)
 * 
 */

/**
 * Получаем последние добавленные товары
 */

function getLastProducts($limits = NULL) {
    
    $query = "SELECT * FROM my_shop.products
              ORDER BY id DESC"; 
               /*была ошибка: указана неправильная таблица, 
               * а также название столбца, поэтому возникала ошибка параметра $row в mianFunction
               */
         if($limits){
             $query .= " LIMIT {$limits}";
         }
         //d($query);
          global $db;
          $result = $db->query($query);
          return createSmartyRsArray($result);
    
}


function  getProductsByCat($itemId){
    
    $itemId = intval($itemId);// образование в число
    $query = "SELECT * FROM my_shop.products 
              where category_id ='{$itemId}'";
    global $db;
    $result = $db->query($query);
    return createSmartyRsArray($result);
}
/**
 * получить данные продукта id
 * @global type $db подключение к базе данных
 * @param integer  $itemId id продукта
 * @return array массив данных продукта
 */
function getProductById($itemId) {
    
    $itemId = intval($itemId);
    $query = "SELECT * FROM my_shop.products 
              where id = '{$itemId}'";
  
    global $db;
    
    $result = $db->query($query);
    //d($result);
    return  $result->fetch_assoc(); // разобраться с получением данных 3.3.2 - 2 min 38 sec 
    
}

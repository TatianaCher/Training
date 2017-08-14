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
/**
 * 3.6 - 6 min 24 sec 
 * @global type $db
 * @param array $itemsIds массив индификаторов продуктов
 * @return array массив данных продуктов
 */ 
function getProductsFromArray($itemsIds){
     
    /*  d($itemsIds); 
     *  Debug: Array
    (
    [1] => 7
    [2] => 2
    [12] => 6
    
    )*/
    $strIds = implode(',  ', $itemsIds);// создает строку id,id,id,id итд
   /*d($strIds);
    * Debug:
    7,  2,  6 
    */
    $query = "SELECT * FROM my_shop.products 
              where id in ({$strIds})";
    global $db;
    
   /* d($query); 
    * SELECT * FROM my_shop.products 
              where id in (7,  2,  6)
    */
    
    $result = $db->query($query);
        
    /*  d($result); 
     *  Debug:
    mysqli_result Object
    (
    [current_field] => 0
    [field_count] => 7
    [lengths] => 
    [num_rows] => 6
    [type] => 0
    )*/
   return createSmartyRsArray($result); //  помещается в котроллер
    
}
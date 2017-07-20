<?php

/**
 * Модель для таблицы продукции (products)
 * 
 */

/**
 * Получаем последние добавленные товары
 */

function getLastProducts($limits = NULL) {
    
    $query = "SELECT * FROM my_shop.categories
              ORDER BY id DESC";
         if($limits){
             $query .= " LIMIT {$limits}";
         }
         //d($query);
          global $db;
          $result = $db->query($query);
          return createSmartyRsArray($result);
    
}


function  getProductsByCat($itemId){
    
    $itemId = intval($itemId);
    $query = "SELECT * FROM my_shop.products 
              where category_id ='{$itemId}'";
    global $db;
    $result = $db->query($query);
    return createSmartyRsArray($result);
}
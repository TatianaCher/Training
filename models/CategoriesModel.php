<?php

/* 
 * Модель для таблицы категорий (categories)
 */


function get_Categories ($link){
    $query = "SELECT * FROM  categories ";

    $result = mysqli_query($link, $query);
  
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
      
  }
  
 $categories = get_Categories($db);
var_dump($categories);
 

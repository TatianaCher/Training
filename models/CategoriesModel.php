<?php

/* 
 * Модель для таблицы категорий (categories)
 */

/** 
 * Получение дочерних категорий для категории $catId
 * @param type integer $catId ID категорий
 */
function getChildrenForCat ($catId){
    $query = "SELECT * FROM my_shop.categories
              WHERE parent_id = '{$catId}'";
              //d($query);
              
    global $db;
    $result = $db->query($query);
     //d($result);
     return createSmartyRsArray($result);   

     }
   

/** 
 * Получить главные категории с привязками к дочерним
 * 
 * @return type $data возвращается массив с названиеями категорий
 */
function getAllMainCatsWithChildren(){
    
    $query = "SELECT * FROM my_shop.categories WHERE parent_id = 0";
        global $db;
        $result = $db->query($query);
   //$result = mysqli_query($GLOBALS['db'],$query);
   // while ($row = $rs->fetch_assoc())
        
   // $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        //while ($row = current($data)){
        $smartyRs = array ();
         while ($row = $result->fetch_assoc()){
            $rsChildren = getChildrenForCat($row ['id']);
            
            if($rsChildren){
            $row['children'] = $rsChildren;
   
       }
 
   $smartyRs[]=$row;
}
//d($smartyRs);
return $smartyRs;
}

/**
 * Получить данные из категории по id
 * @global object $db
 * @param ineger $catId ID категории
 * @return array массив строка категории
 */
function getCatById($catId){
    $catId = intval($catId); // !!!sql #3.1 min 10
    $query = "SELECT * FROM my_shop.categories WHERE id ='{$catId}'";
        global $db;
        $result = $db->query($query);
        return  $result->fetch_assoc();
}
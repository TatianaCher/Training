<?php

/* 
 * Модель для таблицы категорий (categories)
 */

/** 
 * Получение дочерних категорий для категории $catId
 * @param type integer $catId ID категорий
 */
//function get_ChildrenForCat ($catId){
//    $query = "SELECT * FROM my_shop.categories
//              WHERE parent_id = '{$catId}'";
//    $result = mysqli_query($GLOBALS['db'],$query);
//    return createSmartyRsArray($result);
//}
// 






/** 
 * Получить главные категории с привязками к дочерним
 * @param type $link
 * @return type $data возвращается массив с названиеями категорий
 */
function get_Categories(){

   $query = "SELECT * FROM my_shop.categories WHERE parent_id = 0";
   
   $result = mysqli_query($GLOBALS['db'],$query);
   
   $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
//   $catId = $data['id'];
//   $rsChildren = get_ChildrenForCat($catId);
//   if($rsChildren){
//       $catId['children'] = $rsChildren;
//   }
   
   return $data;
   

}

//$categories = get_Categories($db);
//var_dump($categories);


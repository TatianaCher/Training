<?php

/* 
 * Модель для таблицы категорий (categories)
 */

function getAllMainCatsChildrens(){

   $sql = "SELECT * FROM my_shop.categories WHERE parent_id = 0";
   
   $rs = mysqli_query($sql);
   
//   echo '<pre>';
//   var_dump($rs );
//   echo '</pre>';
   
   $smartyRs = array();
   while ($row = mysqli_fetch_assoc($rs)) {
       $smartyRs[] = $row;
       
       //echo 'id = '. $row['id']. '<br />';  
   }
   return $smartyRs;

}
 //getAllMainCatsChildrens($db);
//$result = mysqli_query($link, $query);
//$data = mysqli_fetch_all($result, MYSQLI_ASSOC);


 # $categories = getAllMainCatsChildrens($db);

 
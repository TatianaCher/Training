<?php

/* 
 *CartController. php  
 * добавление продукта в корзину
 */

//include_once '../models/ProductsModel.php';
//include_once '../models/CategoriesModel.php';

/**
 * Добавление продукта в корзину
 * 
 * @return boolean integer id GET параметр - ID добавляемоо продукта
 */
function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : NULL;
    if (!$itemId) {
        return FALSE;
    }

    $resData = array(); #3.5 min 4. 00; пустой массив; результирующие данные для js скрипта
    //если значение не найденно, то добавляем
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === FALSE){
            $_SESSION['cart'][] = $itemId;
            $resData['cntItems'] = count($_SESSION['cart']);
            $resData['success'] = 1;
    } else {
        $resData ['success'] = 0;
    }
    echo json_encode($resData);
}
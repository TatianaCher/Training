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
 * @param  integer id GET параметр - ID добавляемого продукта
 * @return json информация об опирации (успех,  количество элементов в корзине)
 */

function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : NULL;
    
    echo "Тест - {$itemId} . страница корзины ";
    
    if (!$itemId) {
        return FALSE;
    }

    $resData = array(); #3.5 min 4. 00; пустой массив; результирующие данные для js скрипта
    //если значение не найденно, то добавляем
    //d($resData);
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION) === FALSE){
            $_SESSION['cart'][] = $itemId;//добавляем данный элемент в массив корзины
            $resData['cntItems'] = count($_SESSION['cart']);#в переменную $resData инициализирум
            #ключ cntItems количество елементов в нашей корзине и берем количество элементов 
            #нашего массива'cart'
                      
            $resData['success'] = 1;// ключ 'success' успешно отработала функция, товар в корзине
    } else {
        $resData ['success'] = 0;
    }
     echo  $resData;
    //echo json_encode($resData); # преобразуем массив в json данные 
    
    
      
}
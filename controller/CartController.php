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

#3.5
function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : NULL;
    
    
    echo "Тест - {$itemId} . Cтраница корзины "; # пришло на страницу 
    # (не в консоль) из шаблона занчение $cartCntItems , а в адресной строке
    #  http://myshop02/?controller=cart&action=addtocart&id=27, не хватало "&id"
    
    if (!$itemId) {
        return FALSE;
    }

    $resData = array(); #3.5 min 4. 00; пустой массив; результирующие данные для js скрипта
    //если значение не найденно, то добавляем 
    
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION) === FALSE){
        # У меня тоже была проблема с изменением кол-ва продуктов в корзине и появлением кнопки
        #  "удалить из корзины." Почитав логи мы видим ошибку "PHP Warning:  array_search() 
        #  expects parameter 2 to be array, integer given in ...."
        #  Идем в документацию и читаем как работает функция - http://www.php.su/array_search . 
        #  Отсюда видно что поиск идет по ВСЕМУ массиву, 
        #  а мы передаем ему строку. В итоге все что нужно сделать это удалить ['cart''] 
        #  и строка 28 примет вид if(isset($_SESSION['cart']) && array_search($itemId, $_SESSION) === false)
            
        $_SESSION['cart'][] = $itemId;//добавляем данный элемент в массив корзины
        $resData['cntItems'] = count($_SESSION['cart']);#в переменную $resData инициализирум
        #ключ cntItems количество елементов в нашей корзине и берем количество элементов 
        #нашего массива'cart'
                      
        $resData['success'] = 1;// ключ 'success' успешно отработала функция, товар в корзине
    } else {
        $resData ['success'] = 0;
    }
    //d($resData);
    echo json_encode($resData); # преобразуем массив в json данные 
    
}

/**
 * Удаление продукта в корзину
 * 
 * @param  integer id GET параметр - ID удаляемого продукта
 * @return json информация об опирации (успех,  количество элементов в корзине)
 */
function removefromcartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : NULL;
       
    if (!$itemId)  exit();

    $resData = array(); #3.6 0 min 47 sec
    $key = array_search($itemId, $_SESSION['cart']);
    if ($key !== false){
        unset($_SESSION['cart'][$key]);
        $resData['cntItems'] = count($_SESSION['cart']); 
        $resData['success'] = 1; 
    } else {
        $resData ['success'] = 0;
    }
    d($resData);
    echo json_encode($resData); # преобразуем массив в json данные 
    }
            

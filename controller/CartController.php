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
 * @return json информация об операции (успех,  количество элементов в корзине)
 */

#3.5
function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : NULL;
    
    echo "Тест - {$itemId} . Cтраница корзины "; # пришло на страницу 
    # (не в консоль) из шаблона занчение $cartCntItems , а в адресной строке
    #  http://myshop02/?controller=cart&action=addtocart&id=27, не хватало "&id"
    
   if (! $itemId) {exit();}
    $resData = array(); #3.5 min 4. 00; пустой массив; результирующие данные для js скрипта
    //если значение не найденно, то добавляем 
    
    //вынесла за пределы скобок && array_search($itemId, $_SESSION['cart']) === FALSE
        
        $_SESSION['cart'][] = $itemId;// []добавляем данный элемент в уже существующий массив корзины
        $itemId = array_search($itemId, $_SESSION['cart']);
      
        if ($resData !== false){
        $resData['cntItems'] = count($_SESSION['cart']);# количество элементов нашего массива'cart' 
        #помещаем (инициализирум) в переменную $resData с ключом cntItems, 
        #превращая в количество элементов корзины !!! магия  
                      
        $resData['success'] = 1; //успех!!! товар в корзине -> в js
    } else {
        $resData ['success'] = 0; //пусто!!!  -> в js
    }
     
    echo " Data json " .json_encode($resData); # преобразуем массив в json данные 
    
}

/**
 * #3.6 min 1
 * Удаление продукта в корзину
 * 
 * @param  integer 'id' GET-параметр - ID удаляемого продукта
 * @return json ключ 'success' информация об операции удаление, прошла = 1,   ничего не произошло = 0, 
 * ключ 'cntItems' количество елементов в корзине 
 */
function removefromcartAction(){ // вызов из main.js
  
     
    
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : NULL;
       
    if (! $itemId) {exit();}
    
        $resData = array(); #3.6 0 min 47 sec
        
        $key = array_search($itemId, $_SESSION['cart']);// в массиве Сесии 'cart' находим $itemId - id продукта
        if ($key !== false){
            unset($_SESSION['cart'][$key]);// удаление продукта, который получен в $key

            $resData['cntItems'] = count($_SESSION['cart']); // счетчик
            $resData['success'] = 1;  // удалилось
        } else {
            $resData['success'] = 0; // не удалилось
        }
         echo " Data json " . json_encode($resData);  # преобразуем массив в json данные 
}

/**
 * Формирование страницы корзины
 * @link /cart/
 * @param type $smarty
 */


    
function indexAction($smarty){ // формирование стараницы корзины #3.7 4 min
   
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array(); 
    //$itemsIds[] = 0; //без этой строчки была ошибка Uncaught Error: 
    //Call to a member function fetch_assoc() on boolean in 
    //C:\OpenServer\domains\MyShop02\library\mainFunctions.php on line 62
    //!!! в массив должен приходить ноль, а он не приходит, добавили принудительно или
     //if($itemsIds) {...   всё нутро  ...} else return false; добавила из комментариев # 3.7
    /*d($itemsIds); 
    * Debug: Array (
                    [0] => 5
                    [1] => 3
                   )      */
   
    $rsCategories = getAllMainCatsWithChildren();  //получить все категории
     // инициализация переменных smarty 
    $rsProducts = getProductsFromArray($itemsIds); // получить продукты из масива по id
  
     
    $smarty->assign('pageTitle', 'Корзина'); // заголовок страниц передаем пустую строку
    
    $smarty->assign('rsCategories', $rsCategories);//формирование левого меню
    $smarty->assign('rsProducts', $rsProducts);//передать шаблон данного продукта 
  
    // d($rsProducts);
    
    //#3.3.1 6 min 19 sec
    loadTemplate($smarty, 'header'); // шаблон заголовка
    loadTemplate($smarty, 'cart'); //шаблон  страницы корзины
    loadTemplate($smarty, 'footer'); // 'шаблоны страниц'
}
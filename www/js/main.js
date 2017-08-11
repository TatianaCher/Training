/* 
 *Функция добавления товара в корзину
 */

/**
 * #3.5 13 min
 * 
 * @param {type} itemId id нашего товара
 * методы hide() видим / .show() показать
 * метод html изменяем на количество элементов в карзине
 * @returns в случае успеха обнавляются данные корзины на старнице
 */
function addToCart(itemId){
    console.log("Js - addToCart("+ itemId +")");// отладка
    
    $.ajax({
        type: 'POST', //метод пост
        //async: false, //синхронность запроса , выключаем, так как запрос не асинхронен
        url: "?controller=cart&action=addtocart&id=" + itemId + '/', // передача параметров, обращаемся к CartController, 
        //к addtocartAction  и передаем get параметр 
        //url: "/cart/addtocart/"+itemId+'/',
        dataType: 'json', // тип данных , что то вроде массива для js
        success: function(data) { // функция, пришла data (результат json_encode($resData) ) 
             
            if (data['success']){
                $('#cartCntItems').html(data['cntItems']); // меняет ссылку на значение количества элементов в корзине  
                
                $('#addCart_' + itemId).hide();// меняет ссылку "добавить/ удалить"
                $('#removeCart_' + itemId).show();
            }
          
        }
      
    });
   
} 
/**
 * #3.6 5 min 39 sec
 * 
 * @param  itemId id нашего товара
 * методы hide() видим / .show() показать
 * метод html изменяем на количество элементов в карзине
 * @returns в случае успеха обнавляются данные корзины на старнице
 */ 
function removeFromCart(itemId){
    console.log("Js - removeFromCart("+ itemId +")");//отладка
     
    $.ajax({
        type: 'POST', //метод пост
        //async: false, //синхронность запроса , выключаем, так как запрос не асинхронен
        url: "?controller=cart&action=removefromcart&id=" + itemId + '/', // передача параметров, обращаемся к CartController, 
        //к removefromcartAction  и передаем get параметр 
        dataType: 'json', // тип данных  , что то вроде массива для js
        success: function(data) { // функция, пришла data (результат json_encode($resData) ) 
             
            if (data['success']){
                $('#cartCntItems').html(data['cntItems']); // меняет ссылку на значение количества элементов в корзине  
                
                $('#addCart_' + itemId).show();// меняет ссылку "удавить/ добавить"
                $('#removeCart_' + itemId).hide();
            }
          
        }
    });
       
 } 
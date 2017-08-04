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
    console.log("Js - addToCart()"); // отладка
    $.ajax({
        type: 'POST', //метод пост
        async: false, //синхронность запроса , выключаем, так как запрос не асинхронен
        url: "/cart/addtocart/" + itemId + '/', // передача параметров, обращаемся к CartController, 
        //к addtocartAction  и передаем get параметр
        dataType: 'json', // тип данных , что то вроде массива для js
        success: function (data) { // функция, пришла data (результат json ) 
            if (data['success']){
                $('#cartCntItems').html(data['cntItems']); // меняет значение в корзине на количество
                
                $('#addCart_' + itemId).hide();// меняет ссылку "добавить/ удалить"
                $('#removeCart_' + itemId).show();
            }
        }
    });
}
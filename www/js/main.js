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
        url: "/?controller=cart&action=addtocart&id=" + itemId + "/", // передача параметров, обращаемся к CartController, 
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
        url: "/?controller=cart&action=removefromcart&id=" + itemId + "/", // передача параметров, обращаемся к CartController, 
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
 
 
 /**
 * #3.8 14 min  
 * Подсчет стоимости купленного товара
 * 
 * @param  itemId id продукта
 * методы val()- берем значение поля value="1"; attr('value') берет из itemPrice_ значение атрибута 'value'
 * метод html меняет html-код из #itemRealPrice_ на значение произведения переменных itemRealPrice
 * @returns  число itemRealPrice
 */
 
 function conversionPrice(itemId){
     var newCnt = $('#itemCnt_' + itemId).val(); // новое количество товара, который хотим мы купить, 
     var itemPrice = $('#itemPrice_' + itemId).attr('value');//цена текущего товара 
     var itemRealPrice = newCnt * itemPrice;// находим произведение переменных
     
     $('#itemRealPrice_' + itemId).html(itemRealPrice); 
 }
 
 /** #4.3     14 min 03 sec 
  * Получение данных с формы
  * @param {type} obj_form
  * @returns {unresolved}
  * из библиотеки jquery each
  */
 function getData(obj_form){
     var hData = {}; // присваиваем переменной пустой массив
     $('input, textarea, select', obj_form).each(function (){// просматреваем все input, textarea, select объекта
        
         if(this.name && this.name !== ''){ // берем значения input, textarea, select
             hData[this.name] = this.value;
             console.log('hData[' + this.name + '] = ' + hData[this.name]);// выводим в консоль
         }
     });
     return hData; // возвращаем массив
     
 }
 /** #4.3     13 min 03 sec 
  * Регистрация нового пользователя
  * @returns {undefined}
  */
 function registerNewUser(){
     var postData = getData('#registerBox'); // помещаются значения из массива , который получили в getData
     
     $.ajax({ //#4.3    17 min 13 sec
         type: 'Post',
         //async: false,
         url: "/?controller=user&action=register&id=" + postData + "/", //#4.3    17 min 25 sec
         data: postData,
         dataType: 'json',
         success: function (data) { // в data попадает echo json_encode($resData) из контроллера
            if (data['success']){
                alert('Регистарция прошла успешно'); // $resData['message'] = alert(data['message']);
                //> блок в левом столбце
                $('#registerBox').hide();
                
//                $('#userLink').attr('href','/user/');
//                $('#userLink').html(data['userName']);
//                $('#userBox').show();
                //<
                
                //> Страница заказов
//                $('#loginBox').hide();
//                $('#btnSaveOrder').show();
                //<
            } else {
                alert(data['message']);
            }
        }
         
     })
     
 }
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
          
        },
        error: function (request, status, error) {
            console.log (request.responseText);
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
          
        },
        error: function (request, status, error) {
            console.log (request.responseText);
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
  * Получение данных с форм nput, textarea, select и выводим в консоль
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
     var postData = getData('#registerBox'); // помещаются значения из массива , который получили в getData из registerBox 
     console.log("Js - registerNewUser("+ postData +")");
     $.ajax({ //#4.3    17 min 13 sec
         type: 'POST',
         //async: false,
         url: "/?controller=user&action=register&id=" + postData + "/", //#4.3    17 min 25 sec
         data: postData,
         dataType: 'json',
         success: function (data) { // в data попадает echo json_encode($resData) из контроллера
            if (data['success']){
                alert('Регистрация прошла успешно'); // $resData['message'] = alert(data['message']);
                //> блок в левом столбце
                $('#registerBox').hide();
                
                $('#userLink').attr('href','/user/'); //#4.4     4 min 49 sec
                $('#userLink').html(data['userName']);
                $('#userBox').show();
                //<
                
                //> Страница заказов
//                $('#loginBox').hide();
//                $('#btnSaveOrder').show();
                //<
            } else {
                alert(data['message']);
            }
        },
        error: function (request, status, error) {
            console.log(request.responseText);}
         
     });
     
 }
  /**
   * выход из кабинета 
   * */
 function logout() {
     
       console.log("Js - logout()");//отладка
    $.ajax({
        type: 'POST', // задаем метод
        url: "/user/logout/", // Точно Фиксики дерзают!!! и так работает  "/?controller=user&action=logout&id="
        success: function() {
            console.log('user logged out');
            $('#registerBox').show();
            $('#userBox').hide();
            
            $('#loginBox').show();// добавила
        }
    });
}


/**
 * авторизация пользователя
 * #4.6  1 мин 24 сек
 * **/

function login(){
    
     
    var email =  $('#loginEmail').val(); // берем значение из id="loginEmail"
    var pwd = $('#loginPwd').val();// берем значение из id="loginPwd"
    
    var postData = "email=" + email + "&pwd=" + pwd; //строка запроса - get запрос
    
    /** аналогичный результат 
    * формируется   в getData (см выше), другая форма запроса
    * 
    * #4.6     6 min 40 sec
    * 
    * */
     console.log("Js - login(" + postData + ")");//отладка
    $.ajax({
        type: 'POST',
        //async : false,
        url: "/?controller=user&action=login&id=" + postData + "/",
        data: postData,
        dataType: 'json',
        success: function (data) {
                if(data['success']){
                $('#registerBox').hide();
                $('#loginBox').hide();
                $('#userLink').attr('href','/user/');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();
                
            } else{
                alert(data['message']);
            }
        }
    });
}

function showregisterBox (){
    if($("#registerBoxHidden").css('display')  !==  'block' ) {
       $("#registerBoxHidden").show(); 
    } else {
        $("#registerBoxHidden").hide();
    }
}

/** # 4. 10  min 12 sec 37
 * Обновление данных пользователя
 * сбор данных с формы , еще один способ
 * @returns {undefined}
 */
function updateUserData() { // инициализируем каждую переменну , см. выше getData работает с объектом 
    console.log('JS - updateUserData()');
    // больше кода
    var phone = $('#newPhone').val();
    var adress = $('#newAdress').val();
    var pwd1 = $('#newPwd1').val();
    var pwd2 = $('#newPwd2').val();
    var curPwd = $('#curPwd').val();
    var name = $('#newName').val();
    
    var postData = {
        phone: phone, // присваение ключам значение
        adress: adress,
        pwd1: pwd1,
        pwd2: pwd2,
        curPwd: curPwd,
        name: name
    };
   $.ajax({
        type: 'POST',
        //async : false,
        url: "/?controller=user&action=update&id=" + postData + "/",
        data: postData,
        dataType: 'json',
        success: function (data) {
                if(data['success']){
                    $('#userLink').html(data['userName']);
                    alert(data['message']);
                } else{
                    alert(data['message']);
                }
            }
   });
}
function ajaxSend(link,callback){
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var orderInfo = JSON.parse(xhttp.responseText);
            callback(orderInfo);
        }
    };
    xhttp.open("GET", link, true);
    xhttp.send();
}

    /**
    *   setCartCount - Устанавливает счетчик количество заказов
    *   в корзине
    *
    *   @param int countItems - текущие количество заказов
    *   @return Изменяет счетчик в шапке сайта
    */

function setCartCount(countItems){
    var count = document.getElementById('count-items');
    if(countItems !== undefined)
        count.innerHTML = countItems;
}

    /**
    *   changeCartEvent - Функция меняет ссылку в корзине (добавить/удалить)
    *
    *   @param bool action
    *   @param DOMObject link - ссылка на которой было нажатие.
    *   @return Изменение ссылки в корзине.
    */

function changeCartEvent(action,link){
    if(action){
        link.className = 'js-removefromcart-button';
        link.innerHTML = 'Удалить из корзины';
    }
    else{
        link.className = 'js-addtocart-button';
        link.innerHTML = 'Добавить в корзину';
    }

    setClickEvents();
}

    /**
    * AddToCard - функция добавления в корзину
    *
    * @param itemId - Номер заказа
    *
    * @return обновленные данные корзины на странице 
    */

function addToCart(e){
    e.preventDefault();

    var productId = this.getAttribute('data-product-id');
    var addToCartLink = '/cart/addtocart/' + productId + '/';

    ajaxSend(addToCartLink,function(orderInfo){
        setCartCount(orderInfo.countItems);
    });

    changeCartEvent(1,this);
}

    /**
    * removeFromCart - функция удаления из корзины
    *
    * @param itemId - Номер заказа
    *
    * @return обновленные данные корзины на странице
    */

function removeFromCart(e){
    e.preventDefault();

    var productId = this.getAttribute('data-product-id');
    var removeFromCartLink = '/cart/removefromcart/' + productId + '/';
    
    ajaxSend(removeFromCartLink,function(orderInfo){
        setCartCount(orderInfo.countItems);
    });
    
    changeCartEvent(0,this);
}

    /**
    * setClickEvents - функция устанавливает эвенты
    * на кнопки
    *
    * @param itemId - Номер заказа
    *
    * @return обновленные данные корзины на странице
    */

function setClickEvents(){

    var addToCardButtons = document.getElementsByClassName('js-addtocart-button');
    var removeCartButtons = document.getElementsByClassName('js-removefromcart-button');
    var count = addToCardButtons.length != 0 ?  addToCardButtons.length : removeCartButtons.length;

    for(var i = 0; i < count; i++){
        if(addToCardButtons.length)
            addToCardButtons[i].onclick = addToCart;
        if(removeCartButtons.length)
            removeCartButtons[i].onclick = removeFromCart;
    }
}

setClickEvents();

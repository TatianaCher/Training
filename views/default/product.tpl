{*страница продуктов*} {*3.3.2 min 3.32*}
<h3>  {$rsProduct['name']}</h3>

 <img src="/images/products/{$rsProduct['image']}" width="575"/>
 Стоимость: {$rsProduct['price']}
 

 <a id="addCart_{$rsProduct['price']}" href="#" onclick="addToCart({$rsProduct['id']});return false" alt ="Добавить в корзину"> Добавить в корзину </a>  
 <p> Описание<br /> {$rsProduct['description']}</p>
 
  
    
    
   
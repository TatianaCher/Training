  {*Левый столбец*}
   
  
  
  <div id="leftColum">
       
      <div id="leftMenu">
            <div class="menuCaption">Меню:</div>
            {foreach $rsCategories as $item}
                <a href="/?controller=category&id={$item['id']}"> {$item['name']}</a> <br />
                {* ссылки 3.1 min5:24*}
                {if isset($item['children'])}  {*2.3.2 min4:12*}
                    {foreach $item['children'] as $itemChild}
                         --<a href="/?controller=category&id={$itemChild['id']}"> {$itemChild['name']}</a> <br />
                    
                    {/foreach}
                    
                {/if}
                
            {/foreach}
        </div>
        
        <div class="menuCaption">Корзина</div> 
        <a href="/?controller=cart&action=addtocart" title="Перейти в корзину">В корзине</a>
        <span id="cartCntItems"> {*#3.5.2 3 min 35, количество элементов в корзине*}
            {if $cartCntItems > 0} {$cartCntItems} {else} пусто {/if}
        </span>
    </div>

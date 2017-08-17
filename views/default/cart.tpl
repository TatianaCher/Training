{*шаблон корзины # 3,7 min 15 sec 21 *}
<h1> Корзина </h1>
 
 
    
    {if ! $rsProducts }
        В корзине пусто 
        
        {else}
            
            <h2> Данные заказа </h2>
            <table>
                <tbody>
            <tr>
                <td>                    №                   </td>
                <td>                    Наименование         </td>
                <td>                    Количество           </td>
                <td>                    Цена за единицу      </td>
                <td>                    Цена                 </td>
                <td>                    Действие             </td>
            </tr>
            
            {foreach $rsProducts as $item name=products}
            <tr>
                <td>   {$smarty.foreach.products.iteration}   </td>
                <td>  
                    <a href="/?controller=product&id={$item['id']}/" >
                        {$item['name']}</a>  
                </td>
                
                <td> {*# 3.8 min 4 sec 15*}
                    <input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onchange="conversionPrice({$item['id']});"/>
                </td> 
                <td>                    
                    <span id='itemPrice_{$item['id']}' value='{$item['price']}'>       
                        {$item['price']}
                    </span>
                </td>
                <td>
                    <span id="itemRealPrice_{$item['id']}">
                    {$item['price']}
                    </span>
                </td>
                <td>
                <a id="removeCart_{$item['id']}" href="#" onClick="removeFromCart({$item['id']}); return false;" title="Удалить"> Удалить </a>  
                <a id="addCart_{$item['id']}" class="hideme"  href="#" onClick="addToCart({$item['id']}); return false;" title="Восстановить"> Восстановить </a>  
 
                </td>
            </tr>
            </tbody>
            </table>
            {/foreach}

    {/if}                  
   
    
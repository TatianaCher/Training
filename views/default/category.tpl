{*страница категории*}
<h1>Товары категории {$rsCategory['name']}</h1>
 
{foreach $rsProducts as $item name=products }
    <div style="float: left; padding: 0px 30px 40px 0px;">
        <a href="/product/{$item['id']}/" >
            <img src="/products/{$item['image']}/" width="100"/>
        </a> <br />
        <a href="/images/product/{$item['id']}/" >{$item['name']}</a>
    </div>
    
    
    {if $smarty.foreach.products.iteration mod 3 == 0}
        <div style="clear: both;"></div>
     {/if}                  
  {foreachelse} 
    Ничего не найдено 
{*добавила самостоятельно со страницы https://www.smarty.net/docsv2/ru/language.function.foreach.tpl#foreach.property.iteration*}
 {/foreach}
{foreach $rsChildCats as $item name=childCats}
     
   <h2><a href="/category/{$item['id']}/" >{$item['name']}</a> </h2>
{*3.1.2 min 14. 48*}

 {/foreach}

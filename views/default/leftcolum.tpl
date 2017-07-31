  {*Левый столбец*}
   
  
  
  <div id="leftColum">
       
      <div id="leftMenu">
            <div class="menuCaption">меню:</div>
            {foreach $rsCategories as $item}
                <a href="/?controller=category&id={$item['id']}"> {$item['name']}</a> <br />
                
                {if isset($item['children'])}  {*2.3.2 min4:12*}
                    {foreach $item['children'] as $itemChild}
                         --<a href="/?controller=category&id={$itemChild['id']}"> {$itemChild['name']}</a> <br />
                    
                    {/foreach}
                    
                {/if}
                
            {/foreach}
        </div>
    </div>

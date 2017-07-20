  {*Левый столбец*}
    <div id="leftColum">
        <div id="leftMenu">
            <div class="menuCaption">меню:</div>
            {foreach $categories as $item}
                <a href="/?controller=category&id={$item['id']}"> {$item['name']}</a> <br />
                
                {if isset($item['children'])}
                    {foreach $item['children'] as $itemChild}
                         --<a href="/?controller=category&id={$item['id']}"> {$itemChild['name']}</a> <br />
                    {/foreach}
                {/if}
            {/foreach}
        </div>
    </div>

  {*Левый столбец*}
    <div id="leftColum">
        <div id="leftMenu">
            <div class="menuCaption">меню:</div>
            {foreach $categories as $item}
                <a href="#"> {$item['name']}</a> <br />
                
                {if isset($item['children'])}
                    {foreach $item['children'] as $itemChild}
                         --<a href="#"> {$itemChild['name']}</a> <br />
                    {/foreach}
                {/if}
            {/foreach}
        </div>
    </div>

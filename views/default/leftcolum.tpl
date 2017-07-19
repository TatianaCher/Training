  {*Левый столбец*}
    <div id="leftColum">
        <div id="leftMenu">
            <div class="menuCaption">меню:</div>
            {foreach $categories as $item}
                <a href="#"> {$item['name']}</a> <br />
            {/foreach}
        </div>
    </div>

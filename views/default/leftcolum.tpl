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
        
    {if isset($arUser)}  {* # 4.7    5 min 06 sec*}
        <div id="userBox" >  
            <a href="/?controller=user&action=index&id=" id="userLink">{$arUser['displayName']}</a><br />
            <a href="#" onclick="logout();return false;">Выход</a>
            
        </div> 
    
    {else}    
        
        <div id="userBox" class="hideme"> {*  Делаем через js*}  
            <a href="#" id="userLink"></a><br />
            <a href="#" onclick="logout();return false;">Выход</a>
            
        </div>      
        
        {*<div id="userBox" class="hideme">   Делаем через контроллер
            <a href="#" id="userLink"></a><br />
            <a href="/?controller=user&action=logout&id=" onclick="logout();">Выход</a>
            
        </div> *}  
        
        <div id="loginBox">
            <div class="menuCaption">Авторизация</div>   
            <input type="text" id="loginEmail" name="loginEmail" value=""/><br/>
            <input type="password" id="loginPwd" name="loginPwd" value=""/><br/>
            <input type="button" onClick="login();"  value="Войти"/><br/>
        </div> 
        
        <div id="registerBox">
            <div class="menuCaption showHidden" onclick="showregisterBox();">Регистрация</div>
            <div id="registerBoxHidden">
                email:<br />
                <input type="text" id="email" name="email" value=""/><br/>
                пароль: <br />
                <input type="password" id="pwd1" name="pwd1" value=""/><br/>
                повторить пароль:<br/>
                <input type="password" id="pwd2" name="pwd2" value=""/><br/>
                <input type="button" onClick="registerNewUser();" value="Зарегистрироваться"/><br/>
            </div>
         
        </div>
        
    {/if}    
        <div class="menuCaption">Корзина</div> 
        <a href="/?controller=cart&id={$cartCntItems}" title="Перейти в корзину">В корзине</a>
        <span id="cartCntItems"> {*#3.5.2 3 min 35, количество элементов в корзине*}
            {if $cartCntItems > 0} {$cartCntItems} {else} пусто {/if}
        </span>
    </div>

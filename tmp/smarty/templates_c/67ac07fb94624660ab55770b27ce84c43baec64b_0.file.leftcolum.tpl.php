<?php
/* Smarty version 3.1.32-dev-11, created on 2017-08-25 00:26:02
  from "C:\OpenServer\domains\Training\views\default\leftcolum.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_599f446a798517_49518925',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67ac07fb94624660ab55770b27ce84c43baec64b' => 
    array (
      0 => 'C:\\OpenServer\\domains\\Training\\views\\default\\leftcolum.tpl',
      1 => 1503609944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599f446a798517_49518925 (Smarty_Internal_Template $_smarty_tpl) {
?>
  
   
  
  
  <div id="leftColum">
       
      <div id="leftMenu">
            <div class="menuCaption">Меню:</div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a> <br />
                
                <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>  
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
?>
                         --<a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a> <br />
                    
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                    
                <?php }?>
                
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

        </div>
        
    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>  
        <div id="userBox" >  
            <a href="/?controller=user&id=" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br />
            <a href="#" onclick="logout();return false;">Выход</a>
            
        </div> 
    
    <?php } else { ?>    
        
        <div id="userBox" class="hideme">   
            <a href="#" id="userLink"></a><br />
            <a href="#" onclick="logout();return false;">Выход</a>
            
        </div>      
        
          
        
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
        
    <?php }?>    
        <div class="menuCaption">Корзина</div> 
        <a href="/?controller=cart&id=<?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
" title="Перейти в корзину">В корзине</a>
        <span id="cartCntItems"> 
            <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?> <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
 <?php } else { ?> пусто <?php }?>
        </span>
    </div>
<?php }
}

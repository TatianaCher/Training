<?php
/* Smarty version 3.1.32-dev-11, created on 2017-08-22 17:22:00
  from "C:\OpenServer\domains\Training\views\default\leftcolum.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_599c3e08d2b1e1_42049546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67ac07fb94624660ab55770b27ce84c43baec64b' => 
    array (
      0 => 'C:\\OpenServer\\domains\\Training\\views\\default\\leftcolum.tpl',
      1 => 1503058686,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599c3e08d2b1e1_42049546 (Smarty_Internal_Template $_smarty_tpl) {
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
        
        <div id="registerBox">
            <div class="menuCaption showHidden" onclick="showregisterBox();">Регистрация</div>
            <div id="registerBoxHidden">
                email:<br />
                <input type="text" id="email" name="email" value=""/><br/>
                пароль <br />
                <input type="password" id="pwd1" name="pwd1" value=""/><br/>
                повторить пароль:<br/>
                <input type="password" id="pwd2" name="pwd2" value=""/><br/>
                <input type="button" onClick="registerNewUser();" value="Зарегистрироваться"/><br/>
            </div>
         
        </div>
        
        
        
        
        
        
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

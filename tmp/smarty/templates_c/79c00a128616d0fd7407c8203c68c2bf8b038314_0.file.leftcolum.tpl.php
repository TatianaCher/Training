<?php
/* Smarty version 3.1.32-dev-11, created on 2017-08-09 22:11:39
  from "C:\OpenServer\domains\MyShop02\views\default\leftcolum.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_598b5e6b0b6a05_84210147',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79c00a128616d0fd7407c8203c68c2bf8b038314' => 
    array (
      0 => 'C:\\OpenServer\\domains\\MyShop02\\views\\default\\leftcolum.tpl',
      1 => 1502305895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598b5e6b0b6a05_84210147 (Smarty_Internal_Template $_smarty_tpl) {
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
        
        <div class="menuCaption">Корзина</div> 
        <a href="/?controller=cart&action=addtocart" title="Перейти в корзину">В корзине</a>
        <span id="cartCntItems"> 
            <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?> <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
 <?php } else { ?> пусто <?php }?>
        </span>
    </div>
<?php }
}

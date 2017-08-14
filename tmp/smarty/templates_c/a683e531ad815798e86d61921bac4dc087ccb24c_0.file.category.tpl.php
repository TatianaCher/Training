<?php
/* Smarty version 3.1.32-dev-11, created on 2017-08-13 00:27:59
  from "C:\OpenServer\domains\MyShop02\views\default\category.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_598f72df87ace2_78173746',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a683e531ad815798e86d61921bac4dc087ccb24c' => 
    array (
      0 => 'C:\\OpenServer\\domains\\MyShop02\\views\\default\\category.tpl',
      1 => 1502573185,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598f72df87ace2_78173746 (Smarty_Internal_Template $_smarty_tpl) {
?>
 
<h2>Товары категории <?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
</h2>
 
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
    <div style="float: left; padding: 0px 30px 40px 0px;">
        <a href="/?controller=product&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" >
            <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="100"/>
        </a> <br />
        <a href="/?controller=product&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
    </div>
    
    
    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
        <div style="clear: both;"></div>
     <?php }?>                  
  <?php
}
} else {
?>
 
    Ничего не найдено 

 <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsChildCats']->value, 'item', false, NULL, 'childCats', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
     
   <h2><a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a> </h2>


 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }
}

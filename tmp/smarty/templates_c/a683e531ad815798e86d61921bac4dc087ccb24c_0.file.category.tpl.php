<?php
/* Smarty version 3.1.32-dev-11, created on 2017-07-25 22:56:10
  from "C:\OpenServer\domains\MyShop02\views\default\category.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_5977a25a94f665_06410432',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a683e531ad815798e86d61921bac4dc087ccb24c' => 
    array (
      0 => 'C:\\OpenServer\\domains\\MyShop02\\views\\default\\category.tpl',
      1 => 1501012441,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5977a25a94f665_06410432 (Smarty_Internal_Template $_smarty_tpl) {
?>
 
<h1>Товары категории <?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
</h1>
 
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
    <div style="float: left; padding: 0px 30px 40px 0px;">
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" >
            <img src="/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
/" width="100"/>
        </a> <br />
        <a href="/images/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" ><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
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
     
   <h2><a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" ><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a> </h2>


 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }
}

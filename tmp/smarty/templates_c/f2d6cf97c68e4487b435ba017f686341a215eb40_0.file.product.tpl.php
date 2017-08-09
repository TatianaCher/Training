<?php
/* Smarty version 3.1.32-dev-11, created on 2017-08-09 23:08:31
  from "C:\OpenServer\domains\MyShop02\views\default\product.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_598b6bbf6c4509_08271787',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2d6cf97c68e4487b435ba017f686341a215eb40' => 
    array (
      0 => 'C:\\OpenServer\\domains\\MyShop02\\views\\default\\product.tpl',
      1 => 1502308662,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598b6bbf6c4509_08271787 (Smarty_Internal_Template $_smarty_tpl) {
?>
 
<h3>  <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

 <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" width="575"/>
 Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>

 

 <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id_products'];?>
" href="#" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id_products'];?>
);return false" alt ="Добавить в корзину"> Добавить в корзину </a>  
 <p> Описание<br /> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p>
 
  
    
    
   <?php }
}

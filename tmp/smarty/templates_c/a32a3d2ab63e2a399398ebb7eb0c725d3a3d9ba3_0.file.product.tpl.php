<?php
/* Smarty version 3.1.32-dev-11, created on 2017-08-22 17:22:02
  from "C:\OpenServer\domains\Training\views\default\product.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_599c3e0af020f5_62091509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a32a3d2ab63e2a399398ebb7eb0c725d3a3d9ba3' => 
    array (
      0 => 'C:\\OpenServer\\domains\\Training\\views\\default\\product.tpl',
      1 => 1503058686,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599c3e0af020f5_62091509 (Smarty_Internal_Template $_smarty_tpl) {
?>
     
<h3>  <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

 <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" width="575"/>
 Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>

 
 <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme"<?php }?> href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
);return false;" alt ="Удалить из корзины"> Удалить из корзины </a>  

 <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme"<?php }?> href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
);return false;" alt ="Добавить в корзину"> Добавить в корзину </a>  
 <p> Описание<br /> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p>
 
  
    
    
   <?php }
}

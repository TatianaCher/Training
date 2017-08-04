<?php
/* Smarty version 3.1.32-dev-11, created on 2017-08-04 13:52:54
  from "C:\OpenServer\domains\MyShop02\views\default\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_59845206788475_58260612',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e887e30260d3758780d21308bd256014cd21d620' => 
    array (
      0 => 'C:\\OpenServer\\domains\\MyShop02\\views\\default\\index.tpl',
      1 => 1501843968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59845206788475_58260612 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h1> Главная страница </h1>
 
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
    <div style="float:left; padding: 0px 30px 40px 0px;">
        <a href="?controller=index&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id_products'];?>
" >
            <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="100">
        </a> <br />
        <a href="?controller=index&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id_products'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
    </div>
    
    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
        <div style="clear: both;"></div>
    <?php }?>                  
   
 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}

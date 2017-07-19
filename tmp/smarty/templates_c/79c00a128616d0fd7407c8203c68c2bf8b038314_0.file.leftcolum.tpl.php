<?php
/* Smarty version 3.1.32-dev-11, created on 2017-07-19 21:00:36
  from "C:\OpenServer\domains\MyShop02\views\default\leftcolum.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_596f9e440849d2_12495814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79c00a128616d0fd7407c8203c68c2bf8b038314' => 
    array (
      0 => 'C:\\OpenServer\\domains\\MyShop02\\views\\default\\leftcolum.tpl',
      1 => 1500487077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596f9e440849d2_12495814 (Smarty_Internal_Template $_smarty_tpl) {
?>
  
    <div id="leftColum">
        <div id="leftMenu">
            <div class="menuCaption">меню:</div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <a href="#"> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a> <br />
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

        </div>
    </div>
<?php }
}

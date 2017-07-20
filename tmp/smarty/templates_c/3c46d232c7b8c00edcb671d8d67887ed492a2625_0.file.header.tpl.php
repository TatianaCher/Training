<?php
/* Smarty version 3.1.32-dev-11, created on 2017-07-20 17:08:21
  from "C:\OpenServer\domains\MyShop02\views\default\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_5970b9552c3f15_96861063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c46d232c7b8c00edcb671d8d67887ed492a2625' => 
    array (
      0 => 'C:\\OpenServer\\domains\\MyShop02\\views\\default\\header.tpl',
      1 => 1500559278,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolum.tpl' => 1,
  ),
),false)) {
function content_5970b9552c3f15_96861063 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['TemplateWebPath']->value;?>
css/main.css" type="text/css"/>
        <link rel="stylesheet" href="/static/css/bootstrap.css">
        
    </head>
    
    <body>
     <div id="header">
        <h1>
            Интернет магазин
        </h1>
    </div>
     
        
  <?php $_smarty_tpl->_subTemplateRender('file:leftcolum.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      
        
    <div id="centerColum">
      <?php }
}

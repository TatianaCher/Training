<?php
/* Smarty version 3.1.32-dev-11, created on 2017-08-22 17:22:00
  from "C:\OpenServer\domains\Training\views\default\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_599c3e08cbf311_91733188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c679dbddc2236e411df5471ae8194d9bab0ed517' => 
    array (
      0 => 'C:\\OpenServer\\domains\\Training\\views\\default\\header.tpl',
      1 => 1503058686,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolum.tpl' => 1,
  ),
),false)) {
function content_599c3e08cbf311_91733188 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['TemplateWebPath']->value;?>
css/main.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['TemplateWebPath']->value;?>
css/bootstrap.css" type="text/css"/>
        <?php echo '<script'; ?>
 type="text/javascript" src="/js/main.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
        
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

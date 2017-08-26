<?php
/* Smarty version 3.1.32-dev-11, created on 2017-08-26 22:18:32
  from "C:\OpenServer\domains\Training\views\default\user.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_59a1c9888b3c02_58264794',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6481148cfca9db959571e39246fd98ef22ca063a' => 
    array (
      0 => 'C:\\OpenServer\\domains\\Training\\views\\default\\user.tpl',
      1 => 1503774050,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a1c9888b3c02_58264794 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h1> Ваши регистрационные данные  </h1>
 
        
            <table border="0">
                <tbody>
            <tr>
                <td> Логин(email) </td>
                <td> <?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
 </td> 
                 
            </tr>
            
            <tr>
                <td> Имя </td>
                <td> <input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
" </td>
                 
            </tr>
            
            <tr>
                <td> Aдрес </td>
                <td> <textarea id="newAdress" ><?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
</textarea> </td>
                 
            </tr>
            
            <tr>
                <td> Новый пароль </td>
                <td> <input type="password" id="newPwd1" value="" </td>
            </tr>
            <tr>
                <td> Повтор пароля </td>
                <td> <input type="password" id="newPwd2" value="" </td>
            </tr>
            <tr>
                <td> Для того чтобы сохранить текущие данные ввидите пароль </td>
                <td> <input type="password" id="curPwd" value="" </td>
            </tr>
            
            <tr>
                <td>&nbsp;</td>
                <td> <input type="button"  value="Сохранить изменения" onClick="updateUserData();"</td>
            </tr>
                </tbody>
            </table>
           
    <?php }
}

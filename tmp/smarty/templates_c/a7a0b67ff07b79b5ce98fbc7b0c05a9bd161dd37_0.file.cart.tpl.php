<?php
/* Smarty version 3.1.32-dev-11, created on 2017-08-17 14:46:17
  from "C:\OpenServer\domains\MyShop02\views\default\cart.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_5995820958ec60_36830336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7a0b67ff07b79b5ce98fbc7b0c05a9bd161dd37' => 
    array (
      0 => 'C:\\OpenServer\\domains\\MyShop02\\views\\default\\cart.tpl',
      1 => 1502970370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5995820958ec60_36830336 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h1> Корзина </h1>
 
 
    
    <?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
        В корзине пусто 
        
        <?php } else { ?>
            
            <h2> Данные заказа </h2>
            <table>
                <tbody>
            <tr>
                <td>                    №                   </td>
                <td>                    Наименование         </td>
                <td>                    Количество           </td>
                <td>                    Цена за единицу      </td>
                <td>                    Цена                 </td>
                <td>                    Действие             </td>
            </tr>
            
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
            <tr>
                <td>   <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
   </td>
                <td>  
                    <a href="/?controller=product&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" >
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>  
                </td>
                
                <td> 
                    <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="1" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"/>
                </td> 
                <td>                    
                    <span id='itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
'>       
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                    </span>
                </td>
                <td>
                    <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                    </span>
                </td>
                <td>
                <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Удалить"> Удалить </a>  
                <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="hideme"  href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Восстановить"> Восстановить </a>  
 
                </td>
            </tr>
            </tbody>
            </table>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


    <?php }?>                  
   
    <?php }
}

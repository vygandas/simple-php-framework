<?php /* Smarty version Smarty-3.1.8, created on 2014-06-05 06:19:03
         compiled from "views/products/index.html" */ ?>
<?php /*%%SmartyHeaderCode:34759739553900bd7e9dad1-99098582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '520172fb215a692f239833e38d66769d78765b98' => 
    array (
      0 => 'views/products/index.html',
      1 => 1350806226,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34759739553900bd7e9dad1-99098582',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
    'value' => 0,
    'baseUrl' => 0,
    'productkey' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53900bd7ed1575_03385904',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53900bd7ed1575_03385904')) {function content_53900bd7ed1575_03385904($_smarty_tpl) {?><h1>Products</h1>
<table>
<thead>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Delivery</th>
    </tr>
</thead>
<tbody>    
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['productkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['productkey']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
       <tr>
        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['value']->value;?>

            </td>
        <?php } ?> 
        <td>
            <a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/products/details/<?php echo $_smarty_tpl->tpl_vars['productkey']->value;?>
">Details</a>
        </td>
       </tr>
    <?php } ?>
</tbody>
</table><?php }} ?>
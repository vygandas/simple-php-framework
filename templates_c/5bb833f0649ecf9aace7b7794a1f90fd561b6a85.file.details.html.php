<?php /* Smarty version Smarty-3.1.8, created on 2014-06-05 06:19:06
         compiled from "views/products/details.html" */ ?>
<?php /*%%SmartyHeaderCode:56145636753900bdaed6441-01049149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bb833f0649ecf9aace7b7794a1f90fd561b6a85' => 
    array (
      0 => 'views/products/details.html',
      1 => 1350806722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56145636753900bdaed6441-01049149',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53900bdaf0a6f7_69905779',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53900bdaf0a6f7_69905779')) {function content_53900bdaf0a6f7_69905779($_smarty_tpl) {?><h1>Product details</h1>
<table>
    <tr>
        <td>Name</td>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value["name"];?>
</td>
    </tr>
    <tr>
        <td>Price</td>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value["price"];?>
</td>
    </tr>
    <tr>
        <td>Delivery</td>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value["delivery-time"];?>
</td>
    </tr>    
</table>    
<a href="../">Back to products</a>    <?php }} ?>
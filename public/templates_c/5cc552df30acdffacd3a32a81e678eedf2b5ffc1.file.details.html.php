<?php /* Smarty version Smarty-3.1.8, created on 2014-06-16 11:01:24
         compiled from "/Users/vygandas/Documents/php/ouvet/views/products/details.html" */ ?>
<?php /*%%SmartyHeaderCode:444518767539ea4548faad3-53588912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cc552df30acdffacd3a32a81e678eedf2b5ffc1' => 
    array (
      0 => '/Users/vygandas/Documents/php/ouvet/views/products/details.html',
      1 => 1350806722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '444518767539ea4548faad3-53588912',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_539ea45494e9a0_72305156',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539ea45494e9a0_72305156')) {function content_539ea45494e9a0_72305156($_smarty_tpl) {?><h1>Product details</h1>
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
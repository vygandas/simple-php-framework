<?php /* Smarty version Smarty-3.1.8, created on 2014-06-13 23:25:13
         compiled from "/Users/vygandas/Documents/php/ouvet/views/products/details.html" */ ?>
<?php /*%%SmartyHeaderCode:2019500989539b5e2934d189-10596290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '2019500989539b5e2934d189-10596290',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_539b5e293766f4_41716711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539b5e293766f4_41716711')) {function content_539b5e293766f4_41716711($_smarty_tpl) {?><h1>Product details</h1>
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
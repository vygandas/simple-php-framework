<?php /* Smarty version Smarty-3.1.8, created on 2014-06-18 11:42:30
         compiled from "/Users/vygandas/Documents/php/ouvet/views/users/index.html" */ ?>
<?php /*%%SmartyHeaderCode:2031145817539ebdad460d65-91435196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36eb4552a70a1f6ff485388977e21ce79bd19268' => 
    array (
      0 => '/Users/vygandas/Documents/php/ouvet/views/users/index.html',
      1 => 1403080938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2031145817539ebdad460d65-91435196',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_539ebdad49f619_43828134',
  'variables' => 
  array (
    'hellomessage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539ebdad49f619_43828134')) {function content_539ebdad49f619_43828134($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['hellomessage']->value;?>
</h1>

        <form method="post">
            <h2>Test form</h2>
            <input name="my_name" type="text">
            <button>Submit me</button>
        </form><?php }} ?>
<?php /* Smarty version Smarty-3.1.8, created on 2014-06-18 14:35:06
         compiled from "/Users/vygandas/Documents/php/ouvet/views/shared.html" */ ?>
<?php /*%%SmartyHeaderCode:1303665410539ea7364600d4-20728053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5f02a8142e54f58f1d46449670e2b4e690a1418' => 
    array (
      0 => '/Users/vygandas/Documents/php/ouvet/views/shared.html',
      1 => 1403091301,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1303665410539ea7364600d4-20728053',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_539ea73646a0e9_56083961',
  'variables' => 
  array (
    'contents' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539ea73646a0e9_56083961')) {function content_539ea73646a0e9_56083961($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title><?php echo _t("WebShop");?>
</title>
    <link rel="stylesheet" href="<?php echo Assets::GetCss();?>
" />
</head>
<body>

<div id="everything">
    <div id="leftpanel">
        <h1><?php echo _t("Welcome to Ouvet");?>
</h1>
        <img src="<?php echo A::Link('images/says_hi.png');?>
" width="220" />
        
    </div>
    <div id="rightpanel">
        <div id="navigation">
            <a href="<?php echo A::Link('/');?>
"><?php echo _t("Home");?>
</a>&nbsp;|&nbsp;<a href="<?php echo A::Link('products');?>
"><?php echo _t("Products");?>
</a>&nbsp;|&nbsp;
            <a href="<?php echo R::ToNamed('users');?>
"><?php echo _t("Users");?>
</a>
        </div>
        <div>
            <?php echo $_smarty_tpl->tpl_vars['contents']->value;?>

        </div>
    </div>
    <script src="<?php echo Assets::GetJs();?>
"></script>
</div>

</body>
</html><?php }} ?>
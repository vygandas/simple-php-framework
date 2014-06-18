<?php /* Smarty version Smarty-3.1.8, created on 2014-06-13 23:55:20
         compiled from "views/shared.html" */ ?>
<?php /*%%SmartyHeaderCode:9435516053900bac776ab1-52576805%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51633008fda0776c8be692a2b07fc51efd9420a1' => 
    array (
      0 => 'views/shared.html',
      1 => 1402692859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9435516053900bac776ab1-52576805',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53900bac780454_14357103',
  'variables' => 
  array (
    'baseUrl' => 0,
    'contents' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53900bac780454_14357103')) {function content_53900bac780454_14357103($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>WebShop</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/assets/css/default.css" />
</head>
<body>

<div id="everything">
    <div id="leftpanel">
        <h1><?php echo t("Our Bakery");?>
</h1>
        <h2>Your taste</h2>
        <img src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/assets/images/bakery.jpg" width="220" />
        
    </div>
    <div id="rightpanel">
        <div id="navigation">
            <a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/home">Home</a>&nbsp;|&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/products">Products</a>
        </div>
        <div>
            <?php echo $_smarty_tpl->tpl_vars['contents']->value;?>

        </div>
    </div>
</div>

</body>
</html><?php }} ?>
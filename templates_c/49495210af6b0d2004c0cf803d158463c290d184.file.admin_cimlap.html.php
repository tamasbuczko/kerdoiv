<?php /* Smarty version Smarty-3.1.14, created on 2014-07-19 08:38:16
         compiled from ".\templates\admin_cimlap.html" */ ?>
<?php /*%%SmartyHeaderCode:3165853ca2e7884eee0-93161254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49495210af6b0d2004c0cf803d158463c290d184' => 
    array (
      0 => '.\\templates\\admin_cimlap.html',
      1 => 1405758093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3165853ca2e7884eee0-93161254',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ca2e788f9225_73223093',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ca2e788f9225_73223093')) {function content_53ca2e788f9225_73223093($_smarty_tpl) {?><!--
<form action="" method="post" style="float: right; margin-right: 20px; font-size: 14px;">
			Nyelv:
			<select name="lang">
				<option value="" <?php if ($_SESSION['lang']==''){?><?php }?>></option>
				<option value="hu" <?php if ($_SESSION['lang']=='hu'){?>selected="selected"<?php }?>>hu</option>
				<option value="en" <?php if ($_SESSION['lang']=='en'){?>selected="selected"<?php }?>>en</option>
				<option value="ro" <?php if ($_SESSION['lang']=='ro'){?>selected="selected"<?php }?>>ro</option>
			</select>
			<input type="submit" name="submit" value="OK" />
</form>
--><?php }} ?>
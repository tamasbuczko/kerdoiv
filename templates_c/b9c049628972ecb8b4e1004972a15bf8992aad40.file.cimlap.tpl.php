<?php /* Smarty version Smarty-3.1.14, created on 2014-06-14 19:18:59
         compiled from "templates\cimlap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11897539bf5f4487888-25066927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9c049628972ecb8b4e1004972a15bf8992aad40' => 
    array (
      0 => 'templates\\cimlap.tpl',
      1 => 1402766335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11897539bf5f4487888-25066927',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_539bf5f4824cf9_66200148',
  'variables' => 
  array (
    'lang' => 0,
    'nyilvanos_kerdoivek' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539bf5f4824cf9_66200148')) {function content_539bf5f4824cf9_66200148($_smarty_tpl) {?><div id="nyilvanos_kerdoivek">
   <div>
    <h2><?php echo $_smarty_tpl->tpl_vars['lang']->value['uj_nyilvanos_kerdoivek'];?>
</h2>
    <?php echo $_smarty_tpl->tpl_vars['nyilvanos_kerdoivek']->value;?>


   </div>
	<a href="?p=nyilvanos" class="nyilvanos_link"><?php echo $_smarty_tpl->tpl_vars['lang']->value['További nyilvános kérdőívek'];?>
...</a>
</div>

<form action="" name="login" method="post" class="login">
  <h2><?php echo $_smarty_tpl->tpl_vars['lang']->value['bejelentkezés'];?>
</h2>
  <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['azonosító'];?>
:</label><input type="text" name="azonosito" value="" />
  <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['jelszó'];?>
:</label><input type="password" name="jelszo" value="" />
  <input name="send" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['bejelentkezés'];?>
" />
  <a href="?p=regisztracio"><?php echo $_smarty_tpl->tpl_vars['lang']->value['regisztráció'];?>
</a>
</form><?php }} ?>
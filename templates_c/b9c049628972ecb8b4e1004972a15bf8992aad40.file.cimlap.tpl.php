<?php /* Smarty version Smarty-3.1.14, created on 2014-07-19 08:28:43
         compiled from "templates\cimlap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2414053ca2c3b76e7c4-76045441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9c049628972ecb8b4e1004972a15bf8992aad40' => 
    array (
      0 => 'templates\\cimlap.tpl',
      1 => 1405758093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2414053ca2c3b76e7c4-76045441',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'nyilvanos_kerdoivek' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ca2c3b830b86_01814536',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ca2c3b830b86_01814536')) {function content_53ca2c3b830b86_01814536($_smarty_tpl) {?><div id="nyilvanos_kerdoivek">
   <div>
    <h2><?php echo $_smarty_tpl->tpl_vars['lang']->value['uj_nyilvanos_kerdoivek'];?>
</h2>
    <?php echo $_smarty_tpl->tpl_vars['nyilvanos_kerdoivek']->value;?>


   </div>
	<a href="?p=nyilvanos" class="nyilvanos_link"><?php echo $_smarty_tpl->tpl_vars['lang']->value['További nyilvános kérdőívek'];?>
...</a>
</div>

<form action="index.php" name="login" method="post" class="login">
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
  <a href="?p=elfelejtett"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Elfelejtett jelszó'];?>
...</a>
</form><?php }} ?>
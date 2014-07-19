<?php /* Smarty version Smarty-3.1.14, created on 2014-07-19 08:30:00
         compiled from "templates\kapcsolat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2773253ca2c88e976a8-38513199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eff9cd6fd3524b1dbc52c620c62c154a3904dd35' => 
    array (
      0 => 'templates\\kapcsolat.tpl',
      1 => 1405758093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2773253ca2c88e976a8-38513199',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ca2c88f22233_55246258',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ca2c88f22233_55246258')) {function content_53ca2c88f22233_55246258($_smarty_tpl) {?><form action="" name="register" method="post" class="login">
    <h2><?php echo $_smarty_tpl->tpl_vars['lang']->value['Kapcsolat'];?>
</h2>
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Az Ön e-mail címe'];?>
:</label><input type="text" name="email" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Üzenet'];?>
:</label><textarea name="uzenet"></textarea>
    <input name="send" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Elküldés'];?>
" />
</form><?php }} ?>
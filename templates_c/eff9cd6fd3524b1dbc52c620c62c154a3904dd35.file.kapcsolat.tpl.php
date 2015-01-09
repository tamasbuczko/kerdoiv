<?php /* Smarty version Smarty-3.1.14, created on 2015-01-09 14:59:45
         compiled from "templates\kapcsolat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2877654afded12bd8c6-93998269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eff9cd6fd3524b1dbc52c620c62c154a3904dd35' => 
    array (
      0 => 'templates\\kapcsolat.tpl',
      1 => 1408901555,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2877654afded12bd8c6-93998269',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'szotar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54afded12ec6d5_50928773',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54afded12ec6d5_50928773')) {function content_54afded12ec6d5_50928773($_smarty_tpl) {?><form action="" name="register" method="post" class="login">
    <h2><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Kapcsolat');?>
</h2>
    <label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Az Ön e-mail címe');?>
:</label><input type="text" name="email" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Üzenet');?>
:</label><textarea name="uzenet"></textarea>
    <input name="send" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Elküldés');?>
" />
</form><?php }} ?>
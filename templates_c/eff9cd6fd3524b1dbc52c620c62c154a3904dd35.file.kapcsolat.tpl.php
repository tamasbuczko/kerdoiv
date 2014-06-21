<?php /* Smarty version Smarty-3.1.14, created on 2014-06-21 08:59:07
         compiled from "templates\kapcsolat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3075453a52d3b13aae9-81819500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eff9cd6fd3524b1dbc52c620c62c154a3904dd35' => 
    array (
      0 => 'templates\\kapcsolat.tpl',
      1 => 1400095841,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3075453a52d3b13aae9-81819500',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53a52d3b1c1056_64491294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53a52d3b1c1056_64491294')) {function content_53a52d3b1c1056_64491294($_smarty_tpl) {?><form action="" name="register" method="post" class="login">
    <h2><?php echo $_smarty_tpl->tpl_vars['lang']->value['Kapcsolat'];?>
</h2>
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Az Ön e-mail címe'];?>
:</label><input type="text" name="email" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Üzenet'];?>
:</label><textarea name="uzenet"></textarea>
    <input name="send" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Elküldés'];?>
" />
</form><?php }} ?>
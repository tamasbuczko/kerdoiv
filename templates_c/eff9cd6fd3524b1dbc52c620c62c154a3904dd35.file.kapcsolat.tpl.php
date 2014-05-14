<?php /* Smarty version Smarty-3.1.14, created on 2014-05-14 21:41:44
         compiled from "templates\kapcsolat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13107536f84cd9cef50-85756301%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '13107536f84cd9cef50-85756301',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_536f84cdbe8b94_99209970',
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536f84cdbe8b94_99209970')) {function content_536f84cdbe8b94_99209970($_smarty_tpl) {?><form action="" name="register" method="post" class="login">
    <h2><?php echo $_smarty_tpl->tpl_vars['lang']->value['Kapcsolat'];?>
</h2>
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Az Ön e-mail címe'];?>
:</label><input type="text" name="email" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Üzenet'];?>
:</label><textarea name="uzenet"></textarea>
    <input name="send" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Elküldés'];?>
" />
</form><?php }} ?>
<?php /* Smarty version Smarty-3.1.14, created on 2014-05-27 22:55:18
         compiled from "templates\regisztracio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170785384f0c4322843-25186817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '165f4f3a544fff5ca35b373ff98d2f50e48ace40' => 
    array (
      0 => 'templates\\regisztracio.tpl',
      1 => 1401224013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170785384f0c4322843-25186817',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5384f0c44e0679_95551282',
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5384f0c44e0679_95551282')) {function content_5384f0c44e0679_95551282($_smarty_tpl) {?><!--<img src="graphics/QA_logo.png" alt="questionaction" id="csomagajanlatok" />-->
<form action="" name="register" method="post" class="login">
    <h2><?php echo $_smarty_tpl->tpl_vars['lang']->value['regisztráció'];?>
</h2>
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['azonosító'];?>
:</label><input type="text" name="reg_azonosito" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['e-mail'];?>
:</label><input type="text" name="email" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['jelszó'];?>
:</label><input type="password" name="jelszo" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['jelszó mégegyszer'];?>
:</label><input type="password" name="jelszo2" value="" />
    
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['választható csomagok'];?>
:</label>
    <div>
        <input type="radio" name="csomag" value="3" checked="checked" /><label><?php echo $_smarty_tpl->tpl_vars['lang']->value['ingyenes'];?>
</label>
    </div>
    <div>
        <input type="radio" name="csomag" value="4" /><label><?php echo $_smarty_tpl->tpl_vars['lang']->value['ezüst csomag'];?>
</label>
    </div>
    <div>
        <input type="radio" name="csomag" value="5" /><label><?php echo $_smarty_tpl->tpl_vars['lang']->value['arany csomag'];?>
</label>
    </div>
    <input name="send" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['regisztráció'];?>
" />
</form>

<table class="csomagok">
    <tr><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['csomagok'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['ingyenes'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['ezüst'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['arany'];?>
</th></tr>
</table><?php }} ?>
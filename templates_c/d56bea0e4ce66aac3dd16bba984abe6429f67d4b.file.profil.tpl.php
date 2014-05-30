<?php /* Smarty version Smarty-3.1.14, created on 2014-05-30 18:22:40
         compiled from "templates\profil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8690538372e1bcda09-42750824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd56bea0e4ce66aac3dd16bba984abe6429f67d4b' => 
    array (
      0 => 'templates\\profil.tpl',
      1 => 1401466301,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8690538372e1bcda09-42750824',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_538372e1d984e4_04540027',
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538372e1d984e4_04540027')) {function content_538372e1d984e4_04540027($_smarty_tpl) {?><form action="" name="profil" method="post" class="profil_form">
   <label>Azonosító:</label><input type="text" name="azonosito_mod" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->nev;?>
" />
   <label>E-mail cím:</label><input type="text" name="email_mod" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
" />
   <label>Új jelszó:</label><input type="password" name="jelszo1_mod" value="" />
   <label>Új jelszó megerősítése:</label><input type="password" name="jelszo2_mod" value="" />
   <br style="clear: both;" /><br style="clear: both;" />
   <label>Jelenlegi csomag:</label><br style="clear: both;" />
   <label>Ingyenes</label><input type="radio" name="csomag_mod" value="1" <?php if ($_smarty_tpl->tpl_vars['user']->value->jog=='1'){?>checked="checked"<?php }?>>
   <label>Ezüst</label><input type="radio" name="csomag_mod" value="2" <?php if ($_smarty_tpl->tpl_vars['user']->value->jog=='2'){?>checked="checked"<?php }?>>
   <label>Arany</label><input type="radio" name="csomag_mod" value="3" <?php if ($_smarty_tpl->tpl_vars['user']->value->jog=='3'){?>checked="checked"<?php }?>>
   <br style="clear: both;" />
   <br style="clear: both;" />
   <label>Csomag lejárati határideje:</label><input type="text" name="lejarat" readonly="readonly" value="korlátlan" />
   <br style="clear: both;" />
   <br style="clear: both;" />
   <input type="submit" name="submit" />
</form><?php }} ?>
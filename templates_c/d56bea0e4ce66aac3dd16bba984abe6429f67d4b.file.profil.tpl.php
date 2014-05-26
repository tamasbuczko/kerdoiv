<?php /* Smarty version Smarty-3.1.14, created on 2014-05-26 19:16:59
         compiled from "templates\profil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8690538372e1bcda09-42750824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd56bea0e4ce66aac3dd16bba984abe6429f67d4b' => 
    array (
      0 => 'templates\\profil.tpl',
      1 => 1401124604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8690538372e1bcda09-42750824',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_538372e1d984e4_04540027',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538372e1d984e4_04540027')) {function content_538372e1d984e4_04540027($_smarty_tpl) {?><form method="get" action="" class="profil_form">
   <label>Azonosító:</label><input type="text" name="azonosito" value="" />
   <label>Új jelszó:</label><input type="text" name="azonosito" value="" />
   <label>Új jelszó megerősítése:</label><input type="text" name="azonosito" value="" />
   <br style="clear: both;" /><br style="clear: both;" />
   <label>Csomag:</label><br style="clear: both;" />
   <label>Ingyenes</label><input type="radio" name="csomag" value="1">
   <label>Ezüst</label><input type="radio" name="csomag" value="2">
   <label>Arany</label><input type="radio" name="csomag" value="3">
   <br style="clear: both;" />
   <br style="clear: both;" />
   <input type="submit" name="submit" />
</form><?php }} ?>
<?php /* Smarty version Smarty-3.1.14, created on 2015-01-13 19:40:05
         compiled from "templates\zartkerdoivek.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2324454b5632de6ef72-08329783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '685dc3a680f971d68136da896566a207a6a80eb2' => 
    array (
      0 => 'templates\\zartkerdoivek.tpl',
      1 => 1421173692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2324454b5632de6ef72-08329783',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54b5632de99ef8_84817749',
  'variables' => 
  array (
    'kerdoiv_obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b5632de99ef8_84817749')) {function content_54b5632de99ef8_84817749($_smarty_tpl) {?><h2>Az értesítő email szövegének szerkesztése</h2>
<form action="" method="post">
    <textarea name="email_szoveg" style="width: 500px; height: 80px;"><?php echo $_smarty_tpl->tpl_vars['kerdoiv_obj']->value->zart_email_szoveg;?>
</textarea>
    <input type="submit" name="submit" value="mentés" style="display: block;" />
</form>

<script type="text/javascript" src="tinymce/tinymce_mod.js"></script>
    
<div id="PersonTableContainer" style="width: 830px; margin: 20px auto 20px auto;"></div>
<script>var kerdoiv = <?php echo $_smarty_tpl->tpl_vars['kerdoiv_obj']->value->sorszam;?>
;</script>
<script type="text/javascript" src="jtable/dat_zartkerdoivek.js"></script>

<form action="" method="post">
    <label>Jelszó szükséges:</label><input type="checkbox" name="jelszo_generalas" <?php if ($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->zart_jelszo=='1'){?>checked="checked"<?php }?> />
    <input type="submit" name="zart_email_kuldes" value="Kiküldés" style="display: block; margin-top: 20px;" />
</form><?php }} ?>
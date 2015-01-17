<?php /* Smarty version Smarty-3.1.14, created on 2015-01-17 09:50:52
         compiled from "templates\zartkerdoivek.tpl" */ ?>
<?php /*%%SmartyHeaderCode:622954ba1b8252f802-97838113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '685dc3a680f971d68136da896566a207a6a80eb2' => 
    array (
      0 => 'templates\\zartkerdoivek.tpl',
      1 => 1421484642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '622954ba1b8252f802-97838113',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54ba1b8255a781_58238838',
  'variables' => 
  array (
    'sablongombok' => 0,
    'kerdoiv_obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ba1b8255a781_58238838')) {function content_54ba1b8255a781_58238838($_smarty_tpl) {?><h2>Az értesítő email szövegének szerkesztése</h2>
<div class="emailsablon_gombok">
    <?php echo $_smarty_tpl->tpl_vars['sablongombok']->value;?>

</div>
<form action="" method="post">
    <textarea name="email_szoveg" id="email_szoveg" style="width: 500px; height: 80px;"><?php echo $_smarty_tpl->tpl_vars['kerdoiv_obj']->value->zart_email_szoveg;?>
</textarea>
    <input type="submit" name="submit" value="mentés" style="display: block;" />
</form>

<script type="text/javascript" src="tinymce/tinymce_mod.js"></script>
    
<div id="PersonTableContainer" style="width: 830px; margin: 20px auto 20px auto;"></div>
<script>var kerdoiv = <?php echo $_smarty_tpl->tpl_vars['kerdoiv_obj']->value->sorszam;?>
;</script>
<script type="text/javascript" src="jtable/dat_zartkerdoivek.js"></script>

<form action="" method="post">
    <label id="proba">Jelszó szükséges:</label><input type="checkbox" name="jelszo_generalas" <?php if ($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->zart_jelszo=='1'){?>checked="checked"<?php }?> />
    <input type="submit" name="zart_email_kuldes" value="Kiküldés" style="display: block; margin-top: 20px;" />
</form><?php }} ?>
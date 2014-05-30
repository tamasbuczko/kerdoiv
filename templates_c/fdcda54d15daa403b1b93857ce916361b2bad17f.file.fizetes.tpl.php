<?php /* Smarty version Smarty-3.1.14, created on 2014-05-30 17:38:38
         compiled from "templates\fizetes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52195388a5fe29f7d2-61496938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdcda54d15daa403b1b93857ce916361b2bad17f' => 
    array (
      0 => 'templates\\fizetes.tpl',
      1 => 1401464125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52195388a5fe29f7d2-61496938',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5388a5fe2dae06_81860649',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5388a5fe2dae06_81860649')) {function content_5388a5fe2dae06_81860649($_smarty_tpl) {?><form name="fizetes" method="post" action="?p=profil&pay=1">
	 <select name="termek">
		<option value="2">ezüst</option>
		<option value="3">arany</option>
	 </select>
	 
    Mennyiség :
	 <select name="itemQty">
		 <option value="1">1 hónap</option>
		 <option value="2">2 hónap</option>
		 <option value="3">3 hónap</option>
	 </select> 
    <input class="dw_button" type="submit" name="submitbutt" value="Fizetés" />
</form><?php }} ?>
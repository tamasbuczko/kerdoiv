<?php /* Smarty version Smarty-3.1.14, created on 2014-06-14 09:13:09
         compiled from "templates\cimlap2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28703539bf6055882d2-78209562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '179236fb9c96ed207e68e85ecff960f4c1205ac2' => 
    array (
      0 => 'templates\\cimlap2.tpl',
      1 => 1401209361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28703539bf6055882d2-78209562',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'nyilvanos_kerdoivek' => 0,
    'kitoltott_kerdoivek' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_539bf60578ff51_45760302',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539bf60578ff51_45760302')) {function content_539bf60578ff51_45760302($_smarty_tpl) {?><div id="nyilvanos_kerdoivek">
   <div>
    <h2><?php echo $_smarty_tpl->tpl_vars['lang']->value['uj_nyilvanos_kerdoivek'];?>
</h2>
    <?php echo $_smarty_tpl->tpl_vars['nyilvanos_kerdoivek']->value;?>

   </div>
	<a href="?p=nyilvanos" class="nyilvanos_link">További nyilvános kérdőívek...</a>
	
</div>
<div id="nyilvanos_kerdoivek" style="border: none; padding-left: 20px; width: 380px;">
   <div>
    <h2>Kitöltött kérdőívek</h2>
    <?php echo $_smarty_tpl->tpl_vars['kitoltott_kerdoivek']->value;?>

   </div>
	<a href="?p=kitoltott" class="nyilvanos_link">További kitöltött kérdőívek...</a>
</div><?php }} ?>
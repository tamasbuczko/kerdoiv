<?php /* Smarty version Smarty-3.1.14, created on 2014-07-19 08:30:41
         compiled from "templates\cimlap2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1652953ca2cb1036b95-97114422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '179236fb9c96ed207e68e85ecff960f4c1205ac2' => 
    array (
      0 => 'templates\\cimlap2.tpl',
      1 => 1405758093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1652953ca2cb1036b95-97114422',
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
  'unifunc' => 'content_53ca2cb10e8c49_31030884',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ca2cb10e8c49_31030884')) {function content_53ca2cb10e8c49_31030884($_smarty_tpl) {?><div id="nyilvanos_kerdoivek">
   <div>
    <h2><?php echo $_smarty_tpl->tpl_vars['lang']->value['uj_nyilvanos_kerdoivek'];?>
</h2>
    <?php echo $_smarty_tpl->tpl_vars['nyilvanos_kerdoivek']->value;?>

   </div>
	<a href="?p=nyilvanos" class="nyilvanos_link"><?php echo $_smarty_tpl->tpl_vars['lang']->value['További nyilvános kérdőívek'];?>
...</a>
	
</div>
<div id="nyilvanos_kerdoivek" style="border: none; padding-left: 20px; width: 380px; border-left: 3px solid #ececec;" >
   <div>
    <h2><?php echo $_smarty_tpl->tpl_vars['lang']->value['Követett nyilvános kérdőívek'];?>
</h2>
    <?php echo $_smarty_tpl->tpl_vars['kitoltott_kerdoivek']->value;?>

   </div>
	<a href="?p=kitoltott" class="nyilvanos_link"><?php echo $_smarty_tpl->tpl_vars['lang']->value['További követett kérdőívek'];?>
...</a>
</div><?php }} ?>
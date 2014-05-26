<?php /* Smarty version Smarty-3.1.14, created on 2014-05-26 12:35:14
         compiled from "templates\kerdoiveim.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8615374fcd5bb1334-80371822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '867ccddede9abc3105f2a5a315ff4dc2b58b5a44' => 
    array (
      0 => 'templates\\kerdoiveim.tpl',
      1 => 1401031120,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8615374fcd5bb1334-80371822',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5374fcd5d69973_44236331',
  'variables' => 
  array (
    'display_none' => 0,
    'lang' => 0,
    'nyelv_fejlec' => 0,
    'lista_kerdoiveim' => 0,
    'uzenet' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5374fcd5d69973_44236331')) {function content_5374fcd5d69973_44236331($_smarty_tpl) {?><table class="kerdoiveim"<?php echo $_smarty_tpl->tpl_vars['display_none']->value;?>
>
    <tr><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['cím/adatlap'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['eredmények'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['kitöltés nézet'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['módosítás'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['aktív/ inaktív'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['kitöltötték'];?>
</th><?php echo $_smarty_tpl->tpl_vars['nyelv_fejlec']->value;?>
</tr>
    <?php echo $_smarty_tpl->tpl_vars['lista_kerdoiveim']->value;?>

</table>
<?php echo $_smarty_tpl->tpl_vars['uzenet']->value;?>

<a href="?p=ujkerdoiv" class="zold_gomb"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Új kérdőív rögzítése'];?>
</a><?php }} ?>
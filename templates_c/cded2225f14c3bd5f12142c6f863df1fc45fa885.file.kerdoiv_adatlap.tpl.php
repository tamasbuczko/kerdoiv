<?php /* Smarty version Smarty-3.1.14, created on 2014-07-19 09:08:34
         compiled from "templates\kerdoiv_adatlap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:911553ca359283f644-15106286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cded2225f14c3bd5f12142c6f863df1fc45fa885' => 
    array (
      0 => 'templates\\kerdoiv_adatlap.tpl',
      1 => 1405758093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '911553ca359283f644-15106286',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'kerdoiv_sorszam' => 0,
    'elozo_kerdoiv' => 0,
    'hanyadik_kerdoiv' => 0,
    'osszes_kerdoiv' => 0,
    'kovetkezo_kerdoiv' => 0,
    'kerdoiv_cim' => 0,
    'kerdoiv_leiras' => 0,
    'zaszlok' => 0,
    'nyilvanos' => 0,
    'kerdesek_szama' => 0,
    'valaszadok_szama' => 0,
    'valaszadok_szama_emailes' => 0,
    'created_date' => 0,
    'activated_date' => 0,
    'expire_date' => 0,
    'elerhetoseg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ca3592978a60_00165367',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ca3592978a60_00165367')) {function content_53ca3592978a60_00165367($_smarty_tpl) {?><h1>Kérdőív adatlap</h1>

<div id="control_box">
   <h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Vezérlőpult'];?>
</h3>
    <div class="adatlap_pult">
        <a href="?p=eredmeny&kerdoiv=<?php echo $_smarty_tpl->tpl_vars['kerdoiv_sorszam']->value;?>
" alt="eredmények" ><?php echo $_smarty_tpl->tpl_vars['lang']->value['eredmények'];?>
</a>
        <a href="?p=kerdoiv&mod=1&kerdoiv=<?php echo $_smarty_tpl->tpl_vars['kerdoiv_sorszam']->value;?>
" alt="módosítás" ><?php echo $_smarty_tpl->tpl_vars['lang']->value['módosítás'];?>
</a>
        <a href="?p=kerdoiv&kerdoiv=<?php echo $_smarty_tpl->tpl_vars['kerdoiv_sorszam']->value;?>
" alt="kitöltés" ><?php echo $_smarty_tpl->tpl_vars['lang']->value['kitöltés nézet'];?>
</a>
    </div> 
    <div id="lepteto">
            <a href="?p=kerdoiv_adatlap&kerdoiv=<?php echo $_smarty_tpl->tpl_vars['elozo_kerdoiv']->value;?>
" /></a>
            <span><?php echo $_smarty_tpl->tpl_vars['hanyadik_kerdoiv']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['osszes_kerdoiv']->value;?>
</span>
            <a href="?p=kerdoiv_adatlap&kerdoiv=<?php echo $_smarty_tpl->tpl_vars['kovetkezo_kerdoiv']->value;?>
" /></a>
    </div>
	<a href="?p=kerdoiveim" class="back"><?php echo $_smarty_tpl->tpl_vars['lang']->value['vissza'];?>
</a>
    <br style="clear: both;" />
</div>

<div id="kerdoiv_adatlap">
    <h2><?php echo $_smarty_tpl->tpl_vars['kerdoiv_cim']->value;?>
</h2>
    <p><?php echo $_smarty_tpl->tpl_vars['kerdoiv_leiras']->value;?>
</p>
    <?php echo $_smarty_tpl->tpl_vars['zaszlok']->value;?>

    <br/><br/><br/><br/><br/><br style="clear: both;"/>
	<table class="adatlap_table">
    <tr><?php echo $_smarty_tpl->tpl_vars['nyilvanos']->value;?>
</tr>
    <tr><?php echo $_smarty_tpl->tpl_vars['kerdesek_szama']->value;?>
</tr>
    <tr><?php echo $_smarty_tpl->tpl_vars['valaszadok_szama']->value;?>
</tr>
    <tr><?php echo $_smarty_tpl->tpl_vars['valaszadok_szama_emailes']->value;?>
</tr>
    <tr><?php echo $_smarty_tpl->tpl_vars['created_date']->value;?>
</tr>
    <tr><?php echo $_smarty_tpl->tpl_vars['activated_date']->value;?>
</tr>
    <?php echo $_smarty_tpl->tpl_vars['expire_date']->value;?>

    <tr><?php echo $_smarty_tpl->tpl_vars['elerhetoseg']->value;?>
</tr>
	</table>
</div>

<?php }} ?>
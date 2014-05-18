<?php /* Smarty version Smarty-3.1.14, created on 2014-05-18 20:20:38
         compiled from "templates\kerdoiv_adatlap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77395378ebcf0be6c1-19373174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cded2225f14c3bd5f12142c6f863df1fc45fa885' => 
    array (
      0 => 'templates\\kerdoiv_adatlap.tpl',
      1 => 1400437235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77395378ebcf0be6c1-19373174',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5378ebcf63c3d1_45807255',
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
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5378ebcf63c3d1_45807255')) {function content_5378ebcf63c3d1_45807255($_smarty_tpl) {?><h1>Kérdőív adatlap</h1>

<div id="control_box">
   <h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Vezérlőpult'];?>
</h3>
    <table class="adatlap_pult">
    <tr><td><img src="graphics/icon_graph.png" alt="eredmények" /></td><td><a  class="adatlap_pult" href="?p=eredmeny&kerdoiv=<?php echo $_smarty_tpl->tpl_vars['kerdoiv_sorszam']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['lang']->value['eredmények'];?>
</a><br /></td></tr>
    <tr><td><img src="graphics/icon_edit.gif" alt="módosítás" /></td><td><a  class="adatlap_pult" href="?p=kerdoiv&mod=1&kerdoiv=<?php echo $_smarty_tpl->tpl_vars['kerdoiv_sorszam']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['lang']->value['módosítás'];?>
</a><br /></td></tr>
    <tr><td><img src="graphics/icon_checked.png" alt="kitöltés" /></td><td><a  class="adatlap_pult" href="?p=kerdoiv&kerdoiv=<?php echo $_smarty_tpl->tpl_vars['kerdoiv_sorszam']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['lang']->value['kitöltés nézet'];?>
</a></td></tr>
    </table> 
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
	<table>
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

	</table>
</div>

<?php }} ?>
<?php /* Smarty version Smarty-3.1.14, created on 2014-06-12 15:13:06
         compiled from "templates\nyilvanos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21613538ae4270c54e9-43964366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9824c263124e894146075702f2c8efa3502e654a' => 
    array (
      0 => 'templates\\nyilvanos.tpl',
      1 => 1402578499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21613538ae4270c54e9-43964366',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_538ae427110d46_81892082',
  'variables' => 
  array (
    'keres' => 0,
    'nyilvanos_kerdoivek' => 0,
    'navsav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538ae427110d46_81892082')) {function content_538ae427110d46_81892082($_smarty_tpl) {?><form name="keres" method="post" />
   <label>Keresés:</label><input name="keres" type="text" value="<?php echo $_smarty_tpl->tpl_vars['keres']->value;?>
" />
   <input name="submit" type="submit" value="keresés" />
</form>
<br />
<div class="nyilvanos_kerdoivek">
    <?php echo $_smarty_tpl->tpl_vars['nyilvanos_kerdoivek']->value;?>

    <p> Írja ki hány találat volt. A keresett szó a címben is vastag kék betűs legyen. A szöveg sorközét csökkenteni, hátteret gradiensre állítani fentről lefelé sötétedve, bal alsó saroktól kezdve feltüntetni a létrehozó nevét és dátumot, majd a kitöltések számát és az eredményhez hozzáférők számát valamint az ajándéksorsolás a kitöltők között van vagy nincs infót. A jobb oldalon a feltöltött képekből egyet meg kell jeleníteni. </p>
</div>
<br />

<?php echo $_smarty_tpl->tpl_vars['navsav']->value;?>
<?php }} ?>
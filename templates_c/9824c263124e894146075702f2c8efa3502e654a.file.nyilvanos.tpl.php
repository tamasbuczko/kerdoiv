<?php /* Smarty version Smarty-3.1.14, created on 2014-07-19 09:09:11
         compiled from "templates\nyilvanos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2662153ca35b70292d0-73692418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9824c263124e894146075702f2c8efa3502e654a' => 
    array (
      0 => 'templates\\nyilvanos.tpl',
      1 => 1405758093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2662153ca35b70292d0-73692418',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'keres' => 0,
    'talalatszam' => 0,
    'obj_array' => 0,
    'objektum' => 0,
    'nyilvanos_kerdoivek' => 0,
    'navsav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ca35b71b1db3_81325593',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ca35b71b1db3_81325593')) {function content_53ca35b71b1db3_81325593($_smarty_tpl) {?><form action="?p=nyilvanos" name="keres" method="get" />
   <label><?php echo $_smarty_tpl->tpl_vars['lang']->value["Keresés"];?>
:</label><input name="keres" type="text" value="<?php echo $_smarty_tpl->tpl_vars['keres']->value;?>
" />
   <input name="submit" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value["Keresés"];?>
" />
   <input type="hidden" name="p" value="nyilvanos" />
<?php if ($_REQUEST['keres']){?>
   <?php echo $_smarty_tpl->tpl_vars['talalatszam']->value;?>

<?php }?>
</form>
<div id="nyilvanos_lista_info">
    <span><?php echo $_smarty_tpl->tpl_vars['lang']->value["A Nyilvános kérdőívek segítenek a piackutatásban és közvélemény kutatásban. A keresett kérdőív és eredménye követhetővé válik annak a bejelentkezett felhasználónak aki kitölti azt korrekt módon."];?>
</span>
</div>
<br />
<div id="nyilvanos_lista">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['obj'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['name'] = 'obj';
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj_array']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['total']);
?>
<?php $_smarty_tpl->tpl_vars['objektum'] = new Smarty_variable($_smarty_tpl->tpl_vars['obj_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['obj']['index']], null, 0);?>
<div style="display: block; clear: both;">
    <div id="nyilvanos_lista_kep"><img src="graphics/nincs_kep.png" alt="" /></div>    
    <div id="nyilvanos_lista_1">
    <h3><a href="?p=kerdoiv&amp;kerdoiv=<?php echo $_smarty_tpl->tpl_vars['objektum']->value->sorszam;?>
">
        <?php echo $_smarty_tpl->tpl_vars['objektum']->value->cim;?>

    </a></h3>
    <p>
        <?php echo $_smarty_tpl->tpl_vars['objektum']->value->leiras;?>

    </p>    
    <table>
        <tr><th><?php echo $_smarty_tpl->tpl_vars['lang']->value["Létrehozó"];?>
: </th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value["Dátum"];?>
: </th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value["Kitöltők száma"];?>
: </th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value["Követők száma"];?>
: </th><th></th></tr>    
        <tr><th><?php echo $_smarty_tpl->tpl_vars['objektum']->value->keszito;?>
</th><th><?php echo $_smarty_tpl->tpl_vars['objektum']->value->aktivalas_datuma;?>
</th><th><?php echo $_smarty_tpl->tpl_vars['objektum']->value->kitoltok_szama;?>
</th><th><?php echo $_smarty_tpl->tpl_vars['objektum']->value->kovetok_szama;?>
</th><th></th></tr>    
    </table>
<?php if ($_smarty_tpl->tpl_vars['objektum']->value->ajandek=='1'){?>
    <img src="graphics/ajandek_ikon.png" alt="" title='Van ajándéksorsolás'/>
<?php }else{ ?>
    <img src="graphics/ajandek_ikon_nincs.png" alt="" title='Nincs ajándéksorsolás'/>
<?php }?>
    </div>
</div>
<?php endfor; endif; ?>
</div>
<div class="nyilvanos_kerdoivek">
    <?php echo $_smarty_tpl->tpl_vars['nyilvanos_kerdoivek']->value;?>
    
</div>
<br />
<?php echo $_smarty_tpl->tpl_vars['navsav']->value;?>
<?php }} ?>
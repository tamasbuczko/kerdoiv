<?php /* Smarty version Smarty-3.1.14, created on 2014-06-14 19:42:31
         compiled from "templates\nyilvanos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14645539bff60be3a59-96966737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9824c263124e894146075702f2c8efa3502e654a' => 
    array (
      0 => 'templates\\nyilvanos.tpl',
      1 => 1402767749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14645539bff60be3a59-96966737',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_539bff60e40c41_14727235',
  'variables' => 
  array (
    'keres' => 0,
    'talalatszam' => 0,
    'obj_array' => 0,
    'sor' => 0,
    'nyilvanos_kerdoivek' => 0,
    'navsav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539bff60e40c41_14727235')) {function content_539bff60e40c41_14727235($_smarty_tpl) {?><form name="keres" method="post" />
   <label>Keresés:</label><input name="keres" type="text" value="<?php echo $_smarty_tpl->tpl_vars['keres']->value;?>
" />
   <input name="submit" type="submit" value="keresés" />
<?php if ($_REQUEST['keres']){?>
   <?php echo $_smarty_tpl->tpl_vars['talalatszam']->value;?>

<?php }?>
</form>
<br />

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
    <?php $_smarty_tpl->tpl_vars['sor'] = new Smarty_variable($_smarty_tpl->tpl_vars['obj_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['obj']['index']], null, 0);?>
    
    <a href="?p=kerdoiv&amp;kerdoiv=<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
">
        <?php echo $_smarty_tpl->tpl_vars['sor']->value->cim;?>

    </a>
    <div>
        <?php echo $_smarty_tpl->tpl_vars['sor']->value->leiras;?>

    </div>
       
    
<?php endfor; endif; ?>

<div class="nyilvanos_kerdoivek">
    <?php echo $_smarty_tpl->tpl_vars['nyilvanos_kerdoivek']->value;?>
    
</div>
<br />
<?php echo $_smarty_tpl->tpl_vars['navsav']->value;?>
<?php }} ?>
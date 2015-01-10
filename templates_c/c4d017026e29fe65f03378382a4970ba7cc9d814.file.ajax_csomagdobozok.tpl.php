<?php /* Smarty version Smarty-3.1.14, created on 2015-01-10 10:13:21
         compiled from "templates\ajax_csomagdobozok.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3197054b0ed319651e4-95034011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4d017026e29fe65f03378382a4970ba7cc9d814' => 
    array (
      0 => 'templates\\ajax_csomagdobozok.tpl',
      1 => 1420880937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3197054b0ed319651e4-95034011',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'szotar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54b0ed319c2df7_57269019',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b0ed319c2df7_57269019')) {function content_54b0ed319c2df7_57269019($_smarty_tpl) {?><?php if ($_REQUEST['package']==1){?>    
    <div id="free" >        
        <h1><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Ingyenes csomag');?>
</h1>
        <h3><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('0 Ft / Hónap ');?>
</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Diákoknak, magánszemélyeknek és vállalkozást tervezőknek.');?>
</p>
        <p><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Ingyenes, kötöttségek nélkül kipróbálható.');?>
 </p>
    </div>
<?php }?>
<?php if ($_REQUEST['package']==2){?> 
    <div id="silver" >
        <h1><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Ezüst csomag');?>
</h1>
        <h3><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' 2.000 Ft / Hónap');?>
</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Magánszemélyek, oktatók és vállalkozók számára ajánljuk.');?>
</p>
        <p><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('  Kérdőívek készítésére, kiértékelésére szakdolgozatokhoz, közvélemény és piackutatáshoz.');?>
</p>
    </div>
<?php }?>
<?php if ($_REQUEST['package']==3){?> 
    <div id="gold" >
        <h1><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Arany csomag');?>
</h1>
        <h3><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('6.000 Ft / Hónap ');?>
</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Vállalkozások, cégek számára ajánljuk. ');?>
</p>
        <p> <?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Ideális összeállítás a cégek számára, akik egy helyen szeretnék tudni vevői, beszállítói felméréseit és értékelésüket.');?>
</p>
    </div>    
<?php }?>
<?php if ($_REQUEST['package']==4){?> 
    <div id="platinum" >
        <h1><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Platina csomag');?>
</h1>
        <h3><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' 36.000 Ft / Hónap');?>
</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Cégek és nagyvállalatok számára ajánljuk, akik csak a megbízást szeretnék kiadni.');?>
</p>
        <p> <?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Egyedi igények kielégítése, folyamatos támogatás és kapcsolattartás. Megbízásra minden részletet mi biztosítunk, dolgozunk ki.');?>
</p>
    </div>
<?php }?>    <?php }} ?>
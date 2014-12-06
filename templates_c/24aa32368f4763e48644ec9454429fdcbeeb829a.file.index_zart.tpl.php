<?php /* Smarty version Smarty-3.1.14, created on 2014-12-06 10:29:52
         compiled from "templates\index_zart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94145482cc901c5847-71496612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24aa32368f4763e48644ec9454429fdcbeeb829a' => 
    array (
      0 => 'templates\\index_zart.tpl',
      1 => 1417858188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94145482cc901c5847-71496612',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'kerdoiv_obj' => 0,
    'head_game' => 0,
    'hibauzenet' => 0,
    'figy_uzenet' => 0,
    'szotar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5482cc90236ce0_12906640',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5482cc90236ce0_12906640')) {function content_5482cc90236ce0_12906640($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $_SESSION['lang'];?>
" lang="<?php echo $_SESSION['lang'];?>
">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>QuestionAction<?php echo $_smarty_tpl->tpl_vars['page']->value->alcim;?>
</title>
   <script type="text/javascript" src="js/jquery.1.7.1.min.js"></script>
   <script type="text/javascript" src="js/jscripts.js"></script>
   <script type="text/javascript" src="js/ganalytics.js"></script>
<?php if ($_REQUEST['p']=='40'){?>
   <script type="text/javascript" src="jtable/scripts/jquery-ui-1.8.16.custom.min.js" charset="UTF-8"></script>
   <script type="text/javascript" src="jtable/scripts/jtable/jquery.jtable.js" charset="UTF-8"></script>
<?php }?>
   <link rel="stylesheet" type="text/css" href="style.css?v=2" />
<?php if ($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->css){?>
   <link rel="stylesheet" type="text/css" href="surveys_css/<?php echo $_smarty_tpl->tpl_vars['kerdoiv_obj']->value->css;?>
" />
<?php }?>
<?php if ($_REQUEST['p']=='40'){?>
   <link href="jtable/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" charset="UTF-8" />
   <link href="jtable/scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" charset="UTF-8" />
<?php }?>
   <link rel="stylesheet" type="text/css" href="gridster.css" />
   <link rel="stylesheet" type="text/css" href="csempe.css" />
   <link type="text/css" rel="stylesheet" href="slider/css/rhinoslider-1.05.css" />
<?php if ($_REQUEST['i']){?>
   <link rel="stylesheet" type="text/css" href="iframe.css" />
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['head_game']->value){?>
   <?php echo $_smarty_tpl->tpl_vars['head_game']->value;?>

<?php }?>
<?php if ($_REQUEST['i']){?>
<style>
    #iframe{
    transform:scale(<?php echo $_smarty_tpl->tpl_vars['kerdoiv_obj']->value->iframe_arany;?>
,<?php echo $_smarty_tpl->tpl_vars['kerdoiv_obj']->value->iframe_arany;?>
);
    transform-origin: left top;
    -ms-transform:scale(<?php echo $_smarty_tpl->tpl_vars['kerdoiv_obj']->value->iframe_arany;?>
,<?php echo $_smarty_tpl->tpl_vars['kerdoiv_obj']->value->iframe_arany;?>
);
    -ms-transform-origin: left top;
    -webkit-transform:scale(<?php echo $_smarty_tpl->tpl_vars['kerdoiv_obj']->value->iframe_arany;?>
,<?php echo $_smarty_tpl->tpl_vars['kerdoiv_obj']->value->iframe_arany;?>
);
    -webkit-transform-origin: left top;
    }
</style>
<?php }?>
</head>
<body <?php if (($_smarty_tpl->tpl_vars['hibauzenet']->value)||($_smarty_tpl->tpl_vars['figy_uzenet']->value)||(($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->felnott=='1')&&($_SESSION['felnott']!='1')&&($_REQUEST['mod']!='1')&&($_REQUEST['p']!='ujkerdoiv')&&($_REQUEST['p']!='ujkerdes')&&($_REQUEST['p']!='kerdoiv_adatlap'))){?><?php if (!$_REQUEST['lang']){?>onload="divdisp_on('popup');<?php }?><?php }?>">
    
<form action="index.php" name="login" method="post" class="login">
  <h2><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('bejelentkezés');?>
</h2>
  <label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('azonosító');?>
:</label><input type="text" name="azonosito" value="" />
  <label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('jelszó');?>
:</label><input type="password" name="jelszo" value="" />
  <input name="send" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('bejelentkezés');?>
" />
  <a href="?p=regisztracio"><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('regisztráció');?>
</a>
  <a href="?p=elfelejtett"><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Elfelejtett jelszó');?>
...</a>
</form>
    
</body>
</html><?php }} ?>
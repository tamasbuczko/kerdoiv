<?php /* Smarty version Smarty-3.1.14, created on 2014-05-11 15:45:43
         compiled from "templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26553536bda425c0430-81966018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f90be83b235fb03cc225b11607032e9ddd415899' => 
    array (
      0 => 'templates\\index.tpl',
      1 => 1399815840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26553536bda425c0430-81966018',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_536bda427f1e71_32036099',
  'variables' => 
  array (
    'session_lang' => 0,
    'css' => 0,
    'head_game' => 0,
    'body_onload' => 0,
    'css_valaszto' => 0,
    'user_nick' => 0,
    'url_param' => 0,
    'head_off' => 0,
    'menu' => 0,
    'slider' => 0,
    'tartalom' => 0,
    'lang' => 0,
    'popup_tartalom' => 0,
    'hibauzenet' => 0,
    'figy_uzenet' => 0,
    'mentes_gomb' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536bda427f1e71_32036099')) {function content_536bda427f1e71_32036099($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $_smarty_tpl->tpl_vars['session_lang']->value;?>
" lang="<?php echo $_smarty_tpl->tpl_vars['session_lang']->value;?>
">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Kérdőív</title>
		<script type="text/javascript" src="js/jquery.1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jscripts.js"></script>
	<script type="text/javascript" src="js/ganalytics.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" />
        <link rel="stylesheet" type="text/css" href="gridster.css" />
	<link rel="stylesheet" type="text/css" href="csempe.css" />
        <link type="text/css" rel="stylesheet" href="slider/css/rhinoslider-1.05.css" />
        <?php echo $_smarty_tpl->tpl_vars['head_game']->value;?>

    </head>
    <body<?php echo $_smarty_tpl->tpl_vars['body_onload']->value;?>
>
	   <?php echo $_smarty_tpl->tpl_vars['css_valaszto']->value;?>

           
           <div id="langs">
                <?php echo $_smarty_tpl->tpl_vars['user_nick']->value;?>

		 <a href="?lang=en<?php echo $_smarty_tpl->tpl_vars['url_param']->value;?>
"><img src="graphics/angol_zaszlo_k.png" alt="" />en</a>
		 <a href="?lang=de<?php echo $_smarty_tpl->tpl_vars['url_param']->value;?>
"><img src="graphics/nemet_zaszlo_k.png" alt="" />de</a>
         <a href="?lang=hu<?php echo $_smarty_tpl->tpl_vars['url_param']->value;?>
"><img src="graphics/magyar_zaszlo_k.png" alt="" />hu</a>
	   </div>
            <div id="frame">
                <div id="head"<?php echo $_smarty_tpl->tpl_vars['head_off']->value;?>
>
                <div id="head_menu">
				  <a href="?" id="logo"></a>
				  <div id="menu">
					  <?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

				  </div>
				  
                </div>
                    <?php echo $_smarty_tpl->tpl_vars['slider']->value;?>

               <p>survey, questionaire, form, exam, test, quize</p>
                </div>
                <div id="content">
                   <?php echo $_smarty_tpl->tpl_vars['tartalom']->value;?>

                </div>
                       <div id="footer">
                             <p> © 2014 questionaction.com - <?php echo $_smarty_tpl->tpl_vars['lang']->value['Használati és adatvédelmi szabályok'];?>
</p> 
                       </div>

            </div>
		
		 <div id="popup">
			<div class="q_box">
			   <?php echo $_smarty_tpl->tpl_vars['popup_tartalom']->value;?>

			   <?php echo $_smarty_tpl->tpl_vars['hibauzenet']->value;?>

                           <?php echo $_smarty_tpl->tpl_vars['figy_uzenet']->value;?>

                           <div id="rendben_gomb">Vissza</div>
                           <?php echo $_smarty_tpl->tpl_vars['mentes_gomb']->value;?>

			 </div>
                 </div>
		<script type="text/javascript" src="js/events.js"></script>
    </body>
</html><?php }} ?>
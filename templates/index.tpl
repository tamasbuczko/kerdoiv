<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$session_lang}" lang="{$session_lang}">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Kérdőív</title>
   <script type="text/javascript" src="js/jquery.1.7.1.min.js"></script>
   <script type="text/javascript" src="js/jscripts.js"></script>
   <script type="text/javascript" src="js/ganalytics.js"></script>
   <link rel="stylesheet" type="text/css" href="style.css" />
   <link rel="stylesheet" type="text/css" href="{$css}" />
   <link rel="stylesheet" type="text/css" href="gridster.css" />
   <link rel="stylesheet" type="text/css" href="csempe.css" />
   <link type="text/css" rel="stylesheet" href="slider/css/rhinoslider-1.05.css" />
{if $head_game}
   {$head_game}
{/if}
</head>
   <body{$body_onload}>
{if $css_valaszto}
   {$css_valaszto}    
{/if}
	  <div id="langs"{if $reklammentes} style="width: 690px;"{/if}>
{if $user_nick}
		 {$user_nick}
{/if}
		 <a href="?lang=en{$url_param}"><img src="graphics/angol_zaszlo_k.png" alt="" />en</a>
		 <a href="?lang=de{$url_param}"><img src="graphics/nemet_zaszlo_k.png" alt="" />de</a>
		 <a href="?lang=hu{$url_param}"><img src="graphics/magyar_zaszlo_k.png" alt="" />hu</a>
	  </div>
	  <div id="frame"{if $reklammentes} style="width: 690px;"{/if}>
		 <div id="head"{if $head_off}{$head_off}{/if}>
			<div id="head_menu">
			   <a href="?" id="logo"></a>
			   <div id="menu">
				  {$menu}
			   </div>
			</div>
			{$slider}
            <p>survey, questionaire, form, exam, test, quize</p>
		 </div>
		 <div id="content">
			{$tartalom}
		 </div>
		 <div id="footer">
			<p> © 2014 questionaction.com - {$lang['Használati és adatvédelmi szabályok']}</p> 
			<a href="?" id="logo_footer"></a>
			<div>{$menu}</div>
		 </div>
	  </div>	
	  <div id="popup">
		 <div class="q_box">
			{$popup_tartalom}
			{$hibauzenet}
			{$figy_uzenet}
			<div id="rendben_gomb">Vissza</div>
			{$mentes_gomb}
		 </div>
	  </div>
	<script type="text/javascript" src="js/events.js"></script>
    </body>
</html>
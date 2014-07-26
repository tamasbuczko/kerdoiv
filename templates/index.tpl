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
{if $smarty.request.i}
   <link rel="stylesheet" type="text/css" href="iframe.css" />
{/if}
{if $head_game}
   {$head_game}
{/if}
{if $smarty.request.i}
<style>
    #frame{
    transform:scale({$kerdoiv_obj->iframe_arany},{$kerdoiv_obj->iframe_arany});
    transform-origin: left top;
    -ms-transform:scale({$kerdoiv_obj->iframe_arany},{$kerdoiv_obj->iframe_arany});
    -ms-transform-origin: left top;
    -webkit-transform:scale({$kerdoiv_obj->iframe_arany},{$kerdoiv_obj->iframe_arany});
    -webkit-transform-origin: left top;
    }
</style>
{/if}
</head>
   <body{$body_onload}>
{if $css_valaszto}
   {$css_valaszto}    
{/if}
	  <div id="langs"{if (($reklammentes) OR ($kerdoivnezet))} style="width: 690px;"{/if}>
{if $user_nick}
		 {$user_nick}
{/if}
{if !$smarty.session.qa_user_id} 
    
<div id="teszt"><a href="?p=5">Teszt Üzem! - Próbáld ki nyugodtan...</a></div>
{/if}
		 <a href="?lang=en{$url_param}"><img src="graphics/angol_zaszlo_k.png" alt="" />en</a>
		 <a href="?lang=de{$url_param}"><img src="graphics/nemet_zaszlo_k.png" alt="" />de</a>
		 <a href="?lang=hu{$url_param}"><img src="graphics/magyar_zaszlo_k.png" alt="" />hu</a>
	  </div>
	  <div id="frame"{if (($reklammentes) OR ($kerdoivnezet))} style="width: 690px;"{/if}>
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
{if $smarty.request.b == 'y'}
		 <a name="end"></a>
		 <script type="text/javascript">scrollToAnchor('end');</script>
{/if}
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
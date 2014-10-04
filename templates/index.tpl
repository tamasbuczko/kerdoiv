<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$smarty.session.lang}" lang="{$smarty.session.lang}">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>QuestionAction{$page->alcim}</title>
   <script type="text/javascript" src="js/jquery.1.7.1.min.js"></script>
   <script type="text/javascript" src="js/jscripts.js"></script>
   <script type="text/javascript" src="js/ganalytics.js"></script>
   <link rel="stylesheet" type="text/css" href="style.css?v=2" />
{if $kerdoiv_obj->css}
   <link rel="stylesheet" type="text/css" href="surveys_css/{$kerdoiv_obj->css}" />
{/if}
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
    #iframe{
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
   <body {if ($hibauzenet) OR ($figy_uzenet)}{if !$smarty.request.lang}onload="divdisp_on('popup');{/if}{/if}">
<div id="iframe">  
	  <div id="langs"{if ($page->kerdoivnezet)} style="width: 690px;"{/if}>
{if !$smarty.request.i}
            <a href="?" id="home"></a>
{/if}
{if $smarty.session.qa_user_id}
	<div id="user_box">
            {$szotar->fordit('Bejelentkezve')}:
            <a href="?p=profil" title="profil">{$smarty.session.sessfelhasznalo}</a>
            <a href="?logout=1">{$szotar->fordit('Kijelentkezés')}</a>
{if ($smarty.request.p == 'kerdoiv') AND (!$smarty.request.mod)}
            <a href="?{$page->vissza_link}" class="visszax">vissza</a>
{/if}
        </div>
{/if}
{if !$smarty.session.qa_user_id} 
<div id="teszt" {if $smarty.request.kerdoiv} style="display: none;"{/if}>
   <a href="?p=5">{$szotar->fordit('Teszt Üzem! - Próbáld ki nyugodtan')}...</a>
</div>
{/if}
{if ((!$kerdoiv_obj) OR ($kerdoiv_obj->nyelvszam > 1))}
   <form action="" method="post" name="nyelv" id="nyelv">
   <select name="lang" id="nyelvkapcs">
				  <option value="">{$szotar->fordit('Válasszon nyelvet!')}</option>
{if $kerdoiv_obj->en != '0'}
				  <option value="en">english</option>
                 <!--<a href="?lang=en{$url_param}"><img src="graphics/angol_zaszlo_k.png" alt="" />en</a>-->
{/if}
{if $kerdoiv_obj->de != '0'}
                 <!--<a href="?lang=de{$url_param}"><img src="graphics/nemet_zaszlo_k.png" alt="" />de</a>-->
				  <option value="de">deutsch</option>
{/if}
{if $kerdoiv_obj->hu != '0'}
                 <!--<a href="?lang=hu{$url_param}"><img src="graphics/magyar_zaszlo_k.png" alt="" />hu</a>-->
				  <option value="hu">magyar</option>
{/if}
   </select>
   <input type="submit" name="submit" />
   </form>
{/if}
	  </div>
	  <div id="frame"{if ($page->kerdoivnezet)} style="width: 690px;"{/if}>
{if !$smarty.request.i}
              <div id="head"{if $page->cimlap == '0'} class="head_kicsi{if ($kerdoiv_obj->csak_kerdoiv == 'on') AND ($smarty.request.p == 'kerdoiv')} head_nincs{/if}"{/if}>        
			<div id="head_menu">
			   <a href="?" id="logo"></a>
			   <div id="menu">
				  {$menu}
			   </div>
			</div>
			{$slider}
            <p>survey, questionaire, form, exam, test, quize</p>
              </div>
{/if}
		 <div id="content">
			{$tartalom}
		 </div>
		 <div id="footer">
			<p> © 2014 questionaction.com - {$szotar->fordit('Használati és adatvédelmi szabályok')}</p> 
			<a href="?" id="logo_footer"></a>
			<div>{$menu}</div>
		 </div>
{if $smarty.request.b == 'y'}
		 <a name="end"></a>
		 <script type="text/javascript">scrollToAnchor('end');</script>
{/if}
	  </div>
</div>          
	  <div id="popup">
		 <div class="q_box">
			{$popup_tartalom}
			{$hibauzenet}
			{$figy_uzenet}
			<div id="rendben_gomb">Vissza</div>
{if ($smarty.request.submit) AND ($kerdoiv_obj->hiba < 1)}
			<div id="mentes_gomb">{$szotar->fordit('Mentés')}</div>
{/if}
		 </div>
	  </div>
	<script type="text/javascript" src="js/events.js"></script>
    </body>
    <!--<div id="help">
         <a href="?"><img src="graphics/assistant.jpg" alt="" /></a>            
    </div>-->             
</html>
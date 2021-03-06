<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$smarty.session.lang}" lang="{$smarty.session.lang}">
<head>   
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    
    <title>QuestionAction{$page->alcim}</title>
   
    <meta property="og:title" content="{$kerdoiv_obj->cim}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.questionaction.com/?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}" />
    <meta property="og:image" content="fejlec_kepek/{$kerdoiv_obj->fejlec_kep}" />
    <meta property="og:description" content="{$kerdoiv_obj->leiras}" />  
   
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="kérdőív, piackutatás, közvélemény kutatás, vevői megelégedettség, beszállítói kérdőív, kérdőív készítés, felmérés" />
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Custom CSS -->
	<link href="bootstrap/css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
   <script type="text/javascript" src="js/jscripts.js"></script>
   <script type="text/javascript" src="js/ganalytics.js"></script>
{if (($smarty.request.p == '40') OR ($smarty.request.p == 'ujkerdoiv'))}
   <script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
{/if}
   <link href="jtable/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" charset="UTF-8" />
   <script type="text/javascript" src="jtable/scripts/jquery-1.9.1.min.js" charset="UTF-8"></script>
   <script type="text/javascript" src="jquery-ui-1.11.2/jquery-ui.min.js" charset="UTF-8"></script>
   <link rel="stylesheet" type="text/css" href="style_bs.css?v=2" />
{if $kerdoiv_obj->css}
   <link rel="stylesheet" type="text/css" href="surveys_css/{$kerdoiv_obj->css}" />
{/if}
   <link href="jtable/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" charset="UTF-8" />
   <link href="jtable/scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" charset="UTF-8" />
   <script type="text/javascript" src="jtable/scripts/jtable/jquery.jtable.js" charset="UTF-8"></script>
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
   <body {if ($hibauzenet) OR ($figy_uzenet) OR (($kerdoiv_obj->felnott=='1') AND ($smarty.session.felnott != '1') AND ($smarty.request.mod != '1') AND ($smarty.request.p != 'ujkerdoiv') AND ($smarty.request.p != 'ujkerdes') AND ($smarty.request.p != 'kerdoiv_adatlap'))}{if !$smarty.request.lang}onload="divdisp_on('popup');{/if}{/if}">
<div id="iframe">  
   
   <nav class="navbar navbar-default col-xs-12 col-sm-12 col-md-10 col-lg-9 col-centered" style="padding:0;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	   <a class="navbar-brand" href="/"><img src="graphics/kicsi_logo_also.png" alt="logo" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		
{if $smarty.session.qa_user_id}
		 <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{$szotar->fordit('Bejelentkezve')}  <span class="caret"></span></a>
			<ul class="dropdown-menu">
			   <li><a href="?p=profil" title="profil">{$smarty.session.sessfelhasznalo}</a></li>
			   <li><a href="?logout=1">{$szotar->fordit('Kijelentkezés')}</a></li>
{if ($smarty.request.p == 'kerdoiv') AND (!$smarty.request.mod)}
			   <li><a href="?{$page->vissza_link}" class="visszax">{$szotar->fordit('vissza')}</a></li>
{/if}
			</ul>
        </li>
{/if}
{foreach from=$menu_obj->menupontok item="sor"}
        <li><a href="?p={$sor.cikkszam}">{$sor.menunev}</a></li>
{/foreach}		
		<li role="separator" class="divider"></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{$szotar->fordit('Válasszon nyelvet!')} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?lang=hu">magyar</a></li>
            <li><a href="?lang=en">english</a></li>
            <li><a href="?lang=de">deutsch</a></li>
          </ul>
        </li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
   
    <div id="fejlec" class="col-xs-12 col-sm-12 col-md-10 col-lg-9 col-centered" style="display: none;">
	  <!--<div id="langs" {if ($page->kerdoivnezet)} style="width: 690px;"{/if}>-->
{if !$smarty.request.i}
            <a href="?" id="home"></a>
{/if}

{if !$smarty.session.qa_user_id} 
<!--<div id="teszt" {if $smarty.request.kerdoiv} style="display: none;"{/if}>
   <a href="?p=5">{$szotar->fordit('Teszt Üzem! - Próbáld ki nyugodtan')}...</a>
</div>-->
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

          </div>
	  <div id="frame"{*if ($page->kerdoivnezet)} style="width: 690px;"{/if*} class="col-xs-12 col-sm-12 col-md-10 col-lg-9 col-centered">
{if !$smarty.request.i}
              <div id="head"{if $page->cimlap == '0'} class="head_kicsi{if ($kerdoiv_obj->csak_kerdoiv == 'on') AND ($smarty.request.p == 'kerdoiv')} head_nincs{/if}"{/if}>        
			<div class="hidden-xs hidden-sm" style="padding-top: 30px;">
			{$slider}
			</div>
            <p>survey, questionaire, form, exam, test, quize</p>
              </div>
{/if}
		 
			{$tartalom}
		 <br style="clear:both;" />
		 <div id="footer">
			<p> © 2014 questionaction.com - {$szotar->fordit('Használati és adatvédelmi szabályok')}</p> 
		 </div>		
{if $smarty.request.b == 'y'}
		 <a name="end"></a>
		 <script type="text/javascript">scrollToAnchor('end');</script>
{/if}
	  </div>
</div>          
	  <div id="popup">
		 <div class="q_box"{if $smarty.request.i == '1'} style="margin-top: 3700px;"{/if}>
			{$popup_tartalom}
			{$hibauzenet}
			{$figy_uzenet}
{if ($kerdoiv_obj->felnott=='1')AND ($smarty.session.felnott == '1')}
                    <div id="rendben_gomb">{$szotar->fordit('vissza')}</div>
{/if}
{if ($kerdoiv_obj->felnott!='1')}
                    <div id="rendben_gomb">{$szotar->fordit('vissza')}</div>
{/if}
{if ($smarty.request.submit) AND ($kerdoiv_obj->hiba < 1)}
                    <div id="mentes_gomb">{$szotar->fordit('Mentés')}</div>
{/if}
{if ($kerdoiv_obj->felnott=='1')}
{if $smarty.session.felnott != '1'}
                    <label>{$szotar->fordit('18 éven aluliak számára nem ajánlott!')}</label>
                    <a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&f=1">{$szotar->fordit('Elmúltam 18')}</a>
                    <a href="?">{$szotar->fordit('Nem vagyok még 18')}</a>
{/if}                    
{/if}
		 </div>
	  </div>
	<script type="text/javascript" src="js/events.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

<nav class="navbar navbar-default col-xs-12 col-sm-12 col-md-10 col-lg-9 col-centered" style="padding:0;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	   <a class="navbar-brand" href="#"><img src="graphics/kicsi_logo_also.png" alt="logo" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
{foreach from=$menu_obj->menupontok item="sor"}
        <li><a href="?p={$sor.cikkszam}">{$sor.menunev}</a></li>
{/foreach}
		<li role="separator" class="divider"></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{$szotar->fordit('Válasszon nyelvet!')} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">magyar</a></li>
            <li><a href="#">english</a></li>
            <li><a href="#">deutsch</a></li>
          </ul>
        </li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	
    </body>
    <!--<div id="help">
         <a href="?"><img src="graphics/assistant.jpg" alt="" /></a>            
    </div>-->             
</html>
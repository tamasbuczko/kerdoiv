<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$smarty.session.lang}" lang="{$smarty.session.lang}">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>QuestionAction{$page->alcim}</title>
   <script type="text/javascript" src="js/jquery.1.7.1.min.js"></script>
   <script type="text/javascript" src="js/jscripts.js"></script>
   <script type="text/javascript" src="js/ganalytics.js"></script>
{if $smarty.request.p == '40'}
   <script type="text/javascript" src="jtable/scripts/jquery-ui-1.8.16.custom.min.js" charset="UTF-8"></script>
   <script type="text/javascript" src="jtable/scripts/jtable/jquery.jtable.js" charset="UTF-8"></script>
{/if}
   <link rel="stylesheet" type="text/css" href="style.css?v=2" />
{if $kerdoiv_obj->css}
   <link rel="stylesheet" type="text/css" href="surveys_css/{$kerdoiv_obj->css}" />
{/if}
{if $smarty.request.p == '40'}
   <link href="jtable/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" charset="UTF-8" />
   <link href="jtable/scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" charset="UTF-8" />
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
<body {if ($hibauzenet) OR ($figy_uzenet) OR (($kerdoiv_obj->felnott=='1') AND ($smarty.session.felnott != '1') AND ($smarty.request.mod != '1') AND ($smarty.request.p != 'ujkerdoiv') AND ($smarty.request.p != 'ujkerdes') AND ($smarty.request.p != 'kerdoiv_adatlap'))}{if !$smarty.request.lang}onload="divdisp_on('popup');{/if}{/if}">
    
<form action="index.php" name="login" method="post" class="login">
  <h2>{$szotar->fordit('bejelentkezés')}</h2>
  <label>{$szotar->fordit('azonosító')}:</label><input type="text" name="azonosito" value="" />
  <label>{$szotar->fordit('jelszó')}:</label><input type="password" name="jelszo" value="" />
  <input name="send" type="submit" value="{$szotar->fordit('bejelentkezés')}" />
  <a href="?p=regisztracio">{$szotar->fordit('regisztráció')}</a>
  <a href="?p=elfelejtett">{$szotar->fordit('Elfelejtett jelszó')}...</a>
</form>
    
</body>
</html>
<?php
if (!is_numeric($_REQUEST[kerdoiv])){
   $result = mysql_query ("SELECT sorszam FROM kerdoivek WHERE status = '1' AND hivatkozas = '$_REQUEST[kerdoiv]' ");
   $a = mysql_fetch_array($result);
   $_REQUEST[kerdoiv] = $a[0];
   if (!$a[0]){
	  $_REQUEST[kerdoiv] = x;
   } else {
	  $csak_kerdoiv = 'on';
   }
}
require_once ('public/jogosultsag_kerdoiv.php');

if ($jogosult){
   require_once('public/kerdoiv_hiba.php');
   require_once('public/kerdoiv_fejlec.php');

   $kerdes_darab = 0;
   $figyelmeztetes = 0;

   require_once('public/kerdoiv_generator.php');

   require_once('public/kerdoiv_figyelmeztetesek.php');

   if (($_REQUEST[submit]) AND ($hiba == '0')){
	   $mentes_gomb = '<div id="mentes_gomb">'.$lang[mentes].'</div>';
   }

   if (($_REQUEST[submit]) AND ($hiba == '0') AND ($_REQUEST[b] == '1')){ //biztosan ment, megnyomta a mentés gombot
	  unset($figy_uzenet);
	  require_once('public/kerdoiv_mentes.php');
	  header("Location: index.php?ok=1");
   }

   if ($_REQUEST[ok] == 1){
	  $kerdes_blokk = '<div id="koszonjuk">'.$lang['koszonjuk_valaszaid'].'</div>';
	  $adat_off = 'display: none;'; //személyes adatlap kikapcsolása
   }
}

$tartalom .= $kerdes_blokk;
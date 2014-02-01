<?php

include('public/kerdoiv_fejlec.php');

//példák
#include('public/peldak.php');

$kerdes_darab = 0;
$figyelmeztetes = 0;

include('public/kerdoiv_generator.php');
include('public/kerdoiv_hiba.php');
include('public/kerdoiv_figyelmeztetesek.php');

if (($_REQUEST[submit]) AND ($hiba == '0')){
    $mentes_gomb = '<div id="mentes_gomb">'.$lang[mentes].'</div>';
}

if (($_REQUEST[submit]) AND ($hiba == '0') AND ($_REQUEST[b] == '1')){ //biztosan ment, megnyomta a mentés gombot
   unset($figy_uzenet);
   include('public/kerdoiv_mentes.php');
   header("Location: index.php?ok=1");
}

if ($_REQUEST[ok] == 1){
   $kerdes_blokk = '<div id="koszonjuk">'.$lang['koszonjuk_valaszaid'].'</div>';
   $adat_off = 'display: none;'; //személyes adatlap kikapcsolása
}

if (($hibauzenet) OR ($figy_uzenet)){  //figyelmeztető popup megjelenítése
   if (!$_REQUEST[lang]){
	  $body_onload = ' onload="divdisp_on(\'popup\');"'; 
   }
}
$tartalom .= $kerdes_blokk;
?>
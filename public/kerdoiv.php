<?php
if ($_REQUEST[kerdoiv]){
    $kerdoiv_sorszam = $_REQUEST[kerdoiv];
    //kezelni, ha nincs a kért sorszámú kérdőív
}
else {
    $kerdoiv_sorszam = 1;
}

//példák
#include('public/peldak.php');

#országok beolvasása comboboxhoz
$result = mysql_query("SELECT country_id, short_name, calling_code FROM dat_orszag ORDER BY short_name");
while ($next_element = mysql_fetch_array($result)){
        if ($_REQUEST[lakhely] == $next_element[country_id]){//Ez végzi a kiválasztott elem megtartását.
            $request_lakhely = 'selected="selected"';
        } else {
            $request_lakhely = '';
        }
	$orszag_combo .= '<option value="' . $next_element[country_id] . '" '.$request_lakhely.'>' . $next_element[short_name] . '</option>';
}

//a választott nyelv szerinti kérdőív cím és leírás betöltése
$resultc = mysql_query ("SELECT cim_hu, cim_en, cim_de, leiras_hu, leiras_en, leiras_de FROM kerdoivek WHERE status = '1' AND sorszam = '$kerdoiv_sorszam' ");
$next_elementc = mysql_fetch_array ($resultc);
$kerdoiv_cim=$next_elementc['cim_'.$_SESSION[lang]];
$kerdoiv_leiras=$next_elementc['leiras_'.$_SESSION[lang]];

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
$tartalom = $kerdes_blokk;
?>
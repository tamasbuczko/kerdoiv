<?php
//munkamenetkezelés bekapcsolása
session_start(); 

//néhány rendszerállandó beállítása
require_once('parameters.php');

//osztályok betöltése az objektumokhoz
require_once('class/class.php');

//kapcsolat létrehozása az adatbázis szerverrel (class.php)
$adatkapcsolat = new data_connect;
$adatkapcsolat->connect();

//a megjelenített tartalom elágazásainak kezelése
require_once('public/tartalomvalasztas.php');

//a teljes oldaltemplate-et feltöltjük és kiiratjuk a böngészőnek(index.html)
$array = array( 'tartalom'       => $tartalom,
		'body_onload' => $body_onload,  
                'popup_tartalom' => $popup_tartalom,
                'kerdes_blokk'   => $kerdes_blokk,
                'hibauzenet'   => $hibauzenet,
                'figy_uzenet'   => $figy_uzenet,
                'orszag_combo'   => $orszag_combo,
                'kerdoiv_cim'    => $kerdoiv_cim,
                'kerdoiv_leiras' => $kerdoiv_leiras,
                'request_eletkora_value' => $request_eletkora_value,
                'request_neme_value' => $request_neme_value,
                'request_foglalkozas_value' => $request_foglalkozas_value,    
                'request_email_value' => $request_email_value,
                'nyelv_valasztas' => $lang[nyelv_valasztas],
                'magyar' => $lang[magyar],
                'angol' => $lang[angol],
                'nemet' => $lang[nemet],
                'eletkor' => $lang[eletkor],
                'neme' => $lang[neme],
                'orszag' => $lang[orszag],
                'foglalkozas' => $lang[foglalkozas],
                'elkuldes' => $lang[elkuldes],
                'email_bekeres' => $lang[email_bekeres],
                'session_lang' => $_SESSION["lang"],
                'mentes_gomb' => $mentes_gomb,
    		'alcim' => $alcim);
	 
$index_html = new html_blokk;
$index_html->load_template_file("templates/index.html",$array);
echo $index_html->html_code;
?>
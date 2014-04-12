<?php
//munkamenetkezelés bekapcsolása
session_start(); 

//néhány rendszerállandó beállítása
require_once('parameters.php');

//osztályok betöltése az objektumokhoz
require_once('class/class.php');

//funkciók betöltése
require_once('functions.php');

//teszt
require_once('public/teszt.php');

//kapcsolat létrehozása az adatbázis szerverrel (class.php)
$adatkapcsolat = new data_connect;  //példányosítjuk az objektumot
$adatkapcsolat->connect();          //az objektum connect fügvényét futatjuk

//logolás bekapcsolása
$log = new log_db;
$log->write('x', 'Futás indul...');

//látogató beléptetése, illetve állapotvizsgálat
$user = new user;
$user->login();

//nyelvi változatok kezelése
include('public/nyelv.php');

//a megjelenített tartalom elágazásainak kezelése
require_once('public/tartalomvalasztas.php');

//css sablonok kezelése
require_once('public/css.php');

if ($_SESSION[messagetodiv]){
    $hibauzenet = $_SESSION[messagetodiv];
    unset($_SESSION[messagetodiv]);
}

if (($hibauzenet) OR ($figy_uzenet)){  //figyelmeztető popup megjelenítése
   if (!$_REQUEST[lang]){  //ha csak nyelvváltás miatt tölt újra az oldal, akkor ne jelenjenek meg az üzenetek
	  $body_onload = ' onload="divdisp_on(\'popup\');"'; 
   }
}

if (($_REQUEST[p]) AND ($_REQUEST[p] != '2')){
   $head_off = 'style="height: 40px; overflow: hidden;"';
}

//menü létrehozása az oldal tetején
require_once('public/menu.php');

//slider összeállítása
require_once('public/slider.php');

//a teljes oldaltemplate-et feltöltjük és kiiratjuk a böngészőnek(index.html)
$array = array( 'tartalom' => $tartalom,
				'body_onload' => $body_onload,  
                'popup_tartalom' => $popup_tartalom,
                'slider' => $slider,
				'head_off' => $head_off,
                'hibauzenet' => $hibauzenet,
                'figy_uzenet' => $figy_uzenet,
				'css' => $css,
                'menu' => $menu,
                'user_nick'	=> $user_nick,
				'css_valaszto' => $css_valaszto,
				'adat_off' => $adat_off,
                'orszag_combo' => $orszag_combo,
                'kerdoiv_cim' => $kerdoiv_cim,
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
                'ferfi' => $lang[ferfi],
                'no' => $lang[no],
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
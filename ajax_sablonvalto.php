<?php
//munkamenetkezelés bekapcsolása
session_start();

//néhány rendszerállandó beállítása
require_once('parameters.php');

//osztályok betöltése az objektumokhoz
require_once('class/class.php');

//funkciók betöltése
require_once('functions.php');

//kapcsolat létrehozása az adatbázis szerverrel (class.php)
$adatkapcsolat = new data_connect;  //példányosítjuk az objektumot
$adatkapcsolat->connect();          //az objektum connect fügvényét futatjuk

if ($_REQUEST[sablon] != '1000'){
    $result = mysql_query("SELECT sablon_hu, sablon_en, sablon_de FROM zart_emailsablonok WHERE id = $_REQUEST[sablon]");
    $email_szoveg = mysql_fetch_array($result);
} else {
    $result = mysql_query("SELECT zart_email_szoveg FROM kerdoivek WHERE sorszam = $_REQUEST[kerdoiv]");
    $email_szoveg = mysql_fetch_array($result);
}

echo $email_szoveg[0];
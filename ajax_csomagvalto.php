<?php
//munkamenetkezelés bekapcsolása
session_start();

//néhány rendszerállandó beállítása
require_once('parameters.php');

//osztályok betöltése az objektumokhoz
require_once('class/class.php');

//funkciók betöltése
require_once('functions.php');

//Smarty sablonkezelő betöltése
require_once('smarty.php');
$smarty = new Smarty();

//kapcsolat létrehozása az adatbázis szerverrel (class.php)
$adatkapcsolat = new data_connect;  //példányosítjuk az objektumot
$adatkapcsolat->connect();          //az objektum connect fügvényét futatjuk

//szótár objektum betöltése
$szotar = new szotar;

$smarty->assign('szotar', $szotar);

$csomagdobozok = $smarty->fetch('templates/ajax_csomagdobozok.tpl');
$csomagdobozok2 = $smarty->fetch('templates/ajax_csomagdobozok2.tpl');

echo $csomagdobozok . 'xxx' . $csomagdobozok2;
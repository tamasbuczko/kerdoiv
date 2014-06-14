<?php
//munkamenetkezelés bekapcsolása
session_start(); 

//néhány rendszerállandó beállítása
require_once('parameters.php');

//osztályok betöltése az objektumokhoz
require_once('class/class.php');

//kapcsolat létrehozása az adatbázis szerverrel (class.php)
$adatkapcsolat = new data_connect;  //példányosítjuk az objektumot
$adatkapcsolat->connect();          //az objektum connect fügvényét futatjuk

$result = mysql_query("SELECT hu, en, de, megjegyzes FROM sugo WHERE id = $_REQUEST[id]");
$value = mysql_fetch_array($result);

echo $value[$_SESSION[lang]];
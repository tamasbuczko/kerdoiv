<?php
session_start();
//néhány rendszerállandó beállítása
require_once('parameters.php');

//osztályok betöltése az objektumokhoz
require_once('class/class.php');

//kapcsolat létrehozása az adatbázis szerverrel (class.php)
$adatkapcsolatx = new data_connect;
$adatkapcsolatx->connect();

$user = new user;
$user->login();

$elonezet = 'ok';

require_once('cron_email.php');

$sablon = '
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$smarty.session.lang}" lang="{$smarty.session.lang}">
<head>   
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
</head>
<body>
      '.$html.'
</body>
</html>';

echo $sablon;

#echo $message;
<?php

//néhány rendszerállandó beállítása
require_once('parameters.php');

//osztályok betöltése az objektumokhoz
require_once('class/class.php');

$adatkapcsolat = new data_connect;  //példányosítjuk az objektumot
$adatkapcsolat->connect();          //az objektum connect fügvényét futatjuk

//logolás bekapcsolása
$log = new log_db;
$log->write('x', 'CRON indul...');

$mainap = date("Y-m-d");

$result = mysql_query("SELECT sorszam, lejarat, aktivalas, status, cim_hu FROM kerdoivek WHERE status = '0' AND aktivalas <= '$mainap' AND aktivalas != '0000-00-00' AND lejarat >= '$mainap'");
while ($a = mysql_fetch_array($result)){
    if ($a['sorszam']){
        $sql = "UPDATE kerdoivek SET status = '1' WHERE sorszam = '$a[sorszam]'";
        mysql_query($sql);
        $esemeny = 'KÉRDŐÍV AKTIVÁLÁS - Kérdőív: '. $a['sorszam'] .', lejárat:' .$a['lejarat'].', aktivalas: ' .$a['aktivalas'].', eredeti status:' . $a['status'].', új status: 1 - '. $a['cim_hu'];
        $sql2 = "INSERT INTO cron_log (esemeny) VALUES ('$esemeny')";
        mysql_query($sql2);
    }
}

$result = mysql_query("SELECT sorszam, aktivalas, lejarat, status, cim_hu FROM kerdoivek WHERE status = '1' AND lejarat <= '$mainap' AND lejarat != '0000-00-00'");
while ($a = mysql_fetch_array($result)){
    if ($a['sorszam']){
        $sql = "UPDATE kerdoivek SET status = '0' WHERE sorszam = '$a[sorszam]'";
        mysql_query($sql);
        $esemeny = 'KÉRDŐÍV INAKTIVÁLÁS - Kérdőív: '. $a['sorszam'] .', lejárat:' .$a['lejarat'].', aktivalas: ' .$a['aktivalas'].', eredeti status:' . $a['status'].', új status: 0 - '. $a['cim_hu'];
        $sql2 = "INSERT INTO cron_log (esemeny) VALUES ('$esemeny')";
        mysql_query($sql2);
    }
}
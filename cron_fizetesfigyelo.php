<?php
session_start();
//néhány rendszerállandó beállítása
require_once('parameters.php');

//osztályok betöltése az objektumokhoz
require_once('class/class.php');

//kapcsolat létrehozása az adatbázis szerverrel (class.php)
$adatkapcsolatx = new data_connect;
$adatkapcsolatx->connect();

//logolás bekapcsolása
$log = new log_db;
$log->write('x', 'CRON indul... (fizetésfigyelő)');

//minden nap éjjel lefut

//ha a felhasználó fizetős csomagban van és fizetve van az aktuális időszaka, akkor létrehozza a következő
//időszakának fizetési lehetőségét
$mainap = date('Y-m-d');

$honap_utolso_napja = date('Y-m-d', strtotime('last day of this month'));
$kov_honap_elso_nap = date('Y-m-d', strtotime('first day of next month'));
$kov_honap_utolso_nap = date('Y-m-d', strtotime('last day of next month'));

if ($mainap = $honap_utolso_napja){
$result = mysql_query("SELECT u.id, u.authority, dcs.ar_ft_ho, dcs.ar_eur_ho, dcs.ar_usd_ho FROM users AS u "
        . "LEFT JOIN dat_csomagarak AS dcs ON u.authority = dcs.id "
        . "WHERE u.authority > 1");
    while ($row = mysql_fetch_array($result)){
        $result2 = "INSERT INTO fizetesek (user_id, osszeg, idopont, lejarat, csomag, status_aktualis, status_fizetett) VALUES "
                . "('$row[id]', '$row[ar_ft_ho]', '$kov_honap_elso_nap', '$kov_honap_utolso_nap', '$row[authority]', '$row[authority]', '0')";
        mysql_query($result2);
        
        // email értesítés kiküldése (adattáblába jegyezni és utolóag kiküldeni)
        // email típusokról adattábla
        
    }
}

//egy értesítést küld a lejárat előtt 5 nappal a hosszabbítási lehetőségről

//egy értesítést küld a lejárat napján a hosszabbítási lehetőségről

//értesítést küld a lejáratot követő napokban (5 napon keresztül) a hosszabbítási lehetőségről

//lejáratot követő 6. napon ingyenes csomagra vált és értesíti a felhasználót

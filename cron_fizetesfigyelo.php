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

//értesítést küld a lejárat előtt 5 nappal a hosszabbítási lehetőségről

//értesítést küld a lejárat napján a hosszabbítási lehetőségről

//értesítést küld a lejáratot követő napokban (5 napon keresztül) a hosszabbítási lehetőségről

//lejáratot követő 6. napon ingyenes csomagra vált és értesíti a felhasználót
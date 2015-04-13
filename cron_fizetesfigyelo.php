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


$result = mysql_query("SELECT u.id, u.authority, u.email, dcs.ar_ft_ho, dcs.ar_eur_ho, dcs.ar_usd_ho FROM users AS u "
        . "LEFT JOIN dat_csomagarak AS dcs ON u.authority = dcs.id "
        . "WHERE u.authority > 1");
    //végigmegy az összes felhasználón, aki fizetős csomagban van
    while ($row = mysql_fetch_array($result)){
        
        //a felhasználó utolsó fizetett csomagja mikor jár le
        $result3 = mysql_query("SELECT lejarat, idopont FROM fizetesek WHERE user_id = $row[id] AND status_fizetett = '1' ORDER BY lejarat DESC");
        $row3 = mysql_fetch_array($result3);
        
        //ha van nem fizetett csomag, akkor nem jön létre új fizetendő csomag
        $result4 = mysql_query("SELECT lejarat, idopont FROM fizetesek WHERE user_id = $row[id] AND status_fizetett = '0'");
        $row4 = mysql_fetch_array($result4);
        
        $lejaratnal_ot_nappal_elobb = date('Y-m-d', strtotime('-5 days', strtotime($row3[lejarat])));
        $lejarat_megegy_nap = date('Y-m-d', strtotime('+1 days', strtotime($row3[lejarat])));
        
        if (($lejaratnal_ot_nappal_elobb == $mainap) AND (!$row4[lejarat])){
            
            $mahoz_egy_honapra = date('Y-m-d', strtotime('+1 month', strtotime($lejarat_megegy_nap)));
            $result2 = "INSERT INTO fizetesek (user_id, osszeg, idopont, lejarat, csomag, status_aktualis, status_fizetett) VALUES "
                    . "('$row[id]', '$row[ar_ft_ho]', '$lejarat_megegy_nap', '$mahoz_egy_honapra', '$row[authority]', '$row[authority]', '0')";
            mysql_query($result2);
			
			// email értesítés kiküldése (adattáblába jegyezni és utolóag kiküldeni)
			$result22 = "INSERT INTO email_figyelo (email, status, tipus) VALUES 
						   ('$row[email]', '1', '1')";
			mysql_query($result22);
        }
        
        //értesítés fizetési kötelezettségről
        $idopont_utan_egynappal = date('Y-m-d', strtotime('+1 days', strtotime($row4[idopont])));
        if ($idopont_utan_egynappal == $mainap){
            
		    $result22 = "INSERT INTO email_figyelo (email, status, tipus) VALUES 
						   ('$row[email]', '1', '2')";
			mysql_query($result22);
        }
        
        //fizetetlen csomagú felhasználó, akinek 5 napja él a csomagja
        $idopont_utan_otnappal = date('Y-m-d', strtotime('+5 days', strtotime($row4[idopont])));
        if ($lejaratnal_ot_nappal_elobb == $mainap){
            //user táblában lekapcsolni a jogosultságát
		   
		   $result22 = "INSERT INTO email_figyelo (email, status, tipus) VALUES 
						   ('$row[email]', '1', '3')";
			mysql_query($result22);
        }
        
    }


//egy értesítést küld a lejárat előtt 5 nappal a hosszabbítási lehetőségről

//egy értesítést küld a lejárat napján a hosszabbítási lehetőségről

//értesítést küld a lejáratot követő napokban (5 napon keresztül) a hosszabbítási lehetőségről

//lejáratot követő 6. napon ingyenes csomagra vált és értesíti a felhasználót

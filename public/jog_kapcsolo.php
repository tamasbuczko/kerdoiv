<?php
//cron_fizetesfigyelo.php-ból meghívva
//mindig a csomagváltás adatbázisrögzítése után fusson az állomány
//megnézzük a user összes kérdőívét és a csomagja jogaihoz kapcsoljuk a szükséges mezőket

//user csomagjához tartozó jogok beolvasása
$jogok_cron = new jogok;

//megnézzük a user összes kérdőívét és acsomag jogaihoz kapcsoljuk a szükséges mezőket
$result = mysql_query("SELECT * FROM kerdoivek WHERE user_id = $user");
while ($row2 = mysql_fetch_array($result)){
   
   //18-as kérdőív lehet
   $felnott_kapcs = $jogok_cron->ellenor('felnott');
   if ($felnott_kapcs != $row2[felnott]){
       $status_break_kapcs = '1';
   }
   
   //kép kérdéshez
   $kep_kerdeshez_kapcs = $jogok_cron->ellenor('kep_kerdeshez');
   $result2 = mysql_query("SELECT sorszam FROM kerdesek WHERE kerdoiv_sorszam = $row2[sorszam] AND kep_file != ''");
   $kep_kerdeshez_darab = mysql_num_rows($result2);
   if (($kep_kerdeshez_darab > 0) AND ($kep_kerdeshez_kapcs == '0')){
       $status_break_kapcs = '1';
   }
   
   //reklámok bekapcsolása
   $reklam_kapcs = $jogok_cron->ellenor('reklam_kotelezo');
   $sql = "INSERT INTO log_jogkapcsolo (kerdoiv, parameter, mirol, mire, csomagrol, csomagra) VALUES ('$row2[sorszam]', 'reklam_kotelezo', '$row2[hirdetessel]', '$reklam_kapcs', '$user_jog', '$_SESSION[sessfelhasznalojog]')";
   mysql_query($sql);
   
   //teszt (???)
   $teszt_kapcs = $jogok_cron->ellenor('teszt_tipus');
   $sql = "INSERT INTO log_jogkapcsolo (kerdoiv, parameter, mirol, mire, csomagrol, csomagra) VALUES ('$row2[sorszam]', 'teszt_tipus', '$row2[teszt]', '$teszt_kapcs', '$user_jog', '$_SESSION[sessfelhasznalojog]')";
   mysql_query($sql);
   
   //pontozás (???)
   $pontozas_kapcs = $jogok_cron->ellenor('pontozhato');
   $sql = "INSERT INTO log_jogkapcsolo (kerdoiv, parameter, mirol, mire, csomagrol, csomagra) VALUES ('$row2[sorszam]', 'pontozhato', '$row2[pontozas]', '$pontozas_kapcs', '$user_jog', '$_SESSION[sessfelhasznalojog]')";
   mysql_query($sql);
   
   //egyszer tölthető
   $egyszer_toltheto_kapcs = $jogok_cron->ellenor('egyszer_toltheto');
   $sql = "INSERT INTO log_jogkapcsolo (kerdoiv, parameter, mirol, mire, csomagrol, csomagra) VALUES ('$row2[sorszam]', 'egyszer_toltheto', '$row2[egyszerkitoltheto]', '$egyszer_toltheto_kapcs', '$user_jog', '$_SESSION[sessfelhasznalojog]')";
   mysql_query($sql);
   
   //zárt kérdőív típus 
   $zart_kapcs = $jogok_cron->ellenor('zart_kerdoiv');
   if ($zart_kapcs != $row2[zart]){
       $status_break_kapcs = '1';
	      $sql = "INSERT INTO log_jogkapcsolo (kerdoiv, parameter, mirol, mire, csomagrol, csomagra) VALUES ('$row2[sorszam]', 'zart_kerdoiv', '$row2[zart]', '$zart_kapcs', '$user_jog', '$_SESSION[sessfelhasznalojog]')";
		  mysql_query($sql);
   }
   
   //inaktiválás nélkül átállítható mezők
   $query = "UPDATE kerdoivek SET
            hirdetessel = $reklam_kapcs,
            teszt = $teszt_kapcs,
            pontozas = $pontozas_kapcs,
            egyszerkitoltheto = $egyszer_toltheto_kapcs
            WHERE sorszam = $row2[sorszam]";
   mysql_query($query);
   
   if ($status_break_kapcs == '1'){
       $query = "UPDATE kerdoivek SET
            status_break = $status_break_kapcs
            WHERE sorszam = $row2[sorszam]";
       mysql_query($query);
   }
}
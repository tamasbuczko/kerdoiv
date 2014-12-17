<?php
session_start();
//néhány rendszerállandó beállítása
require_once('parameters.php');

//osztályok betöltése az objektumokhoz
require_once('class/class.php');

//kapcsolat létrehozása az adatbázis szerverrel (class.php)
$adatkapcsolatx = new data_connect;
$adatkapcsolatx->connect();

$idopont = date("Y-m-d H:i:s");

$result = mysql_query("SELECT sorszam, email, felhasznalo, kerdoivszam, cimzettek FROM email_temp WHERE statusz='1' ORDER BY sorszam LIMIT 50");	
while ($next_element = mysql_fetch_array($result)){
	$kerdoivszam = $next_element['kerdoivszam'];
	$cimzettek = $next_element['cimzettek'];
	$cimzett = $next_element['email'];
	
	$result2 = mysql_query("SELECT nev, cegnev FROM zart_emailek WHERE email='$cimzett'");	
	$next_elementxx = mysql_fetch_array($result2);
	$felhasznalo = $next_elementxx['nev'];
	$cegnev = $next_elementxx['cegnev'];

        $chars="abcdefhjkmnpqrstuxy345789";
	$uj_jelszo="";
        $uj_link="";
	for ($i=0;$i<6;$i++){
		$rand=rand(0,strlen($chars)-1);
		$uj_jelszo.=$chars[$rand];
	}
        for ($i=0;$i<20;$i++){
		$rand=rand(0,strlen($chars)-1);
		$uj_link.=$chars[$rand];
	}
	$sql = "UPDATE zart_emailek SET jelszo='$uj_jelszo', link='$uj_link' WHERE email='$next_element[email]'";
        mysql_query($sql);
        
        $kerdoiv_obj = new kerdoiv;
        $kerdoiv_obj->load($next_element[kerdoivszam]);
	   
        $subject = 'kérdőív kitöltés';

	$felhasznalo_azonosito = $next_element[felhasznalo];
	$felhasznalo_email = $cimzett;

		if (is_numeric($felhasznalo_azonosito)) {$felhasznalo_azonosito = 'Partnerünk'; }
			
		$hirlevel_szoveg = str_replace('\"', '"', $hirlevel_szoveg);
			
				$html ='
<html>
      <body style="background-color: #9cb0b0; padding-top: 20px; padding-bottom: 20px; margin-bottom: 20px; padding-left: 20px; color: #686868; font-family: Arial;">
      <div style="display: block; min-height: 624px; width: 680px; background-color: #ffffff;">
          <div style="width: 158px; padding: 10px; float: left; background-color: #0f4eb8; color: #fefefe; min-height: 605px; border-right: 2px solid #0f4eb8;">
          </div>
          <div style="float: left; width: 460px; font-size: 12px; min-height: 615px; color: #3c1d11; padding-top: 20px; padding-left: 17px; padding-bottom: 30px;">
              Tisztelt '.$felhasznalo.'!<br /><br />
              <p style="color: #3c1d11;">A (kiküldő cég) nevében felkérem, hogy az Önök ('.$cegnev.') számára összeállított felmérő lapot, legyenek szívesek kitölteni az online felületen!</p>
			  <p style="color: #3c1d11; font-weight: bold;">A felmérés címe:<br />'.$kerdoiv_obj->cim.'</p>
			   <p style="color: #3c1d11; font-weight: bold;">
			   Az alábbi egyedi linken található a felmérés:<br />
			   <a href="http://questionaction.com/index.php?p=kerdoiv&kerdoiv='.$kerdoivszam.'&link='.$uj_link.'">http://questionaction.com/index.php?p=kerdoiv&kerdoiv='.$kerdoivszam.'&link='.$uj_link.'</a>
			   </p>
              <p style="color: #3c1d11; font-weight: bold; margin-bottom: 2px;">Jelszó:</p>
              '.$uj_jelszo.'
			   <p style="color: #3c1d11;font-weight: bold;">
				  Kérem, hogy a kitöltést a következő dátumig legyen szíves elvégezni:<br />
				  '.$kerdoiv_obj->lejarat_datuma.'
			   </p>
			   <p style="color: #3c1d11;">
				  '.$kerdoiv_obj->zart_email_szoveg.'
			   </p>
              <br style="clear: both;" />
              <p style="color: #3c1d11;">
              Köszönettel:<br />
              '.$kerdoiv_obj->keszito.'<br />
			  '.$kerdoiv_obj->email.'<br />
			  (kiküldő cégneve)<br />
              </p>
              <br style="clear: both;" />
          </div>
      </div>
      <br style="clear: both;" />
      </body>
      </html>';

    include('email_html.php');

    mail($felhasznalo_email, $subject, $message, $headers);
    $sql = "UPDATE email_temp SET statusz='2', elkuldve='$idopont' WHERE sorszam='$next_element[sorszam]'";
    mysql_query($sql);
}
?>
<?php
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
              <img src="cid:123456789" style="margin:0px; padding: 0px;">
              <p style="right-margin: 10px;">Hegesztésportál</p>
          </div>
          <div style="float: left; width: 460px; font-size: 12px; min-height: 615px; color: #3c1d11; padding-top: 20px; padding-left: 17px; padding-bottom: 30px;">
              Kedves '.$felhasznalo_azonosito.'!<br /><br />
					<p style="color: #3c1d11;">Ön a hegesztesportal.hu hírlevelét olvassa.</p>
					<p style="color: #3c1d11; font-weight: bold; margin-bottom: 2px;">Regisztrált e-mail címe:</p>
					'.$felhasznalo_email.'
					<br /><br />
              '.$kerdoiv_obj->cim.'
              <br style="clear: both;" />
               <p style="color: #3c1d11;">
              Üdvözlettel,<br />
              a hegesztesportal.hu csapata
              </p>
              <br style="clear: both;" />
              <p style="margin-top: 40px; font-size: 9px;">
              Ezt a levelet a hegesztesportal.hu weboldal küldte. Amennyiben nem kíván több hasonló tartalmú levelet kapni, kérjük írjon az info@hegesztesportal.hu címre, vagy a felhasználói profiljában törölje hírlevél igényét!
              </p>
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
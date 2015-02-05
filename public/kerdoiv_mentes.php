<?php
    
//kitöltési napló készítése
$most=date("Y-m-d H:i:s");
$kitoltesinaplosql="INSERT INTO `kitoltesi_naplo` (`sorszam`, `idopont`, `kerdoiv`, `regisztralt_kitolto`, `egyeb_kitolto`) VALUE (NULL, '".$most."', '".$kerdoiv_sorszam."', '".$_SESSION[qa_user_id]."', '".$_COOKIE[qasession]."')";
mysql_query($kitoltesinaplosql);


   $foglalkozas = rtrim($foglalkozas);
   $foglalkozas = ltrim($foglalkozas);
   $sql = "INSERT INTO kitoltok (email, neme, eletkora, lakhely, foglalkozas, nyelv, vegzettseg, jovedelem, csaladiallapot) 
           VALUES ('$email', '$_REQUEST[neme]', '$_REQUEST[eletkora]', '$_REQUEST[lakhely]', '$foglalkozas', '$_SESSION[lang]', '$_REQUEST[vegzettseg]', '$_REQUEST[jovedelmek]', '$_REQUEST[csaladiallapot]')";
   mysql_query($sql); //futtatás
   
       $sql = mysql_query("SELECT MAX(sorszam) FROM kitoltok");
        $a = mysql_fetch_row($sql);
        $kitolto_sorszama = $a[0];
     
   if ($valaszok_data_checkbox){ //tömb létezésének vizsgálata (volt e ilyen típusú kérdés)
        foreach ($valaszok_data_checkbox as $key => $value){
            if ($valaszok_data_checkbox[$key][checkbox]){ //$key a válasz sorszáma, amiket ki is választottak
               $kerdes_x = $valaszok_data_checkbox[$key][checkbox]; //$kerdes_x kapja meg a kerdes sorszamat
               $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, kitolto_sorszam, regisztralt_kitolto) 
               VALUES ('$kerdoiv_sorszam', '$kerdes_x', '$key', '1', '$kitolto_sorszama', '$_SESSION[qa_user_id]')";
               mysql_query($sql);
            }
	}
   }
	  
      if ($valaszok_data_select){
		 foreach ($valaszok_data_select as $key => $value){
			if ($valaszok_data_select[$key][select]){
			   $valasz_x = $valaszok_data_select[$key][select];
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, kitolto_sorszam, regisztralt_kitolto) 
			   VALUES ('$kerdoiv_sorszam', '$key', '$valasz_x', '1', '$kitolto_sorszama', '$_SESSION[qa_user_id]')";
			   mysql_query($sql);
			}
		 }
	  }
	  
      if ($valaszok_data_textarea){
		 foreach ($valaszok_data_textarea as $key => $value){
			if ($valaszok_data_textarea[$key][textarea]){
			   $szoveg_x = $valaszok_data_textarea[$key][textarea];
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam, regisztralt_kitolto) 
					   VALUES ('$kerdoiv_sorszam', '$key', '', '1', '$szoveg_x', '$kitolto_sorszama', '$_SESSION[qa_user_id]')";
				 mysql_query($sql);
			}
		 }
      }
	  
	  if ($valaszok_data_text){
		 foreach ($valaszok_data_text as $key => $value){
			if ($valaszok_data_text[$key][text]){
			   $szoveg_x = $valaszok_data_text[$key][text];
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam, regisztralt_kitolto) 
					   VALUES ('$kerdoiv_sorszam', '$key', '', '1', '$szoveg_x', '$kitolto_sorszama', '$_SESSION[qa_user_id]')";
				 mysql_query($sql);
			}
		 }
	  }
	  
	  if ($valaszok_data_radio){
		 $sqlx = mysql_query("SELECT sorszam FROM kerdesek WHERE kerdoiv_sorszam = $kerdoiv_sorszam");
		 $teszt_kerdes_darab = mysql_num_rows($sqlx);
		 
		 $kerdes_sor = 0;
		 foreach ($valaszok_data_radio as $key => $value){
			if ($valaszok_data_radio[$key][radio]){
			   $kerdes_sor++;
			   $valasz_x = $valaszok_data_radio[$key][radio];
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam, regisztralt_kitolto) 
					   VALUES ('$kerdoiv_sorszam', '$key', '$valasz_x', '1', '', '$kitolto_sorszama', '$_SESSION[qa_user_id]')";
				 mysql_query($sql);
				 //ellenőrizni a helyes_valaszok adattáblában a válasz helyességét
				 //számolni az összes választ
				 //számolni a helyes válaszokat
				 //email string-be beírni a kérdést, az adható válaszokat és az adott választ, jelölni a helyes választ
				 
				 $sql2 = "SELECT v.valasz_hu, k.kerdes_hu FROM valaszok AS v 
						  LEFT JOIN kerdesek AS k ON v.kerdes_valasz = k.sorszam
						  WHERE v.sorszam =$valasz_x";
				 $sql2_query = mysql_query($sql2);
				 $sql2_data = mysql_fetch_array($sql2_query);
				 
				 $email_kerdes_szoveg = $sql2_data[kerdes_hu];
				 $email_valasz_szoveg = $sql2_data[valasz_hu];
				 
				 $sql3 = "SELECT v.sorszam, v.valasz_hu FROM valaszok AS v 
						  LEFT JOIN kerdesek AS k ON v.kerdes_valasz = k.sorszam
						  WHERE k.sorszam =$key";
				 $sql3_query = mysql_query($sql3);
				 
				 $szelektivhod_valaszok = '';
				 
				 $helyes_x2 = mysql_query("SELECT id, valasz_id FROM helyes_valaszok WHERE valasz_id = $valasz_x");
				 $helyes2 = mysql_fetch_array($helyes_x2);
				 if ($helyes2[valasz_id] == $valasz_x){ $teszt_kerdes_darab_helyes++; }
				 
				 while ($valaszok = mysql_fetch_array($sql3_query)){
					$helyes_x = mysql_query("SELECT id, valasz_id FROM helyes_valaszok WHERE valasz_id = $valaszok[sorszam]");
					$helyes = mysql_fetch_array($helyes_x);
					
					if ($helyes[valasz_id] == $valaszok[sorszam]){
					   $xxxx = '<strong>'.$valaszok[valasz_hu].'</strong><br />';
					} else {
					   $xxxx = $valaszok[valasz_hu].'<br />';
					}
					$szelektivhod_valaszok .= $xxxx;
				 }
				 $szelektivhod_email .= '<br /><br />'.$kerdes_sor.'. '.$email_kerdes_szoveg. ': <br /><strong>Kitöltő válasza: '.$email_valasz_szoveg. '</strong><br /><br />Válaszok:<br />'.$szelektivhod_valaszok;
			}
		 }
	  }
	  
	  if ($valaszok_data_rank){
		 foreach ($valaszok_data_rank as $key => $value){
			if ($valaszok_data_rank[$key][rank]){
			   $valasz_x = $valaszok_data_rank[$key][rank]; //$valasz_x tartalmazza magát az értéket
			   $kerdes_x = $valaszok_data_rank[$key][kerdes];
                           
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam, regisztralt_kitolto) 
					   VALUES ('$kerdoiv_sorszam', '$kerdes_x', '$key', '$valasz_x', '', '$kitolto_sorszama', '$_SESSION[qa_user_id]')";
				 mysql_query($sql);
			}
		 }
	  }
          
//zárt kérdőív kitöltőjének ellenőrzése
if ($_REQUEST[l]) {
    $result = mysql_query("SELECT id, link FROM zart_emailek WHERE link='$_REQUEST[l]'");
    $row = mysql_fetch_array($result);
    if ($row[id]){
        $sql = "UPDATE zart_emailek SET status = '3' WHERE id = $row[id]";
        mysql_query($sql);
    }
}
	  
require_once('public/kikuld_szelektivhod.php');
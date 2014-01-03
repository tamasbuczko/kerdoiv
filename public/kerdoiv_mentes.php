<?php

   $sql = "INSERT INTO kitoltok (email, neme, eletkora, lakhely, foglalkozas, nyelv) 
           VALUES ('$email', '$_REQUEST[neme]', '$_REQUEST[eletkora]', '$_REQUEST[lakhely]', '$foglalkozas', '$_SESSION[lang]')";
   mysql_query($sql);

   $sql = mysql_query("SELECT MAX(sorszam) FROM kitoltok");
   $a = mysql_fetch_row($sql);
   $kitolto_sorszama = $a[0];
   
	  if ($valaszok_data_checkbox){ //tömb létezésének vizsgálata (volt e ilyen típusú kérdés)
		 foreach ($valaszok_data_checkbox as $key => $value){
			if ($valaszok_data_checkbox[$key][checkbox]){ //$key a válasz sorszáma
			   $kerdes_x = $valaszok_data_checkbox[$key][checkbox];
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, kitolto_sorszam) 
			   VALUES ('$kerdoiv_sorszam', '$kerdes_x', '$key', '1', '$kitolto_sorszama')";
			   mysql_query($sql);
			}
		 }
      }
	  
      if ($valaszok_data_select){
		 foreach ($valaszok_data_select as $key => $value){
			if ($valaszok_data_select[$key][select]){
			   $valasz_x = $valaszok_data_select[$key][select];
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, kitolto_sorszam) 
			   VALUES ('$kerdoiv_sorszam', '$key', '$valasz_x', '1', '$kitolto_sorszama')";
			   mysql_query($sql);
			}
		 }
	  }
	  
      if ($valaszok_data_textarea){
		 foreach ($valaszok_data_textarea as $key => $value){
			if ($valaszok_data_textarea[$key][textarea]){
			   $szoveg_x = $valaszok_data_textarea[$key][textarea];
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam) 
					   VALUES ('$kerdoiv_sorszam', '$key', '', '1', '$szoveg_x', '$kitolto_sorszama')";
				 mysql_query($sql);
			}
		 }
      }
	  
	  if ($valaszok_data_text){
		 foreach ($valaszok_data_text as $key => $value){
			if ($valaszok_data_text[$key][text]){
			   $szoveg_x = $valaszok_data_text[$key][text];
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam) 
					   VALUES ('$kerdoiv_sorszam', '$key', '', '1', '$szoveg_x', '$kitolto_sorszama')";
				 mysql_query($sql);
			}
		 }
	  }
	  
	  if ($valaszok_data_radio){
		 foreach ($valaszok_data_radio as $key => $value){
			if ($valaszok_data_radio[$key][radio]){
			   $valasz_x = $valaszok_data_radio[$key][radio];
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam) 
					   VALUES ('$kerdoiv_sorszam', '$key', '$valasz_x', '1', '', '$kitolto_sorszama')";
				 mysql_query($sql);
			}
		 }
	  }
	  
	  if ($valaszok_data_rank){
		 foreach ($valaszok_data_rank as $key => $value){
			if ($valaszok_data_rank[$key][rank]){
			   $valasz_x = $valaszok_data_rank[$key][rank];
			   $kerdes_x = $valaszok_data_rank[$key][kerdes];
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam) 
					   VALUES ('$kerdoiv_sorszam', '$kerdes_x', '$key', '$valasz_x', '', '$kitolto_sorszama')";
				 mysql_query($sql);
			}
		 }
	  }
	  
?>
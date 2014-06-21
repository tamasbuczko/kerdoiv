<?php
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
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam) 
					   VALUES ('$kerdoiv_sorszam', '$key', '', '1', '$szoveg_x', '$kitolto_sorszama', '$_SESSION[qa_user_id]')";
				 mysql_query($sql);
			}
		 }
      }
	  
	  if ($valaszok_data_text){
		 foreach ($valaszok_data_text as $key => $value){
			if ($valaszok_data_text[$key][text]){
			   $szoveg_x = $valaszok_data_text[$key][text];
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam) 
					   VALUES ('$kerdoiv_sorszam', '$key', '', '1', '$szoveg_x', '$kitolto_sorszama', '$_SESSION[qa_user_id]')";
				 mysql_query($sql);
			}
		 }
	  }
	  
	  if ($valaszok_data_radio){
		 foreach ($valaszok_data_radio as $key => $value){
			if ($valaszok_data_radio[$key][radio]){
			   $valasz_x = $valaszok_data_radio[$key][radio];
			   $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam, regisztralt_kitolto) 
					   VALUES ('$kerdoiv_sorszam', '$key', '$valasz_x', '1', '', '$kitolto_sorszama', '$_SESSION[qa_user_id]')";
				 mysql_query($sql);
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
	  
?>
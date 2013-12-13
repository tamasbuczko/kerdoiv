<?php
include('public/nyelv.php');

//példák
include('public/peldak.php');

#országok beolvasása comboboxhoz
$result = mysql_query("SELECT country_id, short_name, calling_code FROM dat_orszag ORDER BY short_name");
while ($next_element = mysql_fetch_array($result)){
        if ($_REQUEST[lakhely] == $next_element[country_id]){
            $request_lakhely = 'selected="selected"';
        } else {
            $request_lakhely = '';
        }
	$orszag_combo .= '<option value="' . $next_element[country_id] . '" '.$request_lakhely.'>' . $next_element[short_name] . '</option>';
}

$resultc = mysql_query ("SELECT cim_hu, cim_en, cim_de, leiras_hu, leiras_en, leiras_de FROM kerdoivek WHERE status = '1' AND sorszam = '1' ");
$next_elementc = mysql_fetch_array ($resultc);
$kerdoiv_cim=$next_elementc['cim_'.$_SESSION[lang]];
$kerdoiv_leiras=$next_elementc['leiras_'.$_SESSION[lang]];

$hiba = 0;
$figyelmeztetes = 0;
if ($_REQUEST[submit]){
    $email = mysql_real_escape_string($_REQUEST[email]);
    $foglalkozas = mysql_real_escape_string($_REQUEST[foglalkozas]);
    
    if ($_REQUEST[neme] == '0'){
        $hiba++;
        $hiba_uzenetek[$hiba] = 'Nem adta meg a nemét!';
    }
    
    if ($_REQUEST[eletkora] == '0'){
        $hiba++;
        $hiba_uzenetek[$hiba] = 'Nem adta meg a korát!';
    }
    
    if ($_REQUEST[lakhely] == '0'){
        $hiba++;
        $hiba_uzenetek[$hiba] = 'Nem adta meg a lakhelyét!';
    }
    
    if ($_REQUEST[foglalkozas] == ''){
        $hiba++;
        $hiba_uzenetek[$hiba] = 'Nem adta meg a foglalkozását!';
    }
    
    if ($hiba == 0){
        $sql = "INSERT INTO kitoltok (email, neme, eletkora, lakhely, foglalkozas, nyelv) 
                VALUES ('$email', '$_REQUEST[neme]', '$_REQUEST[eletkora]', '$_REQUEST[lakhely]', '$foglalkozas', '$_SESSION[lang]')";
        mysql_query($sql);

        $sql = mysql_query("SELECT MAX(sorszam) FROM kitoltok");
        $a = mysql_fetch_row($sql);
        $kitolto_sorszama = $a[0];
    } else {
        $request_eletkora_value = '<option value="'.$_REQUEST[eletkora].'" selected="selected">'.$_REQUEST[eletkora].'</option>';
        $request_neme_value = '<option value="'.$_REQUEST[neme].'" selected="selected">'.$_REQUEST[neme].'</option>';
        $request_foglalkozas_value = $_REQUEST[foglalkozas];
        $request_email_value = $_REQUEST[email];
        
    }
}

$kerdes_darab = 0;
$result = mysql_query("SELECT sorszam, kerdes_hu, kerdes_en, kerdes_de, tipus, sorrend FROM kerdesek WHERE status = '1' AND kerdoiv_sorszam = '1' ORDER BY sorrend");
while ($next_element = mysql_fetch_array($result)){
    
    $sorszam_kerdes = $next_element[sorszam];
    
    $resultx = mysql_query("SELECT sorszam, kerdes_valasz, valasz_hu, valasz_en, valasz_de FROM valaszok WHERE status = '1' AND kerdes_valasz = '$sorszam_kerdes' ORDER BY sorrend");
    while ($next_elementv = mysql_fetch_array($resultx)){
        
        $sorszam_valasz = $next_elementv[sorszam];
        
        if ($next_element[tipus] == 'radio'){
		   $radio = $_REQUEST['radio_'.$sorszam_kerdes];
		   if ($next_elementv[sorszam] == $radio){
			  $radio_request = 'checked="checked"';
		   } else {
			  $radio_request = '';
		   }
		   
           $valaszok .= "\n".'<input type="radio" name="radio_'.$sorszam_kerdes.'" '.$radio_request.' value="'.$next_elementv[sorszam].'" /><label>'.$next_elementv['valasz_'.$_SESSION[lang]].'</label>';
        }
        
        if ($next_element[tipus] == 'checkbox'){
            //kitöltött űrlap feldolgozása
            if ($_REQUEST[submit]){
                    $checkbox = $_REQUEST['checkbox_'.$sorszam_valasz];
                    if ($checkbox == 'on'){
                        $valaszok_data['checkbox'][$sorszam_valasz] = $sorszam_kerdes;
			$check_request = 'checked="checked"';
                    }
            }
			
			$valaszok .= "\n".'<input type="checkbox" name="checkbox_'.$next_elementv[sorszam].'" '.$check_request.' /><label>'.$next_elementv['valasz_'.$_SESSION[lang]].'</label>';
            unset($check_request);
        }
        
        if ($next_element[tipus] == 'select'){
		   $select = $_REQUEST['select_'.$next_element[sorszam]];
		   if ($select == $next_elementv[sorszam]){
			  $select_request = 'selected="selected"';
		   } else {
			  $select_request = '';
		   }
           $valaszok .= "\n".'<option value="'.$next_elementv[sorszam].'" '.$select_request.'>'.$next_elementv['valasz_'.$_SESSION[lang]].'</option>';
        }
        
        //osztályozás típus generálása
        if ($next_element[tipus] == 'ranking'){
            unset($valaszokx);
            for ($i=1; $i<6; $i++){
			   $ranking = $_REQUEST['rank_'.$next_elementv[sorszam]];
			   if ($i == $ranking){
				  $ranking_request = 'checked="checked"';
			   } else {
				  $ranking_request = '';
			   }
               $valaszokx .= "\n".'<input type="radio" name="rank_'.$next_elementv[sorszam].'" '.$ranking_request.' style="float: left; clear: none; margin-right: 6px; margin-left: 6px;" value="'.$i.'" />';
            }
            $valaszok .= '<label style="clear: both; float: left; margin-left: 47px;">'.$next_elementv['valasz_'.$_SESSION[lang]].'</label><div style="float: left;">'. $valaszokx.'</div>'; 
            
            //kitöltött űrlap feldolgozása
            if ($_REQUEST[submit]){
                $rank = $_REQUEST['rank_'.$next_elementv[sorszam]];
                if ($rank){ 
				  $valaszok_data['rank'][$sorszam_valasz] = $rank;
                }
            }
        }
        
    }
    
    //csak egy text generálódik a kérdéshez
    if ($next_element[tipus] == 'text'){
        if ($_REQUEST[submit]){
                 if ($_REQUEST['text_'.$next_element[sorszam]]){
                     $szoveg = $_REQUEST['text_'.$next_element[sorszam]];
                     $valaszok_data['text'][$next_element[sorszam]] = $szoveg;
                     $text_request = $szoveg;
                 }
            }
		$valaszok .= "\n".'<input type="text" name="text_'.$next_element[sorszam].'" value="'.$text_request.'" />';
		unset($text_request);
    }
    
    //csak egy text generálódik a kérdéshez
    if ($next_element[tipus] == 'textarea'){
        if ($_REQUEST[submit]){
                if ($_REQUEST['textarea_'.$next_element[sorszam]]){
                    $szoveg = $_REQUEST['textarea_'.$next_element[sorszam]];
					$valaszok_data['textarea'][$sorszam_valasz] = $szoveg;
					$textarea_request = $szoveg;
                } 
        }
		$valaszok .= "\n".'<textarea name="textarea_'.$next_element[sorszam].'">'.$textarea_request.'</textarea>';
		unset($textarea_request);
    }
    
    //kitöltött űrlap feldolgozása
       if ($_REQUEST[submit]){
                $radio = $_REQUEST['radio_'.$sorszam_kerdes];
		$valaszok_data['radio'][$sorszam_valasz] = $radio;
       }
       
    if ($next_element[tipus] == 'ranking'){ 
        $valaszok = '<div class="ranking"><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span></div>'.$valaszok;
    }
    
    if ($next_element[tipus] == 'select'){
        $valaszok = '<select name="select_'.$next_element[sorszam].'">'
                . '<option value="0">---</option>'
                . ''.$valaszok.''
                . '</select>';
        
        //kitöltött űrlap feldolgozása
        if ($_REQUEST[submit]){
            if ($_REQUEST['select_'.$next_element[sorszam]]){
                $select = $_REQUEST['select_'.$next_element[sorszam]];
            } else {
                $select = '';
                $figyelmeztetes++;
                $figyelmeztetes_uzenetek[$figyelmeztetes] = $next_element[sorszam];
            }
            $valaszok_data['select'][$sorszam_valasz] = '1';
            
            
        }
    }
    
    $kerdes_darab++;
    
    $kerdes_blokk .= '<div class="survey_block">
                        <div class="survey_question">'.$kerdes_darab.'. '.$next_element['kerdes_'.$_SESSION[lang]] .'</div>
                        <div class="survey_answers">
                            '.$valaszok.'
                            <br style="clear:both" />
                        </div>
                    </div>';
    
    unset($valaszok); // válaszok törlése
}

if ($hiba > 0){
    foreach($hiba_uzenetek as $key => $value){
        $hibauzenet .= '- '. $value. '<br />';
    }
    $hibauzenet = '<h3>A kérdőív az alábbi hibák miatt nem feldolgozható: </h3>'.$hibauzenet;
}

if ($figyelmeztetes > 0){
    foreach($figyelmeztetes_uzenetek as $key => $value){
        $figy_uzenet .= $value.', ';
    }
    $figy_uzenet = '<h3><br />Az alábbi kérdésekre nem válaszoltál: </h3>'.$figy_uzenet;
}

if (($_REQUEST[submit]) AND ($hiba == '0')){
   
   if ($valaszok_data['checkbox']){
	  foreach ($valaszok_data['checkbox'] as $key => $value){
            $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, kitolto_sorszam) 
            VALUES ('1', '$value', '$key', '1', '$kitolto_sorszama')";
            mysql_query($sql);
	  }
   }
   
   if ($valaszok_data['rank']){
	  foreach ($valaszok_data['rank'] as $key => $value){
			  $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, kitolto_sorszam) 
                      VALUES ('1', '$next_element[sorszam]', '$next_elementv[sorszam]', '$rank', '$kitolto_sorszama')";
              mysql_query($sql);
	  }
   }
   
   if ($valaszok_data['text']){
	  foreach ($valaszok_data['text'] as $key => $value){
                $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam) 
                VALUES ('1', '$key', '', '1', '$valaszok_data[text][$key]', '$kitolto_sorszama')";
              mysql_query($sql);
	  }
   }
   
   if ($valaszok_data['textarea']){
	  foreach ($valaszok_data['textarea'] as $key => $value){
			  $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg, kitolto_sorszam) 
                          VALUES ('1', '$key', '', '1', '$valaszok_data[textarea][$key]', '$kitolto_sorszama')";
			  mysql_query($sql);
	  }
   }
   
   if ($valaszok_data['radio']){
	  foreach ($valaszok_data['radio'] as $key => $value){
            $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, kitolto_sorszam) 
              VALUES ('1', '$valaszok_data[radio][$key]', '$key', '1', '$kitolto_sorszama')";
              mysql_query($sql);
	  }
   }
   
   if ($valaszok_data['select']){
	  foreach ($valaszok_data['select'] as $key => $value){
            $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, kitolto_sorszam) 
            VALUES ('1', '$key', '$valaszok_data[select][$key]', '1', '$kitolto_sorszama')";
            mysql_query($sql);
	  }
   }
    
   header("Location: /kerdoiv/index.php");
}
   
if ($hibauzenet){ 
  $body_onload = ' onload="divdisp_on(\'popup\');"'; 
}
?>
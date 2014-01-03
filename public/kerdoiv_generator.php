<?php
$result = mysql_query("SELECT sorszam, kerdes_hu, kerdes_en, kerdes_de, tipus, sorrend FROM kerdesek WHERE status = '1' AND kerdoiv_sorszam = '$kerdoiv_sorszam' ORDER BY sorrend");
while ($next_element = mysql_fetch_array($result)){
    
    $sorszam_kerdes = $next_element[sorszam];
	$kerdesek[$sorszam_kerdes] = '0';
    
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
                        $valaszok_data_checkbox[$sorszam_valasz][checkbox] = $sorszam_kerdes;
						$check_request = 'checked="checked"';
						$kerdesek[$sorszam_kerdes] = '1';
                    } else {
					   // ha nem lett kiválasztva
					   
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
				  $figyelmeztetes++;
			   }
               $valaszokx .= "\n".'<input type="radio" name="rank_'.$next_elementv[sorszam].'" '.$ranking_request.' style="float: left; clear: none; margin-right: 6px; margin-left: 6px;" value="'.$i.'" />';
            }
            $valaszok .= '<label style="clear: both; float: left; margin-left: 47px;">'.$next_elementv['valasz_'.$_SESSION[lang]].'</label><div style="float: left;">'. $valaszokx.'</div>'; 
            
            //kitöltött űrlap feldolgozása
            if ($_REQUEST[submit]){
                $rank = $_REQUEST['rank_'.$next_elementv[sorszam]];
                if ($rank){ 
				  $valaszok_data_rank[$sorszam_valasz][rank] = $rank;
				  $valaszok_data_rank[$sorszam_valasz][kerdes] = $sorszam_kerdes;
				  $kerdesek[$sorszam_kerdes] = '1';
                }
            }
        }
        
    }
	
	if ($next_element[tipus] == 'radio'){
	   if (!$radio_request){
		 #$valaszok .= "\n".'<input type="radio" name="radio_'.$sorszam_kerdes.'" checked="checked" value="0" style="display: none;" />';
	   }
	}
    
    //csak egy text generálódik a kérdéshez
    if ($next_element[tipus] == 'text'){
        if ($_REQUEST[submit]){
                 if ($_REQUEST['text_'.$next_element[sorszam]]){
                     $szoveg = $_REQUEST['text_'.$next_element[sorszam]];
					 $valaszok_data_text[$sorszam_kerdes][text] = $szoveg;
                     $text_request = $szoveg;
					 $kerdesek[$sorszam_kerdes] = '1';
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
					
					$valaszok_data_textarea[$sorszam_kerdes][textarea] = $szoveg;
					$textarea_request = $szoveg;
					$kerdesek[$sorszam_kerdes] = '1';
                } else {
				   
				}
        }
		$valaszok .= "\n".'<textarea cols="1" rows="1" name="textarea_'.$next_element[sorszam].'">'.$textarea_request.'</textarea>';
		unset($textarea_request);
    }
    
    //kitöltött űrlap feldolgozása
       if ($_REQUEST[submit]){
                $radio = $_REQUEST['radio_'.$sorszam_kerdes];
			   $valaszok_data_radio[$sorszam_kerdes][radio] = $radio;
			  
			   if ($radio){
				  $kerdesek[$sorszam_kerdes] = '1';
			   }
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
				if ($select != '0'){
				  $kerdesek[$sorszam_kerdes] = '1';
			   }
            } else {
			   
                $select = '';
                $figyelmeztetes++;
                $figyelmeztetes_uzenetek[$figyelmeztetes] = $next_element[sorszam];
            }
            #$valaszok_data['select'][$sorszam_kerdes] = $sorszam_valasz;
            $valaszok_data_select[$sorszam_kerdes][select] = $select;
            
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
?>
<?php
$result = mysql_query("SELECT sorszam, kerdes_hu, kerdes_en, kerdes_de, tipus, sorrend FROM kerdesek WHERE status = '1' AND kerdoiv_sorszam = '$kerdoiv_sorszam' ORDER BY sorrend");
while ($next_element = mysql_fetch_array($result)){
    $kerdes_darab++;
    $sorszam_kerdes = $next_element[sorszam];
    $kerdesek[$sorszam_kerdes] = $kerdes_darab;   //alap esetben minden kérdés megválaszolatlannak jelölünk
    $kerdes_tipus = $next_element[tipus]; // aktuális kérdés tipusa
    
    $resultx = mysql_query("SELECT sorszam, kerdes_valasz, valasz_hu, valasz_en, valasz_de FROM valaszok WHERE status = '1' AND kerdes_valasz = '$sorszam_kerdes' ORDER BY sorrend");
    while ($next_elementv = mysql_fetch_array($resultx)){
        
        $sorszam_valasz = $next_elementv[sorszam];
        
        if ($kerdes_tipus == 'radio'){
            $radio = $_REQUEST['radio_'.$sorszam_kerdes];   // ***előző válasz megjegyzéséhez kell
            if ($sorszam_valasz == $radio){                 // ha éppen azt a választ generálja, amit előbb kijelöltek
              $radio_request = 'checked="checked"';         // akkor jelöli ha már ki volt választva korábban
            } else {
              $radio_request = '';
            }                                               // ***
		   
           $valaszok .= "\n".'<input type="radio" name="radio_'.$sorszam_kerdes.'" '.$radio_request.' value="'.$sorszam_valasz.'" /><label>'.$next_elementv['valasz_'.$_SESSION[lang]].'</label>';
        }
        
        if ($kerdes_tipus == 'select'){
            $select = $_REQUEST['select_'.$sorszam_kerdes];
            if ($select == $sorszam_valasz){
              $select_request = 'selected="selected"';
            } else {
              $select_request = '';
            }
            
           $valaszok .= "\n".'<option value="'.$next_elementv[sorszam].'" '.$select_request.'>'.$next_elementv['valasz_'.$_SESSION[lang]].'</option>';
        }
        
        if ($kerdes_tipus == 'checkbox'){
            if ($_REQUEST[submit]){
               $checkbox = $_REQUEST['checkbox_'.$sorszam_valasz];
               if ($checkbox == 'on'){
                   $check_request = 'checked="checked"'; 
                   $valaszok_data_checkbox[$sorszam_valasz][checkbox] = $sorszam_kerdes; 
                   $kerdesek[$sorszam_kerdes] = '0';    // azért, hogy tudjuk, hogy választott e valamit
               }
            }
			
            $valaszok .= "\n".'<input type="checkbox" name="checkbox_'.$sorszam_valasz.'" '.$check_request.' /><label>'.$next_elementv['valasz_'.$_SESSION[lang]].'</label>';
            unset($check_request);
        }
        
        //osztályozás típus generálása
        if ($kerdes_tipus == 'ranking'){
            unset($valasz_ertekek);
            for ($i=1; $i<6; $i++){ //$i elszámol 1-től 5-ig és létrehozza az értékelő kapcsolókat
		$ranking = $_REQUEST['rank_'.$sorszam_valasz];
		if ($i == $ranking){
                    $ranking_request = 'checked="checked"';
		} else {
                    $ranking_request = '';
                    #$figyelmeztetes++;  //???
		}
               $valasz_ertekek .= "\n".'<input type="radio" name="rank_'.$sorszam_valasz.'" '.$ranking_request.' class="ranking_value" value="'.$i.'" />';
            }
            $valaszok .= "\n".'<label class="ranking_text">'.$next_elementv['valasz_'.$_SESSION[lang]].'</label>'
                    ."\n". '<div style="float: left;">'. $valasz_ertekek."\n".'</div>'; 
            
            //kitöltött űrlap feldolgozása
            if ($_REQUEST[submit]){
                $rank = $_REQUEST['rank_'.$sorszam_valasz];
                if ($rank){ 
                    $valaszok_data_rank[$sorszam_valasz][rank] = $rank;
                    $valaszok_data_rank[$sorszam_valasz][kerdes] = $sorszam_kerdes;
                    $kerdesek[$sorszam_kerdes] = '0';
                }
            }
        }
       
        //válaszok ciklus vége
    }
    
    //már csak az 1 választási lehetőségű kérdésekre adott válaszokat vizsgáljuk
    
    if ($kerdes_tipus == 'radio'){
        if ($_REQUEST[submit]){ 
           $radio = $_REQUEST['radio_'.$sorszam_kerdes];    //megvizsgáljuk, hogy a rádió típusú kérdésre volt e válasz
           $valaszok_data_radio[$sorszam_kerdes][radio] = $radio;
           if ($radio){ 
              $kerdesek[$sorszam_kerdes] = '0';             //ha volt válasz, akkor a kérdést megválaszoltnak jelöljük
           }
        }
    }
       
    if ($kerdes_tipus == 'select'){
        $valaszok = '<select name="select_'.$next_element[sorszam].'">'
                . '<option value="0">---</option>'
                . ''.$valaszok.''
                . '</select>';
        
        if ($_REQUEST[submit]){
            if ($_REQUEST['select_'.$sorszam_kerdes]){
                $select = $_REQUEST['select_'.$sorszam_kerdes];
		if ($select != '0'){
		  $kerdesek[$sorszam_kerdes] = '0';
		}
            }
            $valaszok_data_select[$sorszam_kerdes][select] = $select; 
        }
    }
    
    //csak egy text generálódik a kérdéshez, ezért ebben a ciklusban lehet generálni is
    if ($kerdes_tipus == 'text'){
        if ($_REQUEST[submit]){
            if ($_REQUEST['text_'.$sorszam_kerdes]){
                $szoveg = $_REQUEST['text_'.$sorszam_kerdes];
                $valaszok_data_text[$sorszam_kerdes][text] = $szoveg;
                $text_request = $szoveg;
		$kerdesek[$sorszam_kerdes] = '0';
            }
        }
	$valaszok .= "\n".'<input type="text" name="text_'.$sorszam_kerdes.'" value="'.$text_request.'" />';
	unset($text_request);
    }
    
    //csak egy text generálódik a kérdéshez, ezért ebben a ciklusban lehet generálni is
    if ($kerdes_tipus == 'textarea'){
        if ($_REQUEST[submit]){
            if ($_REQUEST['textarea_'.$sorszam_kerdes]){
                $szoveg = $_REQUEST['textarea_'.$sorszam_kerdes];
                $valaszok_data_textarea[$sorszam_kerdes][textarea] = $szoveg;
                $textarea_request = $szoveg;
                $kerdesek[$sorszam_kerdes] = '0';   //megjelöljük, hogy válaszoltak a kérdésre
            }
        }
	$valaszok .= "\n".'<textarea cols="1" rows="1" name="textarea_'.$sorszam_kerdes.'">'.$textarea_request.'</textarea>';
	unset($textarea_request);
    }  
       
    if ($next_element[tipus] == 'ranking'){ 
        $valaszok = '<div class="ranking">'
                . '<span>1</span><span>2</span><span>3</span><span>4</span><span>5</span>'
                . '</div>'.
                $valaszok;
    }
    
    if (($_REQUEST[mod]) AND ($_SESSION[qa_user_id])){
        $szerk_gomb = '
				<div>
				<a href="?p=ujkerdes&amp;id='.$sorszam_kerdes.'&kerdestorles=1" title="kérdés törlése"></a>
				<a href="?p=ujkerdes&amp;id='.$sorszam_kerdes.'" title="kérdés módosítása"></a>
				<a href="?p=ujkerdes&amp;kerdoiv='.$kerdoiv_sorszam.'&ujkerdes='.$sorszam_kerdes.'" title="új kérdés beszúrása"></a>
				</div>';
    }
    
    $kerdes_blokk .= '<div class="survey_block">
                        <div class="survey_question"><span>
				'.$kerdes_darab.'. '.$next_element['kerdes_'.$_SESSION[lang]] .'</span>
				'.$szerk_gomb.'
			</div>
                        <div class="survey_answers">
                            '.$valaszok.'
                            <br style="clear:both" />
                        </div>
                    </div>';
    
    unset($valaszok); // válaszok törlése
}   //kérdés ciklus vége 

if (($_REQUEST[mod]) AND ($_SESSION[qa_user_id])){
    $uj_kerdes_gomb = '<a href="?p=ujkerdes&amp;kerdoiv='.$kerdoiv_sorszam.'&ujkerdes=x">Új kérdés rögzítése</a>';
} else {

$email_es_elkuldes_blokk = '<div style="'.$adat_off.'">
                    <div id="e-mail"> <p>'.$email_bekeres.'</p>
                    </div>    
                    <div class="szemelyes">
                        <label>E-mail:</label>
                        <input type="text" name="email" value="'.$request_email_value.'" />
                    </div>                      
                    <div id="elkuld"><input type="submit" name="submit" value="'.$lang[elkuldes].'"/>
                        <label> &gt; &gt; &gt;</label><img src="graphics/postalada.png" id="posta" alt="" />
                    </div>
                 </div>';
}

$kerdes_blokk = $kerdoiv_fejlec.$kerdes_blokk.$uj_kerdes_gomb.
					 '<br />
                 '.$email_es_elkuldes_blokk.'
		</form>
                </div>';
?>
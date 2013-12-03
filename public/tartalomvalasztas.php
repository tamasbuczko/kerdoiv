<?php

//select
$elso_opcio = $_REQUEST[elso_opcio]; //input elem name paraméterére hivatkozunk

//checkbox
for ($i = 1; $i<4; $i++){
    $checkbox = $_REQUEST['checkbox_'.$i];
    if ($checkbox == 'on'){   
        $checkboxs[$i]= 1;
    }
}

//text
$szoveg = mysql_real_escape_string($_REQUEST[szoveg]); //mysql biztonság, nem fut le amit beír.

//textarea
$szovegblokk = mysql_real_escape_string($_REQUEST[szovegblokk]); //mysql biztonság, nem fut le amit beír.

//radio
$radio = $_REQUEST[sex];

$resultc = mysql_query ("SELECT cim, leiras FROM kerdoivek WHERE status = '1' AND sorszam = '1' ");
$next_elementc = mysql_fetch_array ($resultc);
$kerdoiv_cim=$next_elementc[cim];
$kerdoiv_leiras=$next_elementc[leiras];

$kerdes_darab = 0;
$result = mysql_query("SELECT sorszam, kerdes, tipus, sorrend FROM kerdesek WHERE status = '1' AND kerdoiv_sorszam = '1' ORDER BY sorrend");
while ($next_element = mysql_fetch_array($result)){
    
    $sorszam_kerdes = $next_element[sorszam];
    
    $resultx = mysql_query("SELECT sorszam, kerdes_valasz, valasz FROM valaszok WHERE status = '1' AND kerdes_valasz = '$sorszam_kerdes' ORDER BY sorrend");
    while ($next_elementv = mysql_fetch_array($resultx)){
        
        $sorszam_valasz = $next_elementv[sorszam];
        
        if ($next_element[tipus] == 'radio'){
            $valaszok .= "\n".'<input type="radio" name="radio_'.$sorszam_kerdes.'" value="'.$next_elementv[sorszam].'" /><label>'.$next_elementv[valasz].'</label>';
            
        }
        
        if ($next_element[tipus] == 'checkbox'){
            $valaszok .= "\n".'<input type="checkbox" name="checkbox_'.$next_elementv[sorszam].'" /><label>'.$next_elementv[valasz].'</label>';
            
            //kitöltött űrlap feldolgozása
            $checkbox = $_REQUEST['checkbox_'.$sorszam_valasz];
            if ($checkbox == 'on'){   
                $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek) 
                        VALUES ('1', '$next_element[sorszam]', '$next_elementv[sorszam]', '1')";
                mysql_query($sql);
            }
            
        }
        
        if ($next_element[tipus] == 'select'){
            $valaszok .= "\n".'<option value="'.$next_elementv[sorszam].'">'.$next_elementv[valasz].'</option>';
        }
        
        //osztályozás típus generálása
        if ($next_element[tipus] == 'ranking'){
            unset($valaszokx);
            for ($i=1; $i<6; $i++){
                $valaszokx .= "\n".'<input type="radio" name="rank_'.$next_elementv[sorszam].'" style="float: left; clear: none; margin-right: 6px; margin-left: 6px;" value="'.$i.'" />';
            }
            $valaszok .= '<label style="clear: both; float: left;">'.$next_elementv[valasz].'</label><div style="float: left;">'. $valaszokx.'</div>'; 
            
            //kitöltött űrlap feldolgozása
            $rank = $_REQUEST['rank_'.$next_elementv[sorszam]];
            if ($rank){ 
                 $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek) 
                            VALUES ('1', '$next_element[sorszam]', '$next_elementv[sorszam]', '$rank')";
                     mysql_query($sql);
            }
        }
        
    }
    
    
    
    //csak egy text generálódik a kérdéshez
    if ($next_element[tipus] == 'text'){
        $valaszok .= "\n".'<input type="text" name="text_'.$next_element[sorszam].'" />';
        
        if ($_REQUEST['text_'.$next_element[sorszam]]){
            $szoveg = $_REQUEST['text_'.$next_element[sorszam]];
            $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg) 
                       VALUES ('1', '$next_element[sorszam]', '', '1', '$szoveg')";
                mysql_query($sql);
        }
        
    }
    
    //csak egy text generálódik a kérdéshez
    if ($next_element[tipus] == 'textarea'){
        $valaszok .= "\n".'<textarea name="textarea_'.$next_element[sorszam].'"></textarea>';
        
        if ($_REQUEST['textarea_'.$next_element[sorszam]]){
            $szoveg = $_REQUEST['textarea_'.$next_element[sorszam]];
            $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek, szoveg) 
                       VALUES ('1', '$next_element[sorszam]', '', '1', '$szoveg')";
                mysql_query($sql);
        }
    }
    
    //kitöltött űrlap feldolgozása
       $radio = $_REQUEST['radio_'.$sorszam_kerdes];
       if ($radio){ 
            $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek) 
                       VALUES ('1', '$next_element[sorszam]', '$radio', '1')";
                mysql_query($sql);
       }
    
    if ($next_element[tipus] == 'select'){
        $valaszok = '<select name="select_'.$next_element[sorszam].'">'.$valaszok.'</select>';
        
        //kitöltött űrlap feldolgozása
            $select = $_REQUEST['select_'.$next_element[sorszam]];
              
            $sql = "INSERT INTO valaszadasok (kerdoiv_sorszam, kerdes_sorszam, valasz_sorszam, ertek) 
                    VALUES ('1', '$next_element[sorszam]', '$select', '1')";
                mysql_query($sql);
            
    }
    
    $kerdes_darab++;
    
    $kerdes_blokk .= '<div class="survey_block">
                        <div class="survey_question">'.$kerdes_darab.'. '.$next_element[kerdes] .'</div>
                        <div class="survey_answers">
                            '.$valaszok.'
                            <br style="clear:both" />
                        </div>
                    </div>';
    
    unset($valaszok); // válaszok törlése
    
}



?>
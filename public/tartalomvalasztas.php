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

 $result = mysql_query("SELECT sorszam, kerdes, tipus, sorrend FROM kerdesek WHERE status = '1' AND kerdoiv_sorszam = '1' ORDER BY sorrend");
while ($next_element = mysql_fetch_array($result)){
    
    $resultx = mysql_query("SELECT sorszam, kerdes_valasz, valasz FROM valaszok WHERE status = '1' AND kerdes_valasz = '$next_element[sorszam]' ORDER BY sorrend");
    while ($next_elementv = mysql_fetch_array($resultx)){
        
        if ($next_element[tipus] == 'radio'){
            $valaszok .= "\n".'<input type="radio" name="radio_'.$next_element[sorszam].'" value="radio_v_'.$next_elementv[sorszam].'" /><label>'.$next_elementv[valasz].'</label>';
        }
        
        if ($next_element[tipus] == 'checkbox'){
            $valaszok .= "\n".'<input type="checkbox" name="checkbox_'.$next_elementv[sorszam].'" /><label>'.$next_elementv[valasz].'</label>';
        }
        
        if ($next_element[tipus] == 'select'){
            $valaszok .= "\n".'<option value="'.$next_elementv[sorszam].'">'.$next_elementv[valasz].'</option>';
        }
        
        //osztályozás típus generálása
        if ($next_element[tipus] == 'ranking'){
            for ($i=1; $i<6; $i++){
                $valaszok .= "\n".'<input type="radio" name="rank_'.$next_elementx[sorszam].'" style="float: left; clear: none; margin-right: 6px; margin-left: 6px;" value="rank_v_'.$i.'" />';
            }
            $valaszok = '<label style="clear: both; float: left;">'.$next_elementv[valasz].'</label>'. $valaszok; 
        }
        
    }
    
    
    
    //csak egy text generálódik a kérdéshez
    if ($next_element[tipus] == 'text'){
        $valaszok .= "\n".'<input type="text" name="text_'.$next_element[sorszam].'" />';
    }
    
    if ($next_element[tipus] == 'select'){
        $valaszok = '<select name="select_'.$next_element[sorszam].'">'.$valaszok.'</select>';
    }
    
    $kerdes_blokk .= '<div class="survey_block">
                        <div class="survey_question">'.$next_element[sorrend].'. '.$next_element[kerdes] .'</div>
                        <div class="survey_answers">
                            '.$valaszok.'
                            <br style="clear:both" />
                        </div>
                    </div>';
    
    unset($valaszok); // válaszok törlése
    
}



?>
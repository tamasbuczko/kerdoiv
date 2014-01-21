<?php
$adat_off = 'display: none;'; //személyes adatlap kikapcsolása

include('public/kerdoiv_fejlec.php');

$kerdes_darab = 0;

$result = mysql_query("SELECT sorszam, kerdes_hu, kerdes_en, kerdes_de, tipus, sorrend FROM kerdesek WHERE status = '1' AND kerdoiv_sorszam = '$kerdoiv_sorszam' ORDER BY sorrend");
while ($next_element = mysql_fetch_array($result)){
    
    $kerdes_darab++;
    $sorszam_kerdes = $next_element[sorszam];
    $kerdes_tipus = $next_element[tipus]; // aktuális kérdés tipusa
    
    if (($kerdes_tipus == 'radio') OR ($kerdes_tipus == 'select') OR ($kerdes_tipus == 'checkbox')){
        $result2 = mysql_query("SELECT sorszam FROM valaszadasok WHERE kerdes_sorszam = $sorszam_kerdes");
        $valaszadok_szama = mysql_num_rows($result2);
        
        $result2 = mysql_query("SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, COUNT(*)
        FROM valaszadasok AS va
        LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
        LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
        WHERE k.sorszam = $sorszam_kerdes
        GROUP BY valasz_hu
        ORDER BY COUNT(*) DESC");

        while ($eredmenyek = mysql_fetch_array($result2)){
            $eredmenyarany = $eredmenyek[3] / $valaszadok_szama;
            $eredmenyarany = $eredmenyarany*200;
            $eredmeny_lista .= $eredmenyek[2].' ('.$eredmenyek[3].') <div class="graf" style="width: '.$eredmenyarany.'px"></div><br />';
        }
    }
    
    if ($kerdes_tipus == 'ranking'){
        $result2 = mysql_query("SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, va.ertek, COUNT(*)
        FROM valaszadasok AS va
        LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
        LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
        WHERE k.sorszam = $sorszam_kerdes
        GROUP BY valasz_hu, va.ertek
        ORDER BY v.sorszam, va.ertek");
        
        
        while ($eredmenyek = mysql_fetch_array($result2)){
            if ($rank_archiv == $eredmenyek[2]){
                $rank_valasz = '';
                $sortores = '';
            } else {
                $rank_valasz = $eredmenyek[2];
                $sortores = '<br />';
            }
            $rank_archiv = $eredmenyek[2];
            $eredmeny_lista .= $sortores.$rank_valasz.' - '.$eredmenyek[3].' ('.$eredmenyek[4].')';
            
        }
    }
    
    if (($kerdes_tipus == 'text') OR ($kerdes_tipus == 'textarea')){
        $result2 = mysql_query("SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, va.szoveg
        FROM valaszadasok AS va
        LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
        LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
        WHERE k.sorszam = $sorszam_kerdes
        ORDER BY k.sorszam");

        while ($eredmenyek = mysql_fetch_array($result2)){
            $eredmeny_lista .= $eredmenyek[3].'<br />';
        }
    }
    
    $kerdes_blokk .= '<div class="survey_block">
                        <div class="survey_question">'.$kerdes_darab.'. '.$next_element['kerdes_'.$_SESSION[lang]] .'</div>
                        <div class="survey_answers">
                            '.$eredmeny_lista.'
                            <br style="clear:both" />
                        </div>
                    </div>';
    unset($eredmeny_lista);
} 
$tartalom ='Eredmények'.$kerdes_blokk;
?>
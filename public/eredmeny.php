<?php
$adat_off = 'display: none;'; //személyes adatlap kikapcsolása

include('public/kerdoiv_fejlec.php');

$kerdes_darab = 0;

$result = mysql_query("SELECT sorszam, kerdes_hu, kerdes_en, kerdes_de, tipus, sorrend FROM kerdesek WHERE status = '1' AND kerdoiv_sorszam = '$kerdoiv_sorszam' ORDER BY sorrend");
while ($next_element = mysql_fetch_array($result)){
    
    $kerdes_darab++;
    $sorszam_kerdes = $next_element[sorszam];
    $kerdes_tipus = $next_element[tipus]; // aktuális kérdés tipusa
    
    #$_SESSION['szures'][$sorszam]['kerdes'];
    #$_SESSION['szures'][$sorszam]['valasz'];
    $szures_kieg_kerdes = $_REQUEST[k];
    $szures_kieg_valasz = $_REQUEST[v];
    
    if ($szures_kieg_kerdes == $sorszam_kerdes){
        $szures_lista .= 'Kérdés: '. $next_element['kerdes_'.$_SESSION[lang]];
    }
        
    if (($szures_kieg_kerdes) AND ($szures_kieg_valasz)){
        $szures_kiegeszites = "
        AND va.kitolto_sorszam
        IN (SELECT kitolto_sorszam FROM valaszadasok WHERE kerdes_sorszam = $szures_kieg_kerdes AND valasz_sorszam = $szures_kieg_valasz)";
    }
    
    if (($kerdes_tipus == 'radio') OR ($kerdes_tipus == 'select') OR ($kerdes_tipus == 'checkbox')){
        $result2 = mysql_query("SELECT sorszam FROM valaszadasok WHERE kerdes_sorszam = $sorszam_kerdes");
        $valaszadok_szama = mysql_num_rows($result2);
        
        $result2 = mysql_query("SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, COUNT(*), v.valasz_en, v.valasz_de, va.valasz_sorszam
        FROM valaszadasok AS va
        LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
        LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
        WHERE k.sorszam = $sorszam_kerdes
        $szures_kiegeszites
        GROUP BY valasz_hu
        ORDER BY COUNT(*) DESC");
        
        #először szűrjük le azokat a kitöltőket akik egy adott kérdésre adott választ adtak
        #(SELECT kitolto_sorszam FROM valaszadasok WHERE kerdes_sorszam = '1' AND valasz_sorszam = '1')

        while ($eredmenyek = mysql_fetch_array($result2)){
            $eredmenyarany = $eredmenyek[3] / $valaszadok_szama;
            $eredmenyarany = $eredmenyarany*300;
			if ($_SESSION[lang] == 'hu'){ $valasz_szoveg = $eredmenyek[2];}
			if ($_SESSION[lang] == 'en'){ $valasz_szoveg = $eredmenyek[4];}
			if ($_SESSION[lang] == 'de'){ $valasz_szoveg = $eredmenyek[5];}
            $eredmeny_lista .= '<div class="valasz szoveg">'.$valasz_szoveg.' ('.$eredmenyek[3].' db) </div><div class="grafv">
                       <div class="graf" style="width: '.$eredmenyarany.'px"></div></div>
                       <div class="filter"><a href="?p=eredmeny&kerdoiv='.$kerdoiv_sorszam.'&k='.$sorszam_kerdes.'&v='.$eredmenyek[6].'"><img src="graphics/filter.png" alt="" /></a></div><br />';
            
            if ($szures_kieg_valasz == $eredmenyek[6]){
                $szures_lista .= '<br />Válasz: '. $valasz_szoveg;
            }
            
            }
    }
    
    if ($kerdes_tipus == 'ranking'){
        $result2 = mysql_query("SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, va.ertek, COUNT(*), v.sorszam
        FROM valaszadasok AS va
        LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
        LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
        WHERE k.sorszam = $sorszam_kerdes 
        $szures_kiegeszites
        GROUP BY valasz_hu, va.ertek
        ORDER BY v.sorszam, va.ertek");
        
        $sor = 0;
        while ($eredmenyek = mysql_fetch_array($result2)){
            
            $result22 = mysql_query("SELECT sorszam FROM valaszadasok WHERE valasz_sorszam = $eredmenyek[5]");
            $valaszadok_szama = mysql_num_rows($result22);
            
            $sor++;
            
            $osztalyzat = $eredmenyek[3];
            $szavazatszam = $eredmenyek[4]-1;
            
            $abszolut = $abszolut + ($osztalyzat*$szavazatszam);
            
            if ($rank_archiv == $eredmenyek[2]){
                $rank_valasz = '';
                $sortores = '';
            } else {
                $rank_valasz = '<td>'.$eredmenyek[2].'</td>';
                if ($sor > 1){
                    $abszolut = $abszolut / $valaszadok_szama;
                    $abszolut = round($abszolut, 1);
                    $sortores = '<td>'.$abszolut.'</td></tr><tr>';
                    $abszolut = 0;
                } else {
                    $sortores = '<tr>';
                }
            }
            
            $eredmenyarany = $szavazatszam / $valaszadok_szama;
            $eredmenyarany = $eredmenyarany*30;
            
            $rank_archiv = $eredmenyek[2];
            $eredmeny_lista .= $sortores.$rank_valasz.'<td>'.$szavazatszam.'<div class="graf2v"><div class="graf2" style="width: '.$eredmenyarany.'px"></div></div></td>'.$sortores2;
        }
        
        $abszolut = $abszolut / $valaszadok_szama;
        $abszolut = round($abszolut, 1);
        $eredmeny_lista = '<table class="rank_eredmeny">'
                . '<td></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>Átlag</td>'
                . $eredmeny_lista.'<td>'.$abszolut.'</td>'
                . '</tr>'
                . '</table>';
        
    }
    
    if (($kerdes_tipus == 'text') OR ($kerdes_tipus == 'textarea')){
        $result2 = mysql_query("SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, va.szoveg
        FROM valaszadasok AS va
        LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
        LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
        WHERE k.sorszam = $sorszam_kerdes
        $szures_kiegeszites
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
if ($szures_kiegeszites){
    $szuresek_lista = '<h4>Szűrésre jelölt válaszok:</h4>'.$szures_lista;
    
}

$tartalom = $kerdoiv_fejlec.$szuresek_lista.$kerdes_blokk;
?>
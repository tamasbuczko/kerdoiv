<?php
$adat_off = 'display: none;'; //személyes adatlap kikapcsolása

include('public/kerdoiv_fejlec.php');

$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_csaladiallapot");
while ($next_element = mysql_fetch_array($result)){
    $csaladiallapot_szureslista .=  
          '<p>'.$next_element['nev_'.$_SESSION[lang]].'</p>'
        . '<a href="?p=eredmeny&kerdoiv='.$kerdoiv_sorszam.'&k2=csaladiallapot&v2='.$eredmenyek[6].'">'
        . '<img src="graphics/filter.png" alt="" />'
        . '</a>';
}

$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_foglalkozasok");
while ($next_element = mysql_fetch_array($result)){
    $foglalkozasok_szureslista .=  
          '<p>'.$next_element['nev_'.$_SESSION[lang]].'</p>'
        . '<a href="?p=eredmeny&kerdoiv='.$kerdoiv_sorszam.'&k2=foglalkozas&v2='.$eredmenyek[6].'">'
        . '<img src="graphics/filter.png" alt="" />'
        . '</a>';
}

$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_vegzettseg");
while ($next_element = mysql_fetch_array($result)){
    $vegzettseg_szureslista .=  
          '<p>'.$next_element['nev_'.$_SESSION[lang]].'</p>'
        . '<a href="?p=eredmeny&kerdoiv='.$kerdoiv_sorszam.'&k2=vegzettseg&v2='.$eredmenyek[6].'">'
        . '<img src="graphics/filter.png" alt="" />'
        . '</a>';
}

$result = mysql_query("SELECT country_id, short_name FROM dat_orszag");
while ($next_element = mysql_fetch_array($result)){
    $orszag_szureslista .=  
          '<p>'.$next_element[short_name].'</p>'
        . '<a href="?p=eredmeny&kerdoiv='.$kerdoiv_sorszam.'&k2=orszag&v2='.$eredmenyek[6].'">'
        . '<img src="graphics/filter.png" alt="" />'
        . '</a>';
}

$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_jovedelmek");
while ($next_element = mysql_fetch_array($result)){
    $jovedelmek_szureslista .=  
          '<p>'.$next_element['nev_'.$_SESSION[lang]].'</p>'
        . '<a href="?p=eredmeny&kerdoiv='.$kerdoiv_sorszam.'&k2=jovedelem&v2='.$eredmenyek[6].'">'
        . '<img src="graphics/filter.png" alt="" />'
        . '</a>';
}

$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_nemek");
while ($next_element = mysql_fetch_array($result)){
    $nemek_szureslista .=  
          '<p>'.$next_element['nev_'.$_SESSION[lang]].'</p>'
        . '<a href="?p=eredmeny&kerdoiv='.$kerdoiv_sorszam.'&k2=neme&v2='.$next_element[id].'">'
        . '<img src="graphics/filter.png" alt="" />'
        . '</a>';
}

$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_eletkor");
while ($next_element = mysql_fetch_array($result)){
    $eletkor_szureslista .=  
          '<p>'.$next_element['nev_'.$_SESSION[lang]].'</p>'
        . '<a href="?p=eredmeny&kerdoiv='.$kerdoiv_sorszam.'&k2=eletkora&v2='.$next_element[id].'">'
        . '<img src="graphics/filter.png" alt="" />'
        . '</a>';
}

$szemelyes_szuresek = '<div class="doboz"><h4>'.$lang['Szűrés a kitöltői adatokra'].':</h4>'
        . '<div style="width: 710px;">'
        . '<label id="neme_kapcs">'.$lang['neme'].':</label>'
        . '<div id="neme_doboz" class="szemelyes_szures">'
        . $nemek_szureslista
        . '</div>'
        . '<label id="eletkor_kapcs">'.$lang['életkora'].':</label>'
	. '<div id="eletkor_doboz" class="szemelyes_szures">'
        . $eletkor_szureslista
        . '</div>'
        . '<label id="csaladiallapot_kapcs">'.$lang['családi állapota'].':</label>'
        . '<div id="csaladiallapot_doboz" class="szemelyes_szures">'
        . $csaladiallapot_szureslista 
        . '</div>'
        . '<label id="foglalkozas_kapcs">'.$lang['foglalkozása'].':</label>'
        . '<div id="foglalkozas_doboz" class="szemelyes_szures">'
        . $foglalkozasok_szureslista 
        . '</div>'
        . '<label id="vegzettseg_kapcs">'.$lang['végzettsége'].':</label>'
        . '<div id="vegzettseg_doboz" class="szemelyes_szures">'
        . $vegzettseg_szureslista 
        . '</div>'
        . '<label id="jovedelme_kapcs">'.$lang['jövedelme'].':</label>'
        . '<div id="jovedelme_doboz" class="szemelyes_szures">'
        . $jovedelmek_szureslista 
        . '</div>'
        . '<label id="orszag_kapcs">'.$lang['ország'].':</label>'
        . '<div id="orszag_doboz" class="szemelyes_szures">'
        . $orszag_szureslista 
        . '</div>'
        . '</div>'
        . '<br style="clear: both;" />'
        .'</div>';


$kerdes_darab = 0;

if ($_REQUEST[szurki]){
   unset($_SESSION['szures']);
   unset($_SESSION['szures2']);
}

$sorszam_szures = count($_SESSION['szures']);
$sorszam_szures++;

if (($_REQUEST[k]) AND ($_REQUEST[v])){
   $_SESSION['szures'][$sorszam_szures]['kerdes'] = $_REQUEST[k];
   $_SESSION['szures'][$sorszam_szures]['valasz'] = $_REQUEST[v];
}

$sorszam_szures2 = count($_SESSION['szures2']);
$sorszam_szures2++;

if (($_REQUEST[k2]) AND ($_REQUEST[v2])){
   $_SESSION['szures2'][$sorszam_szures2]['kerdes'] = $_REQUEST[k2];
   $_SESSION['szures2'][$sorszam_szures2]['valasz'] = $_REQUEST[v2];
}

if ($_SESSION['szures2']){
          foreach ($_SESSION['szures2'] as $key => $value) {
			 $szures_lista2 .= '<br />Kérdés: '. $_SESSION['szures2'][$key]['kerdes'];
	  }  
}

$result = mysql_query("SELECT sorszam, kerdes_hu, kerdes_en, kerdes_de, tipus, sorrend FROM kerdesek WHERE status = '1' AND kerdoiv_sorszam = '$kerdoiv_sorszam' ORDER BY sorrend");
while ($next_element = mysql_fetch_array($result)){
    
    $kerdes_darab++;
    $sorszam_kerdes = $next_element[sorszam];
    $kerdes_tipus = $next_element[tipus]; // aktuális kérdés tipusa
    
    #$szures_kieg_kerdes = $_REQUEST[k];
    #$szures_kieg_valasz = $_REQUEST[v];
	$szures_kiegeszites = '';
    
	if ($_SESSION['szures']){
	  foreach ($_SESSION['szures'] as $key => $value) {
		 if ($_SESSION['szures'][$key]['kerdes'] == $sorszam_kerdes){
			 $szures_lista .= '<br />Kérdés: '. $next_element['kerdes_'.$_SESSION[lang]];
		 }
	  }
	}
        
    if ($_SESSION['szures']){
	  foreach ($_SESSION['szures'] as $key => $value) {
		$szures_kieg_kerdes = $_SESSION['szures'][$key]['kerdes'];
		$szures_kieg_valasz	= $_SESSION['szures'][$key]['valasz'];	
                $szures_kiegeszites .= "
                AND va.kitolto_sorszam
                IN (SELECT kitolto_sorszam FROM valaszadasok WHERE kerdes_sorszam = $szures_kieg_kerdes AND valasz_sorszam = $szures_kieg_valasz)";
	  }
	}
        
        if ($_SESSION['szures2']){
	  foreach ($_SESSION['szures2'] as $key => $value) {
		$szures_kieg_kerdes = $_SESSION['szures2'][$key]['kerdes'];
		$szures_kieg_valasz	= $_SESSION['szures2'][$key]['valasz'];
                
                    $szures_kiegeszites2 .= "
                    AND va.kitolto_sorszam
                    IN (SELECT sorszam FROM kitoltok WHERE $szures_kieg_kerdes = '$szures_kieg_valasz')";

	  }
	}
	
	if ($_SESSION['szures']){
	  foreach ($_SESSION['szures'] as $key => $value) {  
		 $x = $_SESSION['szures'][$key]['kerdes'];
	  }
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
        $szures_kiegeszites2
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
            
			if ($_SESSION['szures']){
			   foreach ($_SESSION['szures'] as $key => $value) {
				  if ($_SESSION['szures'][$key]['valasz'] == $eredmenyek[6]){
					  $szures_lista .= '<br />Válasz: '. $valasz_szoveg;
				  }
			   }
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
		$szures_kiegeszites2
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
		$szures_kiegeszites2
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
if (($szures_kiegeszites) OR ($szures_kiegeszites2)){
    $szuresek_lista = '<div class="szuresek"><h4>Szűrésre jelölt válaszok:</h4>'.$szures_lista.$szures_lista2.'<br />'
            . '<a href="?p=eredmeny&kerdoiv='.$kerdoiv_sorszam.'&szurki=1">szűrés kikapcsolása</a></div>';
    
}

$tartalom = $kerdoiv_fejlec.$szuresek_lista.$szemelyes_szuresek.$kerdes_blokk;
?>
<?php
require_once ('public/jogosultsag_kerdoiv.php');
$kerdoiv_sorszam = $kerdoiv_obj->sorszam;
$kerdes_darab = 0;

if ($_REQUEST[kitolto]){
    $kitoltore_szures = "AND va.kitolto_sorszam = '$_REQUEST[kitolto]'";
}

if ($jogosult_eredmeny){
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
          $szures_id = $_SESSION['szures2'][$key]['valasz'];
          $szures_tipusa = $_SESSION['szures2'][$key]['kerdes'];
		  if ($szures_tipusa == 'eletkora'){$szures_tipusa = 'kora';}
          $szures_lista2 .= '<br />Kérdés: '. $_SESSION['szures2'][$key]['kerdes'] . ' ('.$kerdoiv_obj->szemelyes_adat_tipusok[$szures_tipusa][$szures_id]['nev'].')';
       }  
    }
    
    //tényleges eredmény számolás kezdete
    $result = mysql_query("SELECT sorszam, kerdes_hu, kerdes_en, kerdes_de, tipus, sorrend FROM kerdesek WHERE status = '1' AND kerdoiv_sorszam = '$kerdoiv_sorszam' ORDER BY sorrend");
    while ($next_element = mysql_fetch_array($result)){
        $kerdes_darab++;
        $sorszam_kerdes = $next_element[sorszam];
        $kerdes_tipus = $next_element[tipus]; // aktuális kérdés tipusa
        $szures_kiegeszites = '';

        if ($_SESSION['szures']){  //konkrét kérdésre szűrünk
           foreach ($_SESSION['szures'] as $key => $value) {
              if ($_SESSION['szures'][$key]['kerdes'] == $sorszam_kerdes){
                 $szures_lista .= '<br />Kérdés: '. $next_element['kerdes_'.$_SESSION[lang]];
              }
           }
        }

        if ($_SESSION['szures']){
           foreach ($_SESSION['szures'] as $key => $value) {
             $szures_kieg_kerdes = $_SESSION['szures'][$key]['kerdes'];
             $szures_kieg_valasz = $_SESSION['szures'][$key]['valasz'];	
             $szures_kiegeszites .= "
                    AND va.kitolto_sorszam
                    IN (SELECT kitolto_sorszam FROM valaszadasok WHERE kerdes_sorszam = $szures_kieg_kerdes AND valasz_sorszam = $szures_kieg_valasz)";
           }
        }

        if ($_SESSION['szures2']){  // személyes adatra szűrünk
           foreach ($_SESSION['szures2'] as $key => $value) {
              $szures_kieg_kerdes = $_SESSION['szures2'][$key]['kerdes'];
              $szures_kieg_valasz	= $_SESSION['szures2'][$key]['valasz'];
              $szures_kiegeszites2 .= "
               AND va.kitolto_sorszam
               IN (SELECT sorszam FROM kitoltok WHERE $szures_kieg_kerdes = '$szures_kieg_valasz')";
           }
        }

        if (($kerdes_tipus == 'radio') OR ($kerdes_tipus == 'select') OR ($kerdes_tipus == 'checkbox')){
            $result2 = mysql_query("SELECT sorszam FROM valaszadasok WHERE kerdes_sorszam = $sorszam_kerdes");
            $valaszadok_szama = mysql_num_rows($result2);
            $result2 = mysql_query("SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, COUNT(*), v.valasz_en, v.valasz_de, va.valasz_sorszam, hv.valasz_id AS helyes, v.pontszam
            FROM valaszadasok AS va
            LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
            LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
			LEFT JOIN helyes_valaszok AS hv ON v.sorszam = hv.valasz_id
            WHERE k.sorszam = $sorszam_kerdes
            $szures_kiegeszites
            $szures_kiegeszites2
            $kitoltore_szures
            GROUP BY valasz_hu
            ORDER BY COUNT(*) DESC");
            #először szűrjük le azokat a kitöltőket akik egy adott kérdésre adott választ adtak
            #(SELECT kitolto_sorszam FROM valaszadasok WHERE kerdes_sorszam = '1' AND valasz_sorszam = '1')
            while ($eredmenyek = mysql_fetch_array($result2)){
			   $szavazat_darabszam = $eredmenyek[3];
                $eredmenyarany = $szavazat_darabszam / $valaszadok_szama;
                $eredmenyarany = $eredmenyarany*300;
				if ($_SESSION[lang] == 'hu'){ $valasz_szoveg = $eredmenyek[2];}
			    if ($_SESSION[lang] == 'en'){ $valasz_szoveg = $eredmenyek[4];}
			    if ($_SESSION[lang] == 'de'){ $valasz_szoveg = $eredmenyek[5];}
                                $pontszam = $eredmenyek[8];
                                $osszpontszam = $osszpontszam + $pontszam;
				$valasz_sorszam = $eredmenyek[6];
				if ($eredmenyek[7]){
				  $valasz_blokk_tomb[$valasz_sorszam]['helyes'] = '1';
				  $eredmenyek_tomb[$valasz_sorszam]['helyes'] = '1';
				}
				$eredmenyek_tomb[$valasz_sorszam]['valasz_sorszam'] = $valasz_sorszam;
                                $eredmenyek_tomb[$valasz_sorszam]['valasz_pontszam'] = $pontszam;
				$eredmenyek_tomb[$valasz_sorszam]['valasz_szavazatszam'] = $szavazat_darabszam;
				$eredmenyek_tomb[$valasz_sorszam]['valasz_szavazatszam_f'] = '('.$szavazat_darabszam.' db)';
				$eredmenyek_tomb[$valasz_sorszam]['valasz_szavazatarany'] = $eredmenyarany;
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
            $result2 = mysql_query("SELECT sorszam, valasz_hu, valasz_en, valasz_de FROM valaszok WHERE kerdes_valasz = $sorszam_kerdes");
            $sor = 0;
            while ($eredmenyek = mysql_fetch_array($result2)){
                unset($sor_adat);
                unset($abszolut);
                $result22v = mysql_query("SELECT va.sorszam FROM valaszadasok AS va WHERE va.valasz_sorszam = $eredmenyek[0] $szures_kiegeszites $szures_kiegeszites2");
                $valaszadok_szama = mysql_num_rows($result22v);
                for ($i=1; $i<=5; $i++){
				  $result22 = mysql_query("SELECT va.sorszam FROM valaszadasok AS va WHERE va.valasz_sorszam = $eredmenyek[0] AND va.ertek = $i $szures_kiegeszites $szures_kiegeszites2");
				  if ($result22){
					 $szavazatszam = mysql_num_rows($result22);
				  } else {
					 $szavazatszam = 0;
				  }
				  if ($valaszadok_szama > 0){
					 $eredmenyarany = $szavazatszam / $valaszadok_szama;
					 $eredmenyarany = $eredmenyarany*30;
				  }
				  $sor_adat .= '<td>'.$szavazatszam.'<div class="graf2v"><div class="graf2" style="width: '.$eredmenyarany.'px"></div></div></td>';
				  $abszolut = $abszolut + ($i*$szavazatszam);
                 }
				  if ($valaszadok_szama > 0){
					 $atlag = $abszolut / $valaszadok_szama;
					 $atlag = round($atlag, 1);
				  }
				  $eredmeny_lista .= '<tr><td>'.$eredmenyek[valasz_.$_SESSION[lang]].'</td>'.$sor_adat.'<td>'.$atlag.'</td></tr>';
            }
            $eredmeny_lista = ''
			. '<table class="rank_eredmeny">'
            . '<tr><td></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>Átlag</td></tr>'
            . $eredmeny_lista
            . '</table>';
			$kerdes_blokk_tomb[$sorszam_kerdes]['eredmeny_doboz'] = $eredmeny_lista;
			unset($eredmeny_lista);
        }

        if (($kerdes_tipus == 'text') OR ($kerdes_tipus == 'textarea')){
            $result2 = mysql_query("SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, va.szoveg
            FROM valaszadasok AS va
            LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
            LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
            WHERE k.sorszam = $sorszam_kerdes
            $szures_kiegeszites
            $szures_kiegeszites2
            $kitoltore_szures
            ORDER BY k.sorszam");
            $text_db = 0;
			unset($eredmenyek_tomb[$valasz_sorszam]['valasz_szavazatszam_f']);
            while ($eredmenyek = mysql_fetch_array($result2)){
                $text_db++;
				$valasz_sorszam = $eredmenyek[6];
				$eredmenyek_tomb[$valasz_sorszam]['valasz_sorszam'] = $valasz_sorszam;
				$eredmenyek_tomb[$valasz_sorszam]['valasz_szavazatszam'] = $eredmenyek[3];
				$eredmenyek_tomb[$valasz_sorszam]['valasz_szavazatszam_f'] .= $eredmenyek[3].' <br />';
				$xxxx .= '<div class="text_field">'.$text_db.'. '.$eredmenyek[3].'</div> <br />';
            }
			$kerdes_blokk_tomb[$sorszam_kerdes]['eredmeny_doboz'] = '<div class="scroll">'.$xxxx.'</div>';
			unset($xxxx);
        }
    } 
    if (($szures_kiegeszites) OR ($szures_kiegeszites2)){
        $szuresek_lista = $szures_lista.$szures_lista2;
    }
} else {
    $szuresek_lista = 'Nincs jogosultságod az eredmények megtekintéséhez!<br />'.$kerdoiv_obj->jogosultsag_uzenet;
}

if (!$_REQUEST[er] == 1){
   $smarty->assign('szotar', $szotar);
   $smarty->assign('kerdoiv_obj', $kerdoiv_obj);
   $smarty->assign('szuresek_lista', $szuresek_lista);
   $smarty->assign('kerdes_blokk', $kerdes_blokk);
   $smarty->assign('eredmenyek_tomb', $eredmenyek_tomb);
   $smarty->assign('osszpontszam', $osszpontszam);
   unset($kerdes_blokk);
   $smarty->assign('kerdes_blokk_tomb', $kerdes_blokk_tomb);
   $tartalom = $smarty->fetch('templates/kerdoiv.tpl');
}
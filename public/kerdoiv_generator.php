<?php$kerdes_darab = 0;if ($_REQUEST[sorrendezes]){   $kerdes_sorszam_sorrend = $_REQUEST[sorrendezes];   #$kerdes_sorszam_sorrend = kerdes_sorrend_55   $sorrend_ertek = $_REQUEST[$kerdes_sorszam_sorrend];   #$sorrend_ertek = 2 (ha a második helyre akarja állítani a kérdést)   $kerdes_sorszam_sorrend = explode('_', $kerdes_sorszam_sorrend);   #$kerdes_sorszam_sorrend[2] = 55;   $result = mysql_query("SELECT sorrend FROM kerdesek WHERE sorszam = $kerdes_sorszam_sorrend[2]");   $a = mysql_fetch_array($result);   $regihely = $a[sorrend];   $sql = "UPDATE kerdesek SET sorrend = '$sorrend_ertek' WHERE sorszam = $kerdes_sorszam_sorrend[2]";   mysql_query($sql);   if ($sorrend_ertek < $regihely){        $result = mysql_query("SELECT sorrend, sorszam FROM kerdesek WHERE sorszam <> $kerdes_sorszam_sorrend[2] AND kerdoiv_sorszam = '$kerdoiv_sorszam' AND sorrend >= '$sorrend_ertek' AND sorrend < '$regihely'");        while ($row = mysql_fetch_array($result)){              $uj_sorrend = $row[sorrend];             $uj_sorrend++;             $sql2 = "UPDATE kerdesek SET sorrend = '$uj_sorrend' WHERE sorszam = $row[sorszam]";             mysql_query($sql2);          }   } else {        $result = mysql_query("SELECT sorrend, sorszam FROM kerdesek WHERE sorszam <> $kerdes_sorszam_sorrend[2] AND kerdoiv_sorszam = '$kerdoiv_sorszam' AND sorrend <= '$sorrend_ertek' AND sorrend > '$regihely'");        while ($row = mysql_fetch_array($result)){              $uj_sorrend = $row[sorrend];             $uj_sorrend--;             $sql2 = "UPDATE kerdesek SET sorrend = '$uj_sorrend' WHERE sorszam = $row[sorszam]";             mysql_query($sql2);          }   }}$result = mysql_query("SELECT sorszam, kerdes_hu, kerdes_en, kerdes_de, tipus, sorrend, kep_file, video_embed FROM kerdesek WHERE status = '1' AND kerdoiv_sorszam = '$kerdoiv_sorszam' ORDER BY sorrend");$kerdes_ossz_darab = mysql_num_rows($result);while ($next_element = mysql_fetch_array($result)){    $kerdes_darab++;    $kerdes_sorrend = '';    $sorrend_x = '';    $sorszam_kerdes = $next_element[sorszam];    $kerdesek[$sorszam_kerdes] = $kerdes_darab;   //alap esetben minden kérdés megválaszolatlannak jelölünk    $kerdes_tipus = $next_element[tipus]; // aktuális kérdés tipusa		if ($next_element[video_embed]){	   if (strpos($next_element[video_embed], 'youtube')){		  $video_link = explode('=', $next_element[video_embed]);		  $kerdes_video_tipus = 'youtube';		  $kerdes_video = $video_link[1];	   }	   if (strpos($next_element[video_embed], 'vimeo')){		  $video_link = explode('/', $next_element[video_embed]);		  $kerdes_video_tipus = 'vimeo';		  $kerdes_video = end($video_link);	   }       } else {        unset($kerdes_video);   	}        $resultx = mysql_query("SELECT sorszam, kerdes_valasz, valasz_hu, valasz_en, valasz_de, kep_file, video_embed, kapcs_szoveg, kapcs_kep, kapcs_video FROM valaszok WHERE status = '1' AND kerdes_valasz = '$sorszam_kerdes' ORDER BY sorrend");    while ($next_elementv = mysql_fetch_array($resultx)){                $sorszam_valasz = $next_elementv[sorszam];		$valasz_blokk_tomb[$sorszam_valasz]['valasz_sorszam'] = $sorszam_valasz;		$valasz_blokk_tomb[$sorszam_valasz]['valasz_szoveg'] = $next_elementv['valasz_'.$kerdoiv_obj->valasztott_nyelv];		$valasz_blokk_tomb[$sorszam_valasz]['valasz_kerdese'] = $sorszam_kerdes;                if ($kerdes_tipus == 'radio'){		   $valasz_blokk_tomb[$sorszam_valasz]['valasz_fajta'] = 'szoveges';		   if (($next_elementv[kep_file]) AND ($next_elementv[kapcs_kep] == '1')){			  $valasz_blokk_tomb[$sorszam_valasz]['valasz_kep'] = $next_elementv[kep_file];			  $valasz_blokk_tomb[$sorszam_valasz]['valasz_fajta'] = 'kepes';		   }		   if (($next_elementv[video_embed]) AND ($next_elementv[kapcs_video] == '1')){			  $valasz_blokk_tomb[$sorszam_valasz]['valasz_fajta'] = 'videos';			  if (strpos($next_elementv[video_embed], 'youtube')){				  $video_link = explode('=', $next_elementv[video_embed]);				  $valasz_blokk_tomb[$sorszam_valasz]['valasz_video'] = '<iframe style="float: left; margin: 0px 0px 0px 50px;" width="280" height="210" src="//www.youtube.com/embed/'.$video_link[1].'" frameborder="0" allowfullscreen></iframe><br stlye="clear:both;">';			   }			   if (strpos($next_elementv[video_embed], 'vimeo')){				  $video_link = explode('/', $next_elementv[video_embed]);				  $valasz_blokk_tomb[$sorszam_valasz]['valasz_video'] = '<iframe src="//player.vimeo.com/video/'.end($video_link).'" style="float: left; margin: 0px 0px 0px 50px;" width="280" height="210" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><br stlye="clear:both;">';			   }		   }        }                if ($kerdes_tipus == 'select'){}                if ($kerdes_tipus == 'checkbox'){            if ($_REQUEST[submit]){               $checkbox = $_REQUEST['checkbox_'.$sorszam_valasz];               if ($checkbox == 'on'){                   $valaszok_data_checkbox[$sorszam_valasz][checkbox] = $sorszam_kerdes;                    $kerdesek[$sorszam_kerdes] = '0';    // azért, hogy tudjuk, hogy választott e valamit               }            }				$valasz_blokk_tomb[$sorszam_valasz]['valasz_fajta'] = 'szoveges';            if (($next_elementv[kep_file]) AND ($next_elementv[kapcs_kep] == '1')){			   $valasz_blokk_tomb[$sorszam_valasz]['valasz_fajta'] = 'kepes';			   $valasz_blokk_tomb[$sorszam_valasz]['valasz_kep'] = $next_elementv[kep_file];            }						if (($next_elementv[video_embed]) AND ($next_elementv[kapcs_video] == '1')){			   $valasz_blokk_tomb[$sorszam_valasz]['valasz_fajta'] = 'videos';			   if (strpos($next_elementv[video_embed], 'youtube')){				  $video_link = explode('=', $next_elementv[video_embed]);				  $valasz_blokk_tomb[$sorszam_valasz]['valasz_video'] = '<iframe style="float: left; margin: 0px 0px 0px 50px;" width="280" height="210" src="//www.youtube.com/embed/'.$video_link[1].'" frameborder="0" allowfullscreen></iframe><br stlye="clear:both;">';			   }			   if (strpos($next_elementv[video_embed], 'vimeo')){				  $video_link = explode('/', $next_elementv[video_embed]);				  $valasz_blokk_tomb[$sorszam_valasz]['valasz_video'] = '<iframe src="//player.vimeo.com/video/'.end($video_link).'" style="float: left; margin: 0px 0px 0px 50px;" width="280" height="210" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><br stlye="clear:both;">';			   }              }        }                if ($kerdes_tipus == 'ranking'){            unset($valasz_ertekek);            for ($i=1; $i<6; $i++){ //$i elszámol 1-től 5-ig és létrehozza az értékelő kapcsolókat			   $ranking = $_REQUEST['rank_'.$sorszam_valasz];			   if ($i == $ranking){				  $ranking_request = 'checked="checked"';			   } else {				  $ranking_request = '';			   }               $valasz_ertekek .= '<input type="radio" name="rank_'.$sorszam_valasz.'" '.$ranking_request.' class="ranking_value" value="'.$i.'" />';            }            $valasz_blokk_tomb[$sorszam_valasz]['valasz_ertekek'] = $valasz_ertekek;            if (($next_elementv[kep_file]) AND ($next_elementv[kapcs_kep] == '1')){			   $valasz_blokk_tomb[$sorszam_valasz]['valasz_fajta'] = 'kepes';			   $valasz_blokk_tomb[$sorszam_valasz]['valasz_kep'] = $next_elementv[kep_file];                $ranking_kep = 1;            } else {			   $valasz_blokk_tomb[$sorszam_valasz]['valasz_fajta'] = 'szoveges';                $ranking_kep = 0;            }                        //kitöltött űrlap feldolgozása            if ($_REQUEST[submit]){                $rank = $_REQUEST['rank_'.$sorszam_valasz];                if ($rank){                     $valaszok_data_rank[$sorszam_valasz][rank] = $rank;                    $valaszok_data_rank[$sorszam_valasz][kerdes] = $sorszam_kerdes;                    $kerdesek[$sorszam_kerdes] = '0';                }            }        }     } //válaszok ciklus vége        //már csak az 1 választási lehetőségű kérdésekre adott válaszokat vizsgáljuk    if ($_REQUEST[submit]){	  if ($kerdes_tipus == 'radio'){		$radio = $_REQUEST['radio_'.$sorszam_kerdes];    //megvizsgáljuk, hogy a rádió típusú kérdésre volt e válasz		$valaszok_data_radio[$sorszam_kerdes][radio] = $radio;		if ($radio){ 			$kerdesek[$sorszam_kerdes] = '0';             //ha volt válasz, akkor a kérdést megválaszoltnak jelöljük		}	  }	  if ($kerdes_tipus == 'select'){		if ($_REQUEST['select_'.$sorszam_kerdes]){		  $select = $_REQUEST['select_'.$sorszam_kerdes];		  if ($select != '0'){			$kerdesek[$sorszam_kerdes] = '0';		  }		}		$valaszok_data_select[$sorszam_kerdes][select] = $select; 	  }	  //csak egy text generálódik a kérdéshez, ezért ebben a ciklusban lehet generálni is	  if ($kerdes_tipus == 'text'){		 if ($_REQUEST['text_'.$sorszam_kerdes]){		  $valaszok_data_text[$sorszam_kerdes][text] = $_REQUEST['text_'.$sorszam_kerdes];		  $kerdesek[$sorszam_kerdes] = '0';		 }	  }	  if ($kerdes_tipus == 'textarea'){		 if ($_REQUEST['textarea_'.$sorszam_kerdes]){		  $valaszok_data_textarea[$sorszam_kerdes][textarea] = $_REQUEST['textarea_'.$sorszam_kerdes];		  $kerdesek[$sorszam_kerdes] = '0';   //megjelöljük, hogy válaszoltak a kérdésre		 }	  }    }    	for ($i=1; $i<=($kerdes_ossz_darab+1);$i++){	   if ($i == $kerdes_darab){		  $sorrend_check = 'selected="selected"';	   } else {		  $sorrend_check = '';	   }	   $sorrend_x .= '<option value="'.$i.'" '.$sorrend_check.'>'.$i.'</option>'."\n";	}    	$kerdes_blokk_tomb[$sorszam_kerdes]['kerdes_sorszam'] = $sorszam_kerdes;	$kerdes_blokk_tomb[$sorszam_kerdes]['sorrend'] = $next_element[sorrend];    $kerdes_blokk_tomb[$sorszam_kerdes]['sorrend_x'] = $sorrend_x;	$kerdes_blokk_tomb[$sorszam_kerdes]['kerdes_darab'] = $kerdes_darab;    $kerdes_blokk_tomb[$sorszam_kerdes]['kerdes'] = $next_element['kerdes_'.$kerdoiv_obj->valasztott_nyelv];    $kerdes_blokk_tomb[$sorszam_kerdes]['kerdes_kep'] = $next_element[kep_file];    $kerdes_blokk_tomb[$sorszam_kerdes]['kerdes_video'] = $kerdes_video;	$kerdes_blokk_tomb[$sorszam_kerdes]['kerdes_video_tipus'] = $kerdes_video_tipus;	$kerdes_blokk_tomb[$sorszam_kerdes]['kerdes_tipus'] = $next_element[tipus];	$sorrendek[$next_element[sorrend]] = $sorszam_kerdes;}   //kérdés ciklus vége foreach ($sorrendek as $key=>$value){   $uj_kerdes_blokk_tomb[$value]['kerdes_sorszam'] = $kerdes_blokk_tomb[$value]['kerdes_sorszam'];   $uj_kerdes_blokk_tomb[$value]['sorrend'] = $kerdes_blokk_tomb[$value]['sorrend'];   $uj_kerdes_blokk_tomb[$value]['sorrend_x'] = $kerdes_blokk_tomb[$value]['sorrend_x'];   $uj_kerdes_blokk_tomb[$value]['kerdes_darab'] = $kerdes_blokk_tomb[$value]['kerdes_darab'];   $uj_kerdes_blokk_tomb[$value]['kerdes'] = $kerdes_blokk_tomb[$value]['kerdes'];   $uj_kerdes_blokk_tomb[$value]['kerdes_kep'] = $kerdes_blokk_tomb[$value]['kerdes_kep'];   $uj_kerdes_blokk_tomb[$value]['kerdes_video'] = $kerdes_blokk_tomb[$value]['kerdes_video'];   $uj_kerdes_blokk_tomb[$value]['kerdes_video_tipus'] = $kerdes_blokk_tomb[$value]['kerdes_video_tipus'];   $uj_kerdes_blokk_tomb[$value]['kerdes_tipus'] = $kerdes_blokk_tomb[$value]['kerdes_tipus'];   $uj_kerdes_blokk_tomb[$value]['eredmeny_doboz'] = $kerdes_blokk_tomb[$value]['eredmeny_doboz'];}$max_sorrend = max(array_keys($sorrendek));
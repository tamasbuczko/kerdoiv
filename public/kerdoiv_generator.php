<?phpif ($_REQUEST[sorrendezes]){   $kerdes_sorszam_sorrend = $_REQUEST[sorrendezes];   $sorrend_ertek = $_REQUEST[$kerdes_sorszam_sorrend];   $kerdes_sorszam_sorrend = explode('_', $kerdes_sorszam_sorrend);   $sql = "UPDATE kerdesek SET sorrend = '$sorrend_ertek' WHERE sorszam = $kerdes_sorszam_sorrend[2]";   mysql_query($sql);}$result = mysql_query("SELECT sorszam, kerdes_hu, kerdes_en, kerdes_de, tipus, sorrend, kep_file, video_embed FROM kerdesek WHERE status = '1' AND kerdoiv_sorszam = '$kerdoiv_sorszam' ORDER BY sorrend");$kerdes_ossz_darab = mysql_num_rows($result);while ($next_element = mysql_fetch_array($result)){    $kerdes_darab++;    $kerdes_sorrend = '';    $sorrend_x = '';    $sorszam_kerdes = $next_element[sorszam];    $kerdesek[$sorszam_kerdes] = $kerdes_darab;   //alap esetben minden kérdés megválaszolatlannak jelölünk    $kerdes_tipus = $next_element[tipus]; // aktuális kérdés tipusa        if ($next_element[kep_file]){        $kerdes_kep = '<img src="kerdes_kepek/'.$next_element[kep_file].'" class="question_img" alt="" />';    } else {        unset($kerdes_kep);    }		if ($next_element[video_embed]){	   if (strpos($next_element[video_embed], 'youtube')){		  $video_link = explode('=', $next_element[video_embed]);		  $kerdes_video = '<iframe style="float: left; margin: 0px 0px 20px 50px;" width="560" height="315" src="//www.youtube.com/embed/'.$video_link[1].'" frameborder="0" allowfullscreen></iframe><br stlye="clear:both;">';	   }	   if (strpos($next_element[video_embed], 'vimeo')){		  $video_link = explode('/', $next_element[video_embed]);		  $kerdes_video = '<iframe src="//player.vimeo.com/video/'.end($video_link).'" style="float: left; margin: 0px 0px 20px 50px;" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><br stlye="clear:both;">';	   }	       } else {        unset($kerdes_video);   	}        $resultx = mysql_query("SELECT sorszam, kerdes_valasz, valasz_hu, valasz_en, valasz_de, kep_file, video_embed, kapcs_szoveg, kapcs_kep, kapcs_video FROM valaszok WHERE status = '1' AND kerdes_valasz = '$sorszam_kerdes' ORDER BY sorrend");    while ($next_elementv = mysql_fetch_array($resultx)){                $sorszam_valasz = $next_elementv[sorszam];                if ($kerdes_tipus == 'radio'){            $radio = $_REQUEST['radio_'.$sorszam_kerdes];   // ***előző válasz megjegyzéséhez kell            if ($sorszam_valasz == $radio){                 // ha éppen azt a választ generálja, amit előbb kijelöltek              $radio_request = 'checked="checked"';         // akkor jelöli ha már ki volt választva korábban            } else {              $radio_request = '';            }                                               // ***		   if (($next_elementv[kep_file]) AND ($next_elementv[kapcs_kep] == '1')){			  $valaszok .= "\n".'<div class="answer_img"><input type="radio" name="radio_'.$sorszam_kerdes.'" '.$radio_request.' value="'.$sorszam_valasz.'" /><div class="answer_img_frame"><img src="valasz_kepek/'.$next_elementv[kep_file].'"><label>'.$next_elementv['valasz_'.$_SESSION[lang]].'</label></div></div>';		   } else {			  if (!$next_elementv[video_embed]){			   $valaszok .= "\n".'<input type="radio" name="radio_'.$sorszam_kerdes.'" '.$radio_request.' value="'.$sorszam_valasz.'" /><label>'.$next_elementv['valasz_'.$_SESSION[lang]].'</label>';			  }		   }		   if (($next_elementv[video_embed]) AND ($next_elementv[kapcs_video] == '1')){			  			  if (strpos($next_elementv[video_embed], 'youtube')){				  $video_link = explode('=', $next_elementv[video_embed]);				  $valasz_video = '<iframe style="float: left; margin: 0px 0px 20px 50px;" width="280" height="210" src="//www.youtube.com/embed/'.$video_link[1].'" frameborder="0" allowfullscreen></iframe><br stlye="clear:both;">';			   }			   if (strpos($next_elementv[video_embed], 'vimeo')){				  $video_link = explode('/', $next_elementv[video_embed]);				  $valasz_video = '<iframe src="//player.vimeo.com/video/'.end($video_link).'" style="float: left; margin: 0px 0px 20px 50px;" width="280" height="210" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><br stlye="clear:both;">';			   }			  			  $valaszok .= "\n".'<div class="answer_img"><input type="radio" name="radio_'.$sorszam_kerdes.'" '.$radio_request.' value="'.$sorszam_valasz.'" /><div class="answer_img_frame">'					  . $valasz_video					  . '<label>'.$next_elementv['valasz_'.$_SESSION[lang]].'</label></div></div>';		   }        }                if ($kerdes_tipus == 'select'){            $select = $_REQUEST['select_'.$sorszam_kerdes];            if ($select == $sorszam_valasz){              $select_request = 'selected="selected"';            } else {              $select_request = '';            }                       $valaszok .= "\n".'<option value="'.$next_elementv[sorszam].'" '.$select_request.'>'.$next_elementv['valasz_'.$_SESSION[lang]].'</option>';        }                if ($kerdes_tipus == 'checkbox'){            if ($_REQUEST[submit]){               $checkbox = $_REQUEST['checkbox_'.$sorszam_valasz];               if ($checkbox == 'on'){                   $check_request = 'checked="checked"';                    $valaszok_data_checkbox[$sorszam_valasz][checkbox] = $sorszam_kerdes;                    $kerdesek[$sorszam_kerdes] = '0';    // azért, hogy tudjuk, hogy választott e valamit               }            }	            if (($next_elementv[kep_file]) AND ($next_elementv[kapcs_kep] == '1')){		$valaszok .= "\n".'<div class="answer_img"><input type="checkbox" name="checkbox_'.$sorszam_valasz.'" '.$check_request.' /><div class="answer_img_frame"><img src="valasz_kepek/'.$next_elementv[kep_file].'"><label>'.$next_elementv['valasz_'.$_SESSION[lang]].'</label></div></div>';            } else {			   if (!$next_elementv[video_embed]){                $valaszok .= "\n".'<input type="checkbox" name="checkbox_'.$sorszam_valasz.'" '.$check_request.' /><label>'.$next_elementv['valasz_'.$_SESSION[lang]].'</label>';			   }            }						if (($next_elementv[video_embed]) AND ($next_elementv[kapcs_video] == '1')){			   			   if (strpos($next_elementv[video_embed], 'youtube')){				  $video_link = explode('=', $next_elementv[video_embed]);				  $valasz_video = '<iframe style="float: left; margin: 0px 0px 20px 50px;" width="280" height="210" src="//www.youtube.com/embed/'.$video_link[1].'" frameborder="0" allowfullscreen></iframe><br stlye="clear:both;">';			   }			   if (strpos($next_elementv[video_embed], 'vimeo')){				  $video_link = explode('/', $next_elementv[video_embed]);				  $valasz_video = '<iframe src="//player.vimeo.com/video/'.end($video_link).'" style="float: left; margin: 0px 0px 20px 50px;" width="280" height="210" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><br stlye="clear:both;">';			   }			   		$valaszok .= "\n".'<div class="answer_img"><input type="checkbox" name="checkbox_'.$sorszam_valasz.'" '.$check_request.' /><div class="answer_img_frame">'				. $valasz_video				. '<label>'.$next_elementv['valasz_'.$_SESSION[lang]].'</label></div></div>';            }            unset($check_request);        }                //osztályozás típus generálása        if ($kerdes_tipus == 'ranking'){            unset($valasz_ertekek);            for ($i=1; $i<6; $i++){ //$i elszámol 1-től 5-ig és létrehozza az értékelő kapcsolókat		$ranking = $_REQUEST['rank_'.$sorszam_valasz];		if ($i == $ranking){                    $ranking_request = 'checked="checked"';		} else {                    $ranking_request = '';                    #$figyelmeztetes++;  //???		}               $valasz_ertekek .= "\n".'<input type="radio" name="rank_'.$sorszam_valasz.'" '.$ranking_request.' class="ranking_value" value="'.$i.'" />';            }                        if (($next_elementv[kep_file]) AND ($next_elementv[kapcs_kep] == '1')){		$valaszok .= "\n".'			   <div class="answer_img">			   <div style="width: 140px; height: 50px; float: left;">                  <div class="ranking_img">					 <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span>				  </div>				  <br style="clear: both;" />                  <div style="float: left; width: 140px;">'. $valasz_ertekek."\n".'</div>				  <br style="clear: both;">				  </div>				  <div class="answer_img_frame">					 <img src="valasz_kepek/'.$next_elementv[kep_file].'">					 <label>'.$next_elementv['valasz_'.$_SESSION[lang]].'</label>				  </div>			   </div>';                $ranking_kep = 1;            } else {                $valaszok .= "\n".'<label class="ranking_text">'.$next_elementv['valasz_'.$_SESSION[lang]].'</label>'                    ."\n". '<div style="float: left;">'. $valasz_ertekek."\n".'</div>';                 $ranking_kep = 0;            }                        //kitöltött űrlap feldolgozása            if ($_REQUEST[submit]){                $rank = $_REQUEST['rank_'.$sorszam_valasz];                if ($rank){                     $valaszok_data_rank[$sorszam_valasz][rank] = $rank;                    $valaszok_data_rank[$sorszam_valasz][kerdes] = $sorszam_kerdes;                    $kerdesek[$sorszam_kerdes] = '0';                }            }        }               //válaszok ciklus vége    }        //már csak az 1 választási lehetőségű kérdésekre adott válaszokat vizsgáljuk        if ($kerdes_tipus == 'radio'){        if ($_REQUEST[submit]){            $radio = $_REQUEST['radio_'.$sorszam_kerdes];    //megvizsgáljuk, hogy a rádió típusú kérdésre volt e válasz           $valaszok_data_radio[$sorszam_kerdes][radio] = $radio;           if ($radio){               $kerdesek[$sorszam_kerdes] = '0';             //ha volt válasz, akkor a kérdést megválaszoltnak jelöljük           }        }    }           if ($kerdes_tipus == 'select'){        $valaszok = '<select name="select_'.$next_element[sorszam].'">'                . '<option value="0">---</option>'                . ''.$valaszok.''                . '</select>';                if ($_REQUEST[submit]){            if ($_REQUEST['select_'.$sorszam_kerdes]){                $select = $_REQUEST['select_'.$sorszam_kerdes];		if ($select != '0'){		  $kerdesek[$sorszam_kerdes] = '0';		}            }            $valaszok_data_select[$sorszam_kerdes][select] = $select;         }    }        //csak egy text generálódik a kérdéshez, ezért ebben a ciklusban lehet generálni is    if ($kerdes_tipus == 'text'){        if ($_REQUEST[submit]){            if ($_REQUEST['text_'.$sorszam_kerdes]){                $szoveg = $_REQUEST['text_'.$sorszam_kerdes];                $valaszok_data_text[$sorszam_kerdes][text] = $szoveg;                $text_request = $szoveg;		$kerdesek[$sorszam_kerdes] = '0';            }        }	$valaszok .= "\n".'<input type="text" name="text_'.$sorszam_kerdes.'" value="'.$text_request.'" />';	unset($text_request);    }        //csak egy text generálódik a kérdéshez, ezért ebben a ciklusban lehet generálni is    if ($kerdes_tipus == 'textarea'){        if ($_REQUEST[submit]){            if ($_REQUEST['textarea_'.$sorszam_kerdes]){                $szoveg = $_REQUEST['textarea_'.$sorszam_kerdes];                $valaszok_data_textarea[$sorszam_kerdes][textarea] = $szoveg;                $textarea_request = $szoveg;                $kerdesek[$sorszam_kerdes] = '0';   //megjelöljük, hogy válaszoltak a kérdésre            }        }	$valaszok .= "\n".'<textarea cols="1" rows="1" name="textarea_'.$sorszam_kerdes.'">'.$textarea_request.'</textarea>';	unset($textarea_request);    }             if ($next_element[tipus] == 'ranking'){         if ($ranking_kep == 0){            $valaszok = '<div class="ranking">'                . '<span>1</span><span>2</span><span>3</span><span>4</span><span>5</span>'                . '</div>'.                $valaszok;        }    }        if (($_REQUEST[mod]) AND ($_SESSION[qa_user_id])){        $szerk_gomb = '				<div>				<a href="#" title="kérdés törlése" onclick="megerosites_x('.$sorszam_kerdes.', \'kerdes\', \''.$kerdoiv_sorszam.'\')" ></a>				<a href="?p=ujkerdes&amp;id='.$sorszam_kerdes.'" title="kérdés módosítása"></a>				<a href="?p=ujkerdes&amp;kerdoiv='.$kerdoiv_sorszam.'&ujkerdes=x&kszam='.$sorszam_kerdes.'" title="új kérdés beszúrása"></a>				</div>';    }    	for ($i=1; $i<=($kerdes_ossz_darab+1);$i++){	   if ($i == $kerdes_darab){		  $sorrend_check = 'selected="selected"';	   } else {		  $sorrend_check = '';	   }	   	   $sorrend_x .= '<option value="'.$i.'" '.$sorrend_check.'>'.$i.'</option>';	}		if ($_REQUEST[mod]){	$kerdes_sorrend = '<select name="kerdes_sorrend_'.$sorszam_kerdes.'" id="kerdes_sorrend_'.$sorszam_kerdes.'" onchange="kerdes_sorrend_ment(this.id)">'			. $sorrend_x			. '</select>';	} else {	   $kerdes_sorrend = $kerdes_darab;	}    $kerdes_blokk .= '<li><div class="survey_block">                        <div class="survey_question"><span>				'.$kerdes_sorrend.'. '.$next_element['kerdes_'.$_SESSION[lang]] .'</span>				'.$szerk_gomb.'			</div>                        <div class="survey_answers">                            '.$kerdes_kep.'                            '.$kerdes_video.'                            '.$valaszok.'                            <br style="clear:both" />                        </div>                    </div></li>';        unset($valaszok); // válaszok törlése}   //kérdés ciklus vége 
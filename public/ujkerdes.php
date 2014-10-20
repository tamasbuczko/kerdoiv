<?php

require_once ('public/jogosultsag_ujkerdes.php');

//válasz törlése
if ($_REQUEST[torles]){
   $sql = "DELETE FROM valaszok WHERE sorszam = $_REQUEST[torles]";
   mysql_query($sql);
   header("Location: ?p=ujkerdes&id=".$_REQUEST[id]);
}

if ($_REQUEST[kerdeskeptorles]){
   $sql = "UPDATE kerdesek SET kep_file='' WHERE sorszam = $_REQUEST[id]";
   mysql_query($sql);
   header("Location: ?p=ujkerdes&id=".$_REQUEST[id]);
}

if ($_REQUEST[valaszkeptorles]){
   $sql = "UPDATE valaszok SET kep_file='' WHERE sorszam = $_REQUEST[valaszkeptorles]";
   mysql_query($sql);
   header("Location: ?p=ujkerdes&id=".$_REQUEST[id]);
}

//kérdés törlése
if ($_REQUEST[kerdestorles]){
   $result = mysql_query("SELECT kerdoiv_sorszam, kerdes_hu, tipus FROM kerdesek WHERE sorszam = '$_REQUEST[id]'");
   $a = mysql_fetch_row($result);
   $kerdoiv_sorszam = $a[0];
	   
   $sql = "DELETE FROM kerdesek WHERE sorszam = $_REQUEST[id]";
   mysql_query($sql);
   
   $sql = "DELETE FROM valaszok WHERE kerdes_valasz = $_REQUEST[id]";
   mysql_query($sql);
   
   header("Location: ?p=kerdoiv&kerdoiv=".$kerdoiv_sorszam."&mod=1");
}

//új kérdés rögzítése
if ($_REQUEST[ujkerdes]){
    $kerdoiv_sorszam = $_REQUEST[kerdoiv];
    
    $result = mysql_query("SELECT MAX(sorszam) FROM kerdesek;");
    $a = mysql_fetch_row($result);
    $ujkerdes_sorszam = $a[0];
    $ujkerdes_sorszam++;
    
   if ($_REQUEST[ujkerdes] == 'x'){
        if ($_REQUEST[kszam]){
            $result = mysql_query("SELECT sorrend FROM kerdesek WHERE sorszam =$_REQUEST[kszam]");
            $a = mysql_fetch_row($result);
            $ujkerdes_sorrend = $a[0];
            
            $result = mysql_query("SELECT sorrend, sorszam FROM kerdesek WHERE kerdoiv_sorszam = '$kerdoiv_sorszam' AND sorrend >= '$ujkerdes_sorrend'");
            while ($row = mysql_fetch_array($result)){ 
                 $uj_sorrend = $row[sorrend];
                 $uj_sorrend++;
                 $sql2 = "UPDATE kerdesek SET sorrend = '$uj_sorrend' WHERE sorszam = $row[sorszam]";
                 mysql_query($sql2);  
            }
            
            
        } else {
            $result = mysql_query("SELECT MAX(sorrend) FROM kerdesek WHERE kerdoiv_sorszam = $kerdoiv_sorszam;");
            $a = mysql_fetch_row($result);
            $ujkerdes_sorrend = $a[0];
            $ujkerdes_sorrend++;
        }
       
       $sql = "INSERT INTO kerdesek (sorszam, kerdoiv_sorszam, kerdes_hu, status, sorrend, tipus)
               VALUES
               ('$ujkerdes_sorszam', '$_REQUEST[kerdoiv]', '', '1', '$ujkerdes_sorrend', 'radio')";
        mysql_query($sql);
        header("Location: ?p=ujkerdes&id=".$ujkerdes_sorszam);
   } 
}

if (($_REQUEST[mentes]) OR ($_REQUEST[pluszvalasz])){
    $kerdes_szoveg_hu = $_REQUEST[kerdes_hu];
    $kerdes_szoveg_en = $_REQUEST[kerdes_en];
    $kerdes_szoveg_de = $_REQUEST[kerdes_de];
    $kerdes_tipus = $_REQUEST[tipus];
	$video_kerdes = $_REQUEST[video_kerdes];
    $kerdes_sorszam = $_REQUEST[id];
	
	If ($_FILES['kerdes_kep']['tmp_name'] != "") {
	  $chars="abcdefhjkmnpqrstuxy345789";
	  for ($i=0;$i<4;$i++){
		  $rand=rand(0,strlen($chars)-1);
		  $f5strx.=$chars[$rand];
	  }

	  $fajlnev_n = $kerdoiv_sorszam.'_'.$f5strx .'.jpg';
	  $konyvtar = 'kerdes_kepek/';

	  move_uploaded_file($_FILES['kerdes_kep']['tmp_name'], $konyvtar.$fajlnev_n);

	  $filenev = $konyvtar.$_FILES['kerdes_kep']['name'];
	  $filename = $_FILES['kerdes_kep']['name'];
	  settype ($filenev, 'string');
	  $uzenet = $_FILES['kerdes_kep']['tmp_name'];
          $sql = "UPDATE kerdesek SET kep_file='$fajlnev_n' WHERE sorszam='$kerdes_sorszam'";
          mysql_query($sql);
	}
	
    $sql = "UPDATE kerdesek SET kerdes_hu='$kerdes_szoveg_hu', kerdes_en='$kerdes_szoveg_en', kerdes_de='$kerdes_szoveg_de', tipus='$kerdes_tipus', video_embed='$video_kerdes' WHERE sorszam='$kerdes_sorszam'";
    mysql_query($sql);
    
    $resultxx = mysql_query("SELECT MAX(sorszam) FROM valaszok ");
    $b = mysql_fetch_row($resultxx);
    $utolsovalaszsorszam = $b[0];
	
	$sql_del = "DELETE FROM helyes_valaszok WHERE kerdes_id = '$kerdes_sorszam'";
	mysql_query($sql_del);
	
    for ($i = 0; $i <= $utolsovalaszsorszam; $i++){
	   
	   $xx = 'valasz_sorrend_c_'.$i;
	   if ($_REQUEST[$xx]){
		 $sql = "UPDATE valaszok SET sorrend = '$_REQUEST[$xx]' WHERE sorszam = $i";
		 mysql_query($sql);
	   }
	   
        $valasz_video = 'valasz_video_'.$i;
		if ($_REQUEST[$valasz_video]){
            $sql = "UPDATE valaszok SET video_embed = '$_REQUEST[$valasz_video]' WHERE sorszam = $i";
            mysql_query($sql);
		}
		
		$szoveg_be_x = 'szoveg_be_'.$i;
		$kep_be_x = 'kep_be_'.$i;
		$video_be_x = 'video_be_'.$i;
		$helyes_valasz_x = 'helyes_valasz_'.$i;
		
		if ($_REQUEST[$szoveg_be_x] == 'on'){
		   $szoveg_be_x = '1';}
		else {
		   $szoveg_be_x = '0';
		}
		
		if ($_REQUEST[$kep_be_x] == 'on'){
		   $kep_be_x = '1';}
		else {
		   $kep_be_x = '0';
		}
		
		if ($_REQUEST[$video_be_x] == 'on'){
		   $video_be_x = '1';}
		else {
		   $video_be_x = '0';
		}
		
		if ($_REQUEST[$helyes_valasz_x] == 'on'){
			$sql_insert = "INSERT INTO helyes_valaszok (kerdes_id, valasz_id) VALUES ('$kerdes_sorszam', '$i')";
			mysql_query($sql_insert);
		}
		
		if ($_REQUEST[$xx]){
		 $sql = "UPDATE valaszok SET kapcs_szoveg = '$szoveg_be_x', kapcs_kep = '$kep_be_x', kapcs_video = '$video_be_x' WHERE sorszam = $i";
		 mysql_query($sql);
		}
		
		$valasz_x_hu = 'valasz_hu_'.$i;
        if (isset($_REQUEST[$valasz_x_hu])){
            $valasz_ertek_hu = $_REQUEST[$valasz_x_hu];
            $sql = "UPDATE valaszok SET valasz_hu = '$valasz_ertek_hu' WHERE sorszam = $i";
            mysql_query($sql);
        }
        
        $valasz_x_en = 'valasz_en_'.$i;
        if (isset($_REQUEST[$valasz_x_en])){
            $valasz_ertek_en = $_REQUEST[$valasz_x_en];
            $sql = "UPDATE valaszok SET valasz_en = '$valasz_ertek_en' WHERE sorszam = $i";
            mysql_query($sql);
        }
        
        $valasz_x_de = 'valasz_de_'.$i;
        if (isset($_REQUEST[$valasz_x_de])){
            $valasz_ertek_de = $_REQUEST[$valasz_x_de];
            $sql = "UPDATE valaszok SET valasz_de = '$valasz_ertek_de' WHERE sorszam = $i";
            mysql_query($sql);
        }
		
        If ($_FILES['valasz_kep_'.$i]['tmp_name'] != "") {

            $chars="abcdefhjkmnpqrstuxy345789";
            for ($c=0;$c<4;$c++){
                $rand=rand(0,strlen($chars)-1);
		$f5strx.=$chars[$rand];
            }

            $fajlnev_n = $f5strx .'.jpg';
            $konyvtar = 'valasz_kepek/';
            move_uploaded_file($_FILES['valasz_kep_'.$i]['tmp_name'], $konyvtar.$fajlnev_n);

            $filenev = $konyvtar.$_FILES['valasz_kep_'.$i]['name'];
            $filename = $_FILES['valasz_kep_'.$i]['name'];
            settype ($filenev, 'string');
            $uzenet = $_FILES['valasz_kep_'.$i]['tmp_name'];

            $sql = "UPDATE valaszok SET kep_file = '$fajlnev_n' WHERE sorszam = $i";
            mysql_query($sql);
	}
			
			
		 }
   
       
      if ($_REQUEST[ujkerdesxxx] == '1'){
        header("Location: ?p=ujkerdes&kerdoiv=$_REQUEST[kerdoiv_sorszam]&ujkerdes=x");
        }           
                 
}

if ($_REQUEST[pluszvalasz]){
    $result = mysql_query("SELECT MAX(sorrend) FROM valaszok WHERE kerdes_valasz = $kerdes_sorszam");
    $x = mysql_fetch_row($result);
    $sorrend_uj = $x[0];
    $sorrend_uj++;
    
   $kerdoiv_sorszam = $_REQUEST[kerdoiv_sorszam];
   $sql = "INSERT INTO valaszok (kerdoiv_sorszam, kerdes_valasz, status, sorrend)
		   VALUES
		   ('$kerdoiv_sorszam', '$kerdes_sorszam', '1', '$sorrend_uj')";
   mysql_query($sql);
   header("Location: ?p=ujkerdes&b=y&id=".$_REQUEST[id]);
}

if ($_REQUEST[id]){
    $result = mysql_query("SELECT kerdoiv_sorszam, kerdes_hu, tipus, kerdes_en, kerdes_de, kep_file, video_embed FROM kerdesek WHERE sorszam = '$_REQUEST[id]'");
    $a = mysql_fetch_row($result);
    $kerdoiv_sorszam = $a[0];
    $kerdes_szoveg_hu = $a[1];
    $kerdes_tipus = $a[2];
    $kerdes_szoveg_en = $a[3];
    $kerdes_szoveg_de = $a[4];
    $kep_file = $a[5];
	$video_kerdes = $a[6];
    $urlap_cim = 'Kérdés módosítása';
    
    $kerdoiv_obj = new kerdoiv;
    $kerdoiv_obj->load($kerdoiv_sorszam);
    
    if ($kep_file){
        $kep_kerdes = '<div class="admin_kep">'
                . '<img src="kerdes_kepek/'.$kep_file.'" alt="" />'
                . '<img src="graphics/icon_del.png" class="icon_del" alt="törlés" onclick="megerosites_x(\''.$_REQUEST[id].'\', \'kerdes_kep\', \'1\')" />'
                . '</div>';
    }
    
    $result2 = mysql_query("SELECT COUNT(kerdes_hu) FROM kerdesek WHERE kerdoiv_sorszam = '$kerdoiv_sorszam'");
    $b = mysql_fetch_row($result2);
    $osszes_kerdes = $b[0];
    
    $result3 = mysql_query("SELECT sorszam FROM kerdesek WHERE kerdoiv_sorszam = '$kerdoiv_sorszam' ORDER BY sorrend");
    $szamlalo = 0;
    while ($next_elementv = mysql_fetch_array($result3)){
        $szamlalo++;
        $kerdesekx[$szamlalo] = $next_elementv[sorszam];
        if ($_REQUEST[id] == $next_elementv[sorszam]){
            $hanyadik_kerdes = $szamlalo;
        }
    }
    $elozo_kerdes = $kerdesekx[$hanyadik_kerdes-1];
    $kovetkezo_kerdes = $kerdesekx[$hanyadik_kerdes+1];
    
    if ($_REQUEST[id] == end($kerdesekx)){$kovetkezo_kerdes = $kerdesekx[1];}
    if ($_REQUEST[id] == $kerdesekx[1]){$elozo_kerdes = end($kerdesekx);}
    
    if ($kerdes_tipus == 'radio') {$check_radio = 'checked="checked"';}
    if ($kerdes_tipus == 'select') {$check_select = 'checked="checked"';}
    if ($kerdes_tipus == 'checkbox') {$check_checkbox = 'checked="checked"';}
    if ($kerdes_tipus == 'text') {$check_text = 'checked="checked"';}
    if ($kerdes_tipus == 'textarea') {$check_textarea = 'checked="checked"';}
    if ($kerdes_tipus == 'ranking') {$check_ranking = 'checked="checked"';}
    
    $result = mysql_query("SELECT hu, en, de FROM kerdoivek WHERE sorszam = '$kerdoiv_sorszam'");
    $b = mysql_fetch_row($result);
    $hu = $b[0];
    $en = $b[1];
    $de = $b[2];
    
    $div_kikapcs = ' style="display: none;"';
    
    $nyelv_db = 0;
    
    if ($hu == '1'){
        $nyelv_db++;
        $control_hu = '<img src="graphics/magyar_zaszlo_20px.png" id="hu" alt="magyar" onclick="nyelv_kapcs(this.id)" />';
    } else {
        $kerdes_hux = $div_kikapcs;
    }
    
    if ($en == '1'){
        $nyelv_db++;
        $control_en = '<img src="graphics/angol_zaszlo_20px.png" id="en" alt="angol" onclick="nyelv_kapcs(this.id)" />';
    } else {
        $kerdes_enx = $div_kikapcs;
    }
    
    if ($de == '1'){
        $nyelv_db++;
        $control_de = '<img src="graphics/nemet_zaszlo_20px.png" id="de" alt="német" onclick="nyelv_kapcs(this.id)" />';
    } else {
        $kerdes_dex = $div_kikapcs;
    }
    
    if ($nyelv_db < 2){
        $control_box_ki = $div_kikapcs;
    }
    
    
    
} else {
    $urlap_cim = 'Új kérdés rögzítése';
}

if ($_REQUEST[id]){
   $resultxx = mysql_query("SELECT sorszam, kerdes_valasz, valasz_hu, valasz_en, valasz_de, kep_file, video_embed FROM valaszok WHERE status = '1' AND kerdes_valasz = '$_REQUEST[id]' ORDER BY sorrend");
   $valasz_osszdarab = mysql_num_rows($resultxx);
   
   $sorrendszam = 0;
   
    $resultx = mysql_query("SELECT v.sorszam, v.kerdes_valasz, v.valasz_hu, v.valasz_en, v.valasz_de, v.kep_file, v.video_embed, v.sorrend, v.kapcs_szoveg, v.kapcs_kep, v.kapcs_video, hv.valasz_id
							  FROM valaszok AS v
							  LEFT JOIN helyes_valaszok AS hv
							  ON v.sorszam = hv.valasz_id
							  WHERE v.status = '1' AND v.kerdes_valasz = '$_REQUEST[id]'
							  ORDER BY v.sorrend");
    while ($next_elementv = mysql_fetch_array($resultx)){
	   $sorrendszam++;
        #$valaszok .= '<input type="text" name="valasz_'.$next_elementv[sorszam].'" value="'.$next_elementv[valasz_hu].'" /><img src="graphics/icon_del.png" class="icon_del" alt="törlés" onclick="megerosites_x('.$next_elementv[sorszam].', \'valasz\', \''.$_REQUEST[id].'\')" />';
	   
	   if ($next_elementv[valasz_id]){
		  $kapcs_helyes = 'checked="checked"';
	   } else {
		  $kapcs_helyes = '';
	   }
	   
	   if ($next_elementv[kapcs_szoveg] == '1'){
		  $kapcs_szoveg = 'checked="checked"';
	   } else {
		  $kapcs_szoveg = '';
	   }
	   
	   if ($next_elementv[kapcs_kep] == '1'){
		  $kapcs_kep = 'checked="checked"';
	   } else {
		  $kapcs_kep = '';
	   }
	   
	   if ($next_elementv[kapcs_video] == '1'){
		  $kapcs_video = 'checked="checked"';
	   } else {
		  $kapcs_video = '';
	   }
       
	   $valaszok2_szoveg .= '<div class="valasz_tipus_kapcs"><label>Szöveg megjelenítése a válaszhoz</label><input type="checkbox" name="szoveg_be_'.$next_elementv[sorszam].'" '.$kapcs_szoveg.'/></div>';
	   
        if ($en == 1){
            $valaszok2_szoveg .= '<input type="text" name="valasz_en_'.$next_elementv[sorszam].'" id="valasz_en_'.$next_elementv[sorszam].'" value="'.$next_elementv[valasz_en].'" class="en_k" />';
        }
        if ($de == 1){
            $valaszok2_szoveg .= '<input type="text" name="valasz_de_'.$next_elementv[sorszam].'" id="valasz_de_'.$next_elementv[sorszam].'" value="'.$next_elementv[valasz_de].'" class="de_k" />';
        }
        if ($hu == 1){
            $valaszok2_szoveg .= '<input type="text" name="valasz_hu_'.$next_elementv[sorszam].'" id="valasz_hu_'.$next_elementv[sorszam].'" value="'.$next_elementv[valasz_hu].'" class="hu_k" />';
        }
		
		if ($next_elementv[video_embed]){
		   
		   if ($next_elementv[video_embed]){
			   if (strpos($next_elementv[video_embed], 'youtube')){
				  $video_link = explode('=', $next_elementv[video_embed]);
				  $valasz_video_x = '<iframe style="float: left; margin: -24px 0px 20px 10px;" width="156" height="88" src="//www.youtube.com/embed/'.$video_link[1].'" frameborder="0" allowfullscreen></iframe><br stlye="clear:both;">';
			   }
			   if (strpos($next_elementv[video_embed], 'vimeo')){
				  $video_link = explode('/', $next_elementv[video_embed]);
				  $valasz_video_x = '<iframe src="//player.vimeo.com/video/'.end($video_link).'" style="float: left; margin: -24px 0px 20px 10px;" width="156" height="88" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><br stlye="clear:both;">';
			   }

			} else {
				unset($valasz_video_x);   
			}
		   
		}
		
		$valaszok2_video .= '<div class="valasz_tipus_kapcs"><label>Videó megjelenítése a válaszhoz</label><input type="checkbox" name="video_be_'.$next_elementv[sorszam].'" '.$kapcs_video.'/></div>'
				. $valasz_video_x
				. '<input type="text" name="valasz_video_'.$next_elementv[sorszam].'" value="'.$next_elementv[video_embed].'" style="width: 340px; float: right;" title="video link" class="video_embed" />';
		
		unset($kep);
		if ($next_elementv[kep_file]){
		   $kep = '<div class="admin_valaszkep">'
				   . '<img src="valasz_kepek/'.$next_elementv[kep_file].'" alt="" />'
				 . '</div>';
		}
		
        $valaszok2_kep .= ''
				. ''
				. $kep
				. '<div style="width: 300px; float: right;">'
				. '<div class="valasz_tipus_kapcs"><label>Kép megjelenítése a válaszhoz</label><input type="checkbox" name="kep_be_'.$next_elementv[sorszam].'" '.$kapcs_kep.'/></div>'
				. '<input name="valasz_kep_'.$next_elementv[sorszam].'" type="file" title="kép feltöltése a válaszhoz" size="30" accept="image/*" class="valasz_keptolt" onchange="kepfigyel(\'valasz_kep_uzenet_'.$next_elementv[sorszam].'\')" /><br style="clear: both;" />'
				. '<div class="valasz_tipus_kapcs">'
                                . '<div class="mentes_uzenet" style="margin-left: 60px;" id="valasz_kep_uzenet_'.$next_elementv[sorszam].'">A kép feltöltéséhez mentés szükséges!</div>'
				. '<label>Kép törlése</label>'
				. '<img src="graphics/icon_del.png" class="icon_del" alt="a kép törlése" title="a kép törlése" onclick="megerosites_x('.$next_elementv[sorszam].', \'valasz_kep\', \''.$_REQUEST[id].'\')" />'
				. '</div>'
				. '</div>';
		unset($options);
		unset($valasz_jel);
		for ($i = 1; $i<= $valasz_osszdarab; $i++){
		   if ($i == $next_elementv[sorrend]){
			  $valasz_jel = ' selected="selected"';
		   } else {
			  unset($valasz_jel);
		   }
		   $options .= '<option value="'.$i.'"'.$valasz_jel.'>'.$i.'</option>';
		}
		
                if ($kerdoiv_obj->authority != '1'){
                    $kep_kapcs = ' onclick="valasz_ful(\'k\', '.$next_elementv[sorszam].');"';
                } else {
                    $kep_kapcs = ' onmouseover="sugo(\'8\', this.id)"';
                }
				
		if ($kerdoiv_obj->teszt == '1'){
		   $helyes_valasz_ful = '<div class="a_v_fulek" style="width: 30px !important; margin-left: 14px !important; margin-right: -48px !important;">'
                                        . '<input type="checkbox" name="helyes_valasz_'.$next_elementv[sorszam].'" '.$kapcs_helyes.'class="icon_del" style="position: relative; float: right; width: 16px; margin: 4px 6px 0 0; z-index: 10;" />'
                                  . '</div>';
		} else {
		   $helyes_valasz_ful = '';
		}
                
		$valaszok2 .= ''
				. '<div class="valasz_blokk">'
				  . '<div class="a_v_fulek" style="width: 40px !important;">'
                                        . '<select name="valasz_sorrend_c_'.$next_elementv[sorszam].'">'
                                        . $options
                                        . '</select>'
				  . '</div>'
				  . '<div id="a_vf_sz_'.$next_elementv[sorszam].'" class="a_v_fulek" onclick="valasz_ful(\'sz\', '.$next_elementv[sorszam].');">'
                                        . 'Szöveg'
                                  . '</div>'
				  . '<div id="a_vf_k_'.$next_elementv[sorszam].'" class="a_v_fulek"'.$kep_kapcs.'>'
                                        . 'Kép'
                                  . '</div>'
				  . '<div id="a_vf_v_'.$next_elementv[sorszam].'" class="a_v_fulek" onclick="valasz_ful(\'v\', '.$next_elementv[sorszam].');">'
                                        . 'Videó'
                                  . '</div>'
				  . $helyes_valasz_ful. '<div class="a_v_fulek" style="width: 30px !important; margin-left: 120px !important;">'
                                        . '<img src="graphics/icon_del.png" class="icon_del" style="position: relative; float: right; width: 16px; margin: 2px 6px 0 0; z-index: 10;" alt="a válasz törlése" title="a válasz törlése" onclick="megerosites_x('.$next_elementv[sorszam].', \'valasz\', \''.$_REQUEST[id].'\')" />'
                                  . '</div>'
                                  . ''
				  . '<div id="a_vl_sz_'.$next_elementv[sorszam].'" class="a_v_lapok" style="display: block;">'
				  . ''.$valaszok2_szoveg.''
				  . '</div>'
				  . '<div id="a_vl_v_'.$next_elementv[sorszam].'" class="a_v_lapok">'
				  . ''.$valaszok2_video.''
				  . '</div>'
				  . '<div id="a_vl_k_'.$next_elementv[sorszam].'" class="a_v_lapok">'
				  . ''.$valaszok2_kep.''
				  . '</div><br style="clear:both;"/>'
				. '</div><br style="clear:both;"/>';
		unset($valaszok2_kep);
		unset($valaszok2_szoveg);
		unset($valaszok2_video);
    }
}

$smarty->assign('szotar', $szotar);
$smarty->assign('kerdoiv_obj', $kerdoiv_obj);
$smarty->assign('kerdoiv_sorszam', $kerdoiv_sorszam);
$smarty->assign('urlap_cim', $urlap_cim);
$smarty->assign('valaszok', $valaszok);
$smarty->assign('valaszok2', $valaszok2);
$smarty->assign('check_radio', $check_radio);
$smarty->assign('check_select', $check_select);
$smarty->assign('check_checkbox', $check_checkbox);
$smarty->assign('check_text', $check_text);
$smarty->assign('check_textarea', $check_textarea);
$smarty->assign('check_ranking', $check_ranking);
$smarty->assign('id', $_REQUEST[id]);
$smarty->assign('kerdes_hux', $kerdes_hux);
$smarty->assign('kerdes_enx', $kerdes_enx);
$smarty->assign('kerdes_dex', $kerdes_dex);
$smarty->assign('kerdes_szoveg_hu', $kerdes_szoveg_hu);
$smarty->assign('kerdes_szoveg_en', $kerdes_szoveg_en);
$smarty->assign('kerdes_szoveg_de', $kerdes_szoveg_de);
$smarty->assign('control_hu', $control_hu);
$smarty->assign('control_en', $control_en);
$smarty->assign('control_de', $control_de);
$smarty->assign('osszes_kerdes', $osszes_kerdes);
$smarty->assign('hanyadik_kerdes', $hanyadik_kerdes);
$smarty->assign('elozo_kerdes', $elozo_kerdes);
$smarty->assign('kep_kerdes', $kep_kerdes);
$smarty->assign('video_kerdes', $video_kerdes);
$smarty->assign('kovetkezo_kerdes', $kovetkezo_kerdes);
$smarty->assign('control_box_ki', $control_box_ki);
$smarty->assign('check_checkbox', $check_checkbox);
$smarty->assign('lang', $lang);

if ($jogosult){
   $tartalom = $smarty->fetch('templates/ujkerdes.tpl');
} else {
   $tartalom = $smarty->fetch('templates/nem_jogosult.tpl');
}

//$oldal = new html_blokk;
//$oldal->load_template_file("templates/ujkerdes.html",$array);
//$tartalom = $oldal->html_code;
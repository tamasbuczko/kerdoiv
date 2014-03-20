<?php

//válasz törlése
if ($_REQUEST[torles]){
   $sql = "DELETE FROM valaszok WHERE sorszam = $_REQUEST[torles]";
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
       $result = mysql_query("SELECT MAX(sorrend) FROM kerdesek;");
        $a = mysql_fetch_row($result);
        $ujkerdes_sorrend = $a[0];
        $ujkerdes_sorrend++;
       
       $sql = "INSERT INTO kerdesek (sorszam, kerdoiv_sorszam, kerdes_hu, status, sorrend, tipus)
               VALUES
               ('$ujkerdes_sorszam', '$kerdoiv_sorszam', 'Új kérdés', '1', '$ujkerdes_sorrend', 'radio')";
        mysql_query($sql);
        header("Location: ?p=ujkerdes&id=".$ujkerdes_sorszam);
   } else {

        $result = mysql_query("SELECT sorrend FROM kerdesek WHERE sorszam =$_REQUEST[ujkerdes]");
        $a = mysql_fetch_row($result);
        $uj_sorrend = $a[0]-1;


        
        $sql = "INSERT INTO kerdesek (sorszam, kerdoiv_sorszam, kerdes_hu, status, sorrend)
                        VALUES
                        ('$ujkerdes_sorszam', '$kerdoiv_sorszam', 'Új kérdés', '1', '$uj_sorrend')";
        mysql_query($sql);
        header("Location: ?p=ujkerdes&id=".$ujkerdes_sorszam);
   }
}

if (($_REQUEST[mentes]) OR ($_REQUEST[pluszvalasz])){
    $kerdes_szoveg_hu = $_REQUEST[kerdes_hu];
    $kerdes_szoveg_en = $_REQUEST[kerdes_en];
    $kerdes_szoveg_de = $_REQUEST[kerdes_de];
    $kerdes_tipus = $_REQUEST[tipus];
    $kerdes_sorszam = $_REQUEST[id];
    $sql = "UPDATE kerdesek SET kerdes_hu='$kerdes_szoveg_hu', kerdes_en='$kerdes_szoveg_en', kerdes_de='$kerdes_szoveg_de', tipus='$kerdes_tipus' WHERE sorszam='$kerdes_sorszam'";
    mysql_query($sql);
    
    $resultxx = mysql_query("SELECT MAX(sorszam) FROM valaszok ");
    $b = mysql_fetch_row($resultxx);
    $utolsovalaszsorszam = $b[0];
    for ($i = 0; $i <= $utolsovalaszsorszam; $i++){
        $valasz_x_hu = 'valasz_hu_'.$i;
        if ($_REQUEST[$valasz_x_hu]){
            $valasz_ertek_hu = $_REQUEST[$valasz_x_hu];
            $sql = "UPDATE valaszok SET valasz_hu = '$valasz_ertek_hu' WHERE sorszam = $i";
            mysql_query($sql);
        }
        
        $valasz_x_en = 'valasz_en_'.$i;
        if ($_REQUEST[$valasz_x_en]){
            $valasz_ertek_en = $_REQUEST[$valasz_x_en];
            $sql = "UPDATE valaszok SET valasz_en = '$valasz_ertek_en' WHERE sorszam = $i";
            mysql_query($sql);
        }
        
        $valasz_x_de = 'valasz_de_'.$i;
        if ($_REQUEST[$valasz_x_de]){
            $valasz_ertek_de = $_REQUEST[$valasz_x_de];
            $sql = "UPDATE valaszok SET valasz_de = '$valasz_ertek_de' WHERE sorszam = $i";
            mysql_query($sql);
        }
    }
    
}

if ($_REQUEST[pluszvalasz]){
   $kerdoiv_sorszam = $_REQUEST[kerdoiv_sorszam];
   $sql = "INSERT INTO valaszok (kerdoiv_sorszam, kerdes_valasz, status, sorrend)
		   VALUES
		   ('$kerdoiv_sorszam', '$kerdes_sorszam', '1', '$utolsovalaszsorszam')";
   mysql_query($sql);
   header("Location: ?p=ujkerdes&id=".$_REQUEST[id]);
}

if ($_REQUEST[id]){
    $result = mysql_query("SELECT kerdoiv_sorszam, kerdes_hu, tipus, kerdes_en, kerdes_de FROM kerdesek WHERE sorszam = '$_REQUEST[id]'");
    $a = mysql_fetch_row($result);
    $kerdoiv_sorszam = $a[0];
    $kerdes_szoveg_hu = $a[1];
    $kerdes_tipus = $a[2];
    $kerdes_szoveg_en = $a[3];
    $kerdes_szoveg_de = $a[4];
    $urlap_cim = 'Kérdés módosítása';
    
    $result2 = mysql_query("SELECT COUNT(kerdes_hu) FROM kerdesek WHERE kerdoiv_sorszam = '$kerdoiv_sorszam'");
    $b = mysql_fetch_row($result2);
    $osszes_kerdes = $b[0];
    
    $result3 = mysql_query("SELECT sorszam FROM kerdesek WHERE kerdoiv_sorszam = '$kerdoiv_sorszam' ORDER BY sorrend");
    $szamlalo = 0;
    while ($next_elementv = mysql_fetch_array($result3)){
        $szamlalo++;
        $valaszokx[$szamlalo] = $next_elementv[sorszam];
        if ($_REQUEST[id] == $next_elementv[sorszam]){
            $hanyadik_kerdes = $szamlalo;
        }
    }
    $elozo_kerdes = $valaszokx[$hanyadik_kerdes-1];
    $kovetkezo_kerdes = $valaszokx[$hanyadik_kerdes+1];
    
    if ($_REQUEST[id] == end($valaszokx)){$kovetkezo_kerdes = $valaszokx[1];}
    if ($_REQUEST[id] == $valaszokx[1]){$elozo_kerdes = end($valaszokx);}
    
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
        $control_hu = '<img src="graphics/magyar_zaszlo_k.png" id="hu" alt="magyar" onclick="nyelv_kapcs(this.id)" />';
    } else {
        $kerdes_hux = $div_kikapcs;
    }
    
    if ($en == '1'){
        $nyelv_db++;
        $control_en = '<img src="graphics/angol_zaszlo_k.png" id="en" alt="angol" onclick="nyelv_kapcs(this.id)" />';
    } else {
        $kerdes_enx = $div_kikapcs;
    }
    
    if ($de == '1'){
        $nyelv_db++;
        $control_de = '<img src="graphics/nemet_zaszlo_k.png" id="de" alt="német" onclick="nyelv_kapcs(this.id)" />';
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
    $resultx = mysql_query("SELECT sorszam, kerdes_valasz, valasz_hu, valasz_en, valasz_de FROM valaszok WHERE status = '1' AND kerdes_valasz = '$_REQUEST[id]' ORDER BY sorrend");
    while ($next_elementv = mysql_fetch_array($resultx)){
        #$valaszok .= '<input type="text" name="valasz_'.$next_elementv[sorszam].'" value="'.$next_elementv[valasz_hu].'" /><img src="graphics/icon_del.png" class="icon_del" alt="törlés" onclick="megerosites_x('.$next_elementv[sorszam].', \'valasz\', \''.$_REQUEST[id].'\')" />';
	$valaszok2 .= '<li name="v" value="1" data-row="1" data-col="1" data-sizex="50" data-sizey="6">';
        if ($hu == 1){
            $valaszok2 .= '<input type="text" name="valasz_hu_'.$next_elementv[sorszam].'" id="valasz_hu_'.$next_elementv[sorszam].'" value="'.$next_elementv[valasz_hu].'" class="hu_k" />';
        }
        if ($en == 1){
            $valaszok2 .= '<input type="text" name="valasz_en_'.$next_elementv[sorszam].'" id="valasz_en_'.$next_elementv[sorszam].'" value="'.$next_elementv[valasz_en].'" class="en_k" />';
        }
        if ($de == 1){
            $valaszok2 .= '<input type="text" name="valasz_de_'.$next_elementv[sorszam].'" id="valasz_de_'.$next_elementv[sorszam].'" value="'.$next_elementv[valasz_de].'" class="de_k" />';
        }
        $valaszok2 .= '<img src="graphics/icon_del.png" class="icon_del" alt="törlés" onclick="megerosites_x('.$next_elementv[sorszam].', \'valasz\', \''.$_REQUEST[id].'\')" />'
                . '</li>';
    }
}

$array = array( 'kerdoiv_sorszam'       => $kerdoiv_sorszam,
                'urlap_cim'   => $urlap_cim,
                'valaszok'   => $valaszok,
		'valaszok2'   => $valaszok2,
                'check_radio'   => $check_radio,
                'check_select'   => $check_select,
                'check_checkbox'   => $check_checkbox,
                'check_text'   => $check_text,
                'check_textarea'   => $check_textarea,
                'check_ranking'   => $check_ranking,
                'id'   => $_REQUEST[id],
                'kerdes_hux' => $kerdes_hux,
                'kerdes_enx' => $kerdes_enx,
                'kerdes_dex' => $kerdes_dex,
                'kerdes_szoveg_hu' => $kerdes_szoveg_hu,
                'kerdes_szoveg_en' => $kerdes_szoveg_en,
                'kerdes_szoveg_de' => $kerdes_szoveg_de,
                'control_hu'       => $control_hu,
                'control_en'       => $control_en,
                'control_de'       => $control_de,
                'osszes_kerdes'       => $osszes_kerdes,
                'hanyadik_kerdes'       => $hanyadik_kerdes,
                'elozo_kerdes'       => $elozo_kerdes,
                'kovetkezo_kerdes'       => $kovetkezo_kerdes,
                'control_box_ki'       => $control_box_ki);

$oldal = new html_blokk;
$oldal->load_template_file("templates/ujkerdes.html",$array);
$tartalom = $oldal->html_code;

?>
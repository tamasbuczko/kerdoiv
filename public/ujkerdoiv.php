<?php

if ($_REQUEST[mentes]){
    
        if ($_REQUEST[check_hu] == 'on'){
            $check_hu = 1;}
        else {
            $check_hu = 0;
        }
        
        if ($_REQUEST[check_en] == 'on'){
            $check_en = 1;}
        else {
            $check_en = 0;
        }
        
        if ($_REQUEST[check_de] == 'on'){
            $check_de = 1;}
        else {
            $check_de = 0;
        }
    
    if (!$_REQUEST[sorszam]){
        $result = mysql_query("SELECT MAX(sorszam) FROM kerdoivek");
        $a = mysql_fetch_row($result);
        $max_kerdoiv_sorszam = $a[0];
        $max_kerdoiv_sorszam++;

        $sql = "INSERT INTO kerdoivek (sorszam, cim_hu, leiras_hu, status, user_id, hu, en, de, cim_en, leiras_en, cim_de, leiras_de)
                VALUES
                ('$max_kerdoiv_sorszam', '$_REQUEST[cim_hu]', '$_REQUEST[leiras_hu]', '1', '$_SESSION[qa_user_id]', '$check_hu', '$check_en', '$check_de', '$_REQUEST[cim_en]', '$_REQUEST[leiras_en]', '$_REQUEST[cim_de]', '$_REQUEST[leiras_de]')";
        mysql_query($sql);

        $sql = "INSERT INTO kerdesek (kerdoiv_sorszam, kerdes_hu, status, sorrend)
                       VALUES
                       ('$max_kerdoiv_sorszam', 'Új kérdés', '1', '')";
       mysql_query($sql);

        header("Location: ?p=kerdoiv&mod=1&kerdoiv=".$max_kerdoiv_sorszam);
    } else {
        
        $cim_hu = $_REQUEST[cim_hu];
        $leiras_hu = $_REQUEST[leiras_hu];
        $cim_en = $_REQUEST[cim_en];
        $leiras_en = $_REQUEST[leiras_en];
        $cim_de = $_REQUEST[cim_de];
        $leiras_de = $_REQUEST[leiras_de];
        
        $sql = "UPDATE kerdoivek SET cim_hu='$cim_hu', leiras_hu='$leiras_hu',
                cim_en='$cim_en', leiras_en='$leiras_en',
                cim_de='$cim_de', leiras_de='$leiras_de',
                hu='$check_hu', en='$check_en', de='$check_de' WHERE sorszam='$_REQUEST[sorszam]'";
        mysql_query($sql);

    }
}

if ($_REQUEST[id]){
    $result = mysql_query("SELECT cim_hu, leiras_hu, hu, en, de, cim_en, leiras_en, cim_de, leiras_de FROM kerdoivek WHERE sorszam = '$_REQUEST[id]'");
    $a = mysql_fetch_row($result);
    $kerdoiv_sorszam = $_REQUEST[id];
    $cim_hu = $a[0];
    $leiras_hu = $a[1];
    $cim_en = $a[5];
    $leiras_en = $a[6];
    $cim_de = $a[7];
    $leiras_de = $a[8];
    $hu = $a[2];
    $en = $a[3];
    $de = $a[4];
    $div_kikapcs = 'style="display: none;"';
    $nyelv_db = 0;
    if ($hu == '1'){
        $nyelv_db++;
        $checked_hu = 'checked="checked"';
        $control_hu = '<img src="graphics/magyar_zaszlo_k.png" id="hu" alt="magyar" onclick="nyelv_kapcs(this.id)" />';
    } else {
        $cim_hux = $div_kikapcs;
        $leiras_hux = $div_kikapcs;
    }
    if ($en == '1'){
        $nyelv_db++;
        $checked_en = 'checked="checked"';
        $control_en = '<img src="graphics/angol_zaszlo_k.png" id="en" alt="angol" onclick="nyelv_kapcs(this.id)" />';
    } else {
        $cim_enx = $div_kikapcs;
        $leiras_enx = $div_kikapcs;
    }
    if ($de == '1'){
        $nyelv_db++;
        $checked_de = 'checked="checked"';
        $control_de = '<img src="graphics/nemet_zaszlo_k.png" id="de" alt="német" onclick="nyelv_kapcs(this.id)" />';
    } else {
        $cim_dex = $div_kikapcs;
        $leiras_dex = $div_kikapcs;
    }
    
    if ($nyelv_db < 2){
        $control_box_ki = $div_kikapcs;
    }
    
    $urlap_cim = 'Kérdőív módosítása';
} else {
    $urlap_cim = 'Új kérdőív rögzítése';
}

$array = array( 'tartalom'       => $tartalom,
                'urlap_cim'       => $urlap_cim,
                'cim_hu'       => $cim_hu,
                'leiras_hu'       => $leiras_hu,
                'cim_en'       => $cim_en,
                'leiras_en'       => $leiras_en,
                'cim_de'       => $cim_de,
                'leiras_de'       => $leiras_de,
                'id'       => $_REQUEST[id],
                'checked_hu'       => $checked_hu,
                'checked_en'       => $checked_en,
                'checked_de'       => $checked_de,
                'cim_hux'       => $cim_hux,
                'cim_enx'       => $cim_enx,
                'cim_dex'       => $cim_dex,
                'leiras_hux'       => $leiras_hux,
                'leiras_enx'       => $leiras_enx,
                'leiras_dex'       => $leiras_dex,
                'control_hu'       => $control_hu,
                'control_en'       => $control_en,
                'control_de'       => $control_de,
                'control_box_ki'       => $control_box_ki,
                'figy_uzenet'   => $figy_uzenet);

$oldal = new html_blokk;
$oldal->load_template_file("templates/ujkerdoiv.html",$array);
$tartalom = $oldal->html_code;

?>
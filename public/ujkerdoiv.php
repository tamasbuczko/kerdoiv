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
        
        if ($_REQUEST[nyilvanos] == 'on'){
            $check_nyilvanos = 1;}
        else {
            $check_nyilvanos = 0;
        }
    
    if (!$_REQUEST[sorszam]){
        $result = mysql_query("SELECT MAX(sorszam) FROM kerdoivek");
        $a = mysql_fetch_row($result);
        $max_kerdoiv_sorszam = $a[0];
        $max_kerdoiv_sorszam++;

        $sql = "INSERT INTO kerdoivek (sorszam, cim_hu, leiras_hu, status, user_id, hu, en, de, cim_en, leiras_en, cim_de, leiras_de, zaras_hu, zaras_en, zaras_de, nyilvanos)
                VALUES
                ('$max_kerdoiv_sorszam', '$_REQUEST[cim_hu]', '$_REQUEST[leiras_hu]', '1', '$_SESSION[qa_user_id]', '$check_hu', '$check_en', '$check_de', '$_REQUEST[cim_en]', '$_REQUEST[leiras_en]', '$_REQUEST[cim_de]', '$_REQUEST[leiras_de]', '$_REQUEST[zaras_hu]','$_REQUEST[zaras_en]','$_REQUEST[zaras_de]', '$check_nyilvanos')";
        mysql_query($sql);

        $sql = "INSERT INTO kerdesek (kerdoiv_sorszam, kerdes_hu, status, sorrend)
                       VALUES
                       ('$max_kerdoiv_sorszam', 'Új kérdés', '1', '')";
       mysql_query($sql);

        header("Location: ?p=kerdoiv&mod=1&kerdoiv=".$max_kerdoiv_sorszam);
    } else {
        
        $cim_hu = $_REQUEST[cim_hu];
        $leiras_hu = $_REQUEST[leiras_hu];
        $zaras_hu = $_REQUEST[zaras_hu];
        $cim_en = $_REQUEST[cim_en];
        $leiras_en = $_REQUEST[leiras_en];
        $zaras_en = $_REQUEST[zaras_en];
        $cim_de = $_REQUEST[cim_de];
        $leiras_de = $_REQUEST[leiras_de];
        $zaras_de = $_REQUEST[zaras_de];
                        
		$aktivalas = $_REQUEST[aktivalas_datum];
		$lejarat = $_REQUEST[lejarat_datum];
        
        $sql = "UPDATE kerdoivek SET cim_hu='$cim_hu', leiras_hu='$leiras_hu', zaras_hu='$zaras_hu',
                cim_en='$cim_en', leiras_en='$leiras_en', zaras_en='$zaras_en',
                cim_de='$cim_de', leiras_de='$leiras_de', zaras_de='$zaras_de',
                hu='$check_hu', en='$check_en', de='$check_de',
                nyilvanos='$check_nyilvanos', aktivalas='$aktivalas', lejarat='$lejarat' WHERE sorszam='$_REQUEST[sorszam]'";
        mysql_query($sql);

    }
}

$div_kikapcs = 'style="display: none;"';

if ($_REQUEST[id]){
    $result = mysql_query("SELECT cim_hu, leiras_hu, hu, en, de, cim_en, leiras_en, cim_de, leiras_de, nyilvanos, aktivalas, lejarat, zaras_hu, zaras_en, zaras_de FROM kerdoivek WHERE sorszam = '$_REQUEST[id]'");
    $a = mysql_fetch_row($result);
    $kerdoiv_sorszam = $_REQUEST[id];
    $cim_hu = $a[0];
    $leiras_hu = $a[1];
    $cim_en = $a[5];
    $leiras_en = $a[6];
    $cim_de = $a[7];
    $leiras_de = $a[8];
    $nyilvanos = $a[9];
    $aktivalas = $a[10];
    $lejarat = $a[11];
    $zaras_hu = $a[12];
    $zaras_en = $a[13];
    $zaras_de = $a[14];
    $hu = $a[2];
    $en = $a[3];
    $de = $a[4];
    $nyelv_db = 0;
    if ($hu == '1'){
        $nyelv_db++;
        $checked_hu = 'checked="checked"';
        
    } else {
        $cim_hux = $div_kikapcs;
        $leiras_hux = $div_kikapcs;
        $zaras_hux = $div_kikapcs;
        $control_hu = 'style="display: none; opacity: 0.5;"';
    }
    if ($en == '1'){
        $nyelv_db++;
        $checked_en = 'checked="checked"';
        
    } else {
        $cim_enx = $div_kikapcs;
        $leiras_enx = $div_kikapcs;
        $zaras_enx = $div_kikapcs;
        $control_en = 'style="display: none; opacity: 0.5;"';
    }
    if ($de == '1'){
        $nyelv_db++;
        $checked_de = 'checked="checked"';
        
    } else {
        $cim_dex = $div_kikapcs;
        $leiras_dex = $div_kikapcs;
        $zaras_dex = $div_kikapcs;
        $control_de = 'style="display: none; opacity: 0.5;"';
    }
    
    if ($nyilvanos == '1'){
        $checked_nyilvanos = 'checked="checked"';
    }
    
        $control_box_ki = $div_kikapcs;
    
    
    $urlap_cim = 'Kérdőív módosítása';
} else {
    if ($_SESSION[lang] == 'hu'){
        $urlap_cim = 'Új kérdőív rögzítése';
        $control_box_ki = $div_kikapcs;
        $cim_enx = $div_kikapcs;
        $cim_dex = $div_kikapcs;
        $leiras_enx = $div_kikapcs;
        $leiras_dex = $div_kikapcs;
        $zaras_enx =  $div_kikapcs;
        $zaras_dex =  $div_kikapcs;
        $checked_hu = 'checked="checked"';
        $cim_hu = 'Az új kérdőív címe';
        #$cim_hu = $lang[az_uj_kerdoiv_cime];
        $leiras_hu = 'Az új kérdőív rövid leírása';
        $zaras_hu = 'A kérdőív záró szövege';
        $control_en = 'style="opacity: 0.5;"';
        $control_de = 'style="opacity: 0.5;"';
    }
    if ($_SESSION[lang] == 'en'){
        $urlap_cim = 'Új kérdőív rögzítése';
        $control_box_ki = $div_kikapcs;
        $cim_hux = $div_kikapcs;
        $cim_dex = $div_kikapcs;
        $leiras_hux = $div_kikapcs;
        $leiras_dex = $div_kikapcs;
        $zaras_hux =  $div_kikapcs;
        $zaras_dex =  $div_kikapcs;
        $checked_en = 'checked="checked"';
        $cim_en = 'Az új kérdőív címe';
        $leiras_en = 'Az új kérdőív rövid leírása';
        $zaras_en = 'A kérdőív záró szövege';
        $control_hu = 'style="opacity: 0.5;"';
        $control_de = 'style="opacity: 0.5;"';
    }
    if ($_SESSION[lang] == 'de'){
        $urlap_cim = 'Új kérdőív rögzítése';
        $control_box_ki = $div_kikapcs;
        $cim_hux = $div_kikapcs;
        $cim_enx = $div_kikapcs;
        $leiras_hux = $div_kikapcs;
        $leiras_enx = $div_kikapcs;
        $zaras_hux =  $div_kikapcs;
        $zaras_enx =  $div_kikapcs;
        $checked_de = 'checked="checked"';
        $cim_de = 'Az új kérdőív címe';
        $leiras_de = 'Az új kérdőív rövid leírása';
        $zaras_de = 'A kérdőív záró szövege';
        $control_hu = 'style="opacity: 0.5;"';
        $control_en = 'style="opacity: 0.5;"';
    }
}

$array = array( 'tartalom'       => $tartalom,
                'urlap_cim'       => $urlap_cim,
                'cim_hu'       => $cim_hu,
                'leiras_hu'       => $leiras_hu,
                'zaras_hu'       => $zaras_hu,
                'cim_en'       => $cim_en,
                'leiras_en'       => $leiras_en,
                'zaras_en'       => $zaras_en,
                'cim_de'       => $cim_de,
                'leiras_de'       => $leiras_de,
                'zaras_de'       => $zaras_de,
                'id'       => $_REQUEST[id],
                'checked_hu'       => $checked_hu,
                'checked_en'       => $checked_en,
                'checked_de'       => $checked_de,
                'checked_nyilvanos' => $checked_nyilvanos,
                'cim_hux'       => $cim_hux,
                'cim_enx'       => $cim_enx,
                'cim_dex'       => $cim_dex,
                'leiras_hux'       => $leiras_hux,
                'leiras_enx'       => $leiras_enx,
                'leiras_dex'       => $leiras_dex,
                'zaras_hux'       => $zaras_hux,
                'zaras_enx'       => $zaras_enx,
                'zaras_dex'       => $zaras_dex,
                'control_hu'       => $control_hu,
                'control_en'       => $control_en,
                'control_de'       => $control_de,
		'aktivalas'       => $aktivalas,
		'lejarat'       => $lejarat,
                'control_box_ki'       => $control_box_ki,
                'figy_uzenet'   => $figy_uzenet);

$oldal = new html_blokk;
$oldal->load_template_file("templates/ujkerdoiv.html",$array);
$tartalom = $oldal->html_code;

?>
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

        $sql = "INSERT INTO kerdoivek (sorszam, cim_hu, leiras_hu, status, user_id, hu, en, de)
                VALUES
                ('$max_kerdoiv_sorszam', '$_REQUEST[cim]', '$_REQUEST[leiras]', '1', '$_SESSION[qa_user_id]', '$check_hu', '$check_en', '$check_de')";
        mysql_query($sql);

        $sql = "INSERT INTO kerdesek (kerdoiv_sorszam, kerdes_hu, status, sorrend)
                       VALUES
                       ('$max_kerdoiv_sorszam', 'Új kérdés', '1', '')";
       mysql_query($sql);

        header("Location: ?p=kerdoiv&mod=1&kerdoiv=".$max_kerdoiv_sorszam);
    } else {
        
        $cim = $_REQUEST[cim];
        $leiras = $_REQUEST[leiras];
        $sql = "UPDATE kerdoivek SET cim_hu='$cim', leiras_hu='$leiras', hu='$check_hu', en='$check_en', de='$check_de' WHERE sorszam='$_REQUEST[sorszam]'";
        mysql_query($sql);

    }
}

if ($_REQUEST[id]){
    $result = mysql_query("SELECT cim_hu, leiras_hu, hu, en, de FROM kerdoivek WHERE sorszam = '$_REQUEST[id]'");
    $a = mysql_fetch_row($result);
    $kerdoiv_sorszam = $_REQUEST[id];
    $cim = $a[0];
    $leiras = $a[1];
    $hu = $a[2];
    $en = $a[3];
    $de = $a[4];
    if ($hu == '1'){$checked_hu = 'checked="checked"';}
    if ($en == '1'){$checked_en = 'checked="checked"';}
    if ($de == '1'){$checked_de = 'checked="checked"';}
    $urlap_cim = 'Kérdőív módosítása';
} else {
    $urlap_cim = 'Új kérdőív rögzítése';
}

$array = array( 'tartalom'       => $tartalom,
                'urlap_cim'       => $urlap_cim,
                'cim'       => $cim,
                'leiras'       => $leiras,
                'id'       => $_REQUEST[id],
                'checked_hu'       => $checked_hu,
                'checked_en'       => $checked_en,
                'checked_de'       => $checked_de,
                'figy_uzenet'   => $figy_uzenet);

$oldal = new html_blokk;
$oldal->load_template_file("templates/ujkerdoiv.html",$array);
$tartalom = $oldal->html_code;

?>
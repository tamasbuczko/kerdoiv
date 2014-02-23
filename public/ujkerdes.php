<?php

if ($_REQUEST[mentes]){
    $kerdes_szoveg = $_REQUEST[kerdes];
    $kerdes_tipus = $_REQUEST[tipus];
    $kerdes_sorszam = $_REQUEST[id];
    $sql = "UPDATE kerdesek SET kerdes_hu='$kerdes_szoveg', tipus='$kerdes_tipus' WHERE sorszam='$kerdes_sorszam'";
    mysql_query($sql);
    
    for ($i = 0; $i <= 10000; $i++){
        $valasz_x = 'valasz_'.$i;
        if ($_REQUEST[$valasz_x]){
            $valasz_ertek = $_REQUEST[$valasz_x];
            $sql = "UPDATE valaszok SET valasz_hu = '$valasz_ertek' WHERE sorszam = $i";
            mysql_query($sql);
        }
    }
}

if ($_REQUEST[id]){
    $result = mysql_query("SELECT kerdoiv_sorszam, kerdes_hu, tipus FROM kerdesek WHERE sorszam = '$_REQUEST[id]'");
    $a = mysql_fetch_row($result);
    $kerdoiv_sorszam = $a[0];
    $kerdes_szoveg = $a[1];
    $kerdes_tipus = $a[2];
    $urlap_cim = 'Kérdés módosítása';
    if ($kerdes_tipus == 'radio') {$check_radio = 'checked="checked"';}
    if ($kerdes_tipus == 'select') {$check_select = 'checked="checked"';}
    if ($kerdes_tipus == 'checkbox') {$check_checkbox = 'checked="checked"';}
    if ($kerdes_tipus == 'text') {$check_text = 'checked="checked"';}
    if ($kerdes_tipus == 'textarea') {$check_textarea = 'checked="checked"';}
    if ($kerdes_tipus == 'ranking') {$check_ranking = 'checked="checked"';}
} else {
    $urlap_cim = 'Új kérdés rögzítése';
}

if ($_REQUEST[id]){
    $resultx = mysql_query("SELECT sorszam, kerdes_valasz, valasz_hu FROM valaszok WHERE status = '1' AND kerdes_valasz = '$_REQUEST[id]' ORDER BY sorrend");
    while ($next_elementv = mysql_fetch_array($resultx)){
        $valaszok .= '<input type="text" name="valasz_'.$next_elementv[sorszam].'" value="'.$next_elementv[valasz_hu].'" />';
    }
}

$array = array( 'kerdoiv_sorszam'       => $kerdoiv_sorszam,
                'urlap_cim'   => $urlap_cim,
                'valaszok'   => $valaszok,
                'check_radio'   => $check_radio,
                'check_select'   => $check_select,
                'check_checkbox'   => $check_checkbox,
                'check_text'   => $check_text,
                'check_textarea'   => $check_textarea,
                'check_ranking'   => $check_ranking,
                'id'   => $_REQUEST[id],
                'kerdes_szoveg' => $kerdes_szoveg);

$oldal = new html_blokk;
$oldal->load_template_file("templates/ujkerdes.html",$array);
$tartalom = $oldal->html_code;

?>
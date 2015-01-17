<?php
if ($_SESSION[qa_user_id] == $kerdoiv_obj->keszito_id){
#?p=40&kerdoiv=11
$idopont = date("Y-m-d H:i:s");

if ($_REQUEST[zart_email_kuldes]){
    $result = mysql_query("SELECT email FROM zart_emailek WHERE status = '1' AND kerdoiv = '$kerdoiv_obj->sorszam'");
    while ($row = mysql_fetch_array($result)){
        #$log->write('x', 'zárt kérdőív ('.$kerdoiv_obj->sorszam.') kiküldése: '. $row[email]);
        $sql = "INSERT INTO email_temp (email, felhasznalo, kerdoivszam, kelt, statusz) VALUES ('$row[email]', '', '$kerdoiv_obj->sorszam', '$idopont', '1')";
        mysql_query($sql);
    }
    $sql = "UPDATE zart_emailek SET status = '2' WHERE status = '1' AND kerdoiv = '$kerdoiv_obj->sorszam'";
    mysql_query($sql);
    if ($_REQUEST[jelszo_generalas] == 'on'){
        $sql2 = "UPDATE kerdoivek SET zart_jelszo = '1' WHERE sorszam = '$kerdoiv_obj->sorszam'";
        $kerdoiv_obj->zart_jelszo = 1;
    } else {
        $sql2 = "UPDATE kerdoivek SET zart_jelszo = '0' WHERE sorszam = '$kerdoiv_obj->sorszam'";
        $kerdoiv_obj->zart_jelszo = 0;
    }
    mysql_query($sql2);
}

if ($_REQUEST[submit]){
    $kerdoiv_obj->zart_email_update();
}

$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM zart_emailsablonok");
while ($row = mysql_fetch_array($result)){
    if ((!$kerdoiv_obj->zart_email_szoveg) AND ($row[id] == '1')){
        $sab_jel = 'style="color: red;"';
    } else {
        unset($sab_jel);
    }
    $sablongombok .= '<span id="sablongomb_'.$row[id].'" onclick="ajax_sablonvalto('.$row[id].', '.$kerdoiv_obj->sorszam.')" '.$sab_jel.'>'.$row[nev_hu].'</span>';
}

if ($kerdoiv_obj->zart_email_szoveg){
    $egyedi_sab_jel = 'style="color: red;"';
} else {
    $result = mysql_query("SELECT sablon_hu, sablon_en, sablon_de FROM zart_emailsablonok WHERE id = 1");
    $row = mysql_fetch_array($result);
    $kerdoiv_obj->zart_email_szoveg = $row[sablon_hu];
}

$sablongombok .= '<span id="sablongomb_1000" onclick="ajax_sablonvalto(1000, '.$kerdoiv_obj->sorszam.')" '.$egyedi_sab_jel.'>egyedi</span>';

$smarty->assign('sablongombok', $sablongombok);
$smarty->assign('kerdoiv_obj', $kerdoiv_obj);
$smarty->assign('szotar', $szotar);

$tartalom = $smarty->fetch('templates/zartkerdoivek.tpl');
} else {
    $tartalom = "Nincs jogosultsága!";
}
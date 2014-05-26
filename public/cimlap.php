<?php
$result = mysql_query ("SELECT sorszam, cim_hu, cim_en, cim_de FROM kerdoivek WHERE status = '1' AND nyilvanos = '1' LIMIT 10");
while ($next_element = mysql_fetch_array($result)){
    $nyilvanos_kerdoivek .= '<a href="?p=kerdoiv&amp;kerdoiv='.$next_element[sorszam].'">'.$next_element['cim_'.$_SESSION[lang]].'</a>'."\n";
}

$result = mysql_query ("SELECT DISTINCT kerdoiv_sorszam FROM valaszadasok WHERE kitolto_sorszam = '$_SESSION[qa_user_id]' LIMIT 10");
while ($next_element = mysql_fetch_array($result)){
    $kitoltott_kerdoivek .= '<a href="?p=kerdoiv&amp;kerdoiv='.$next_element[sorszam].'">'.$next_element['cim_'.$_SESSION[lang]].'</a>'."\n";
}

$smarty->assign('tartalom', $tartalom);
$smarty->assign('nyilvanos_kerdoivek', $nyilvanos_kerdoivek);
$smarty->assign('figy_uzenet', $figy_uzenet);
$smarty->assign('lang', $lang);

if ($_SESSION["sessfelhasznalo"]){
    $tartalom = $smarty->fetch('templates/cimlap2.tpl');
} else {
    $tartalom = $smarty->fetch('templates/cimlap.tpl');
}
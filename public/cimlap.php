<?phpif ($_SESSION[lang] == 'hu'){ $nyelv_szur = "AND hu = '1'";};if ($_SESSION[lang] == 'en'){ $nyelv_szur = "AND en = '1'";};if ($_SESSION[lang] == 'de'){ $nyelv_szur = "AND de = '1'";};$result = mysql_query ("SELECT sorszam, cim_hu, cim_en, cim_de FROM kerdoivek WHERE status = '1' $nyelv_szur AND nyilvanos = '1' ORDER BY kiemeles DESC, sorszam DESC LIMIT 10");while ($next_element = mysql_fetch_array($result)){    $nyilvanos_kerdoivek .= '<a href="?p=kerdoiv&amp;kerdoiv='.$next_element[sorszam].'">'.$next_element['cim_'.$_SESSION[lang]].'</a>'."\n";}$result = mysql_query ("SELECT DISTINCT va.kerdoiv_sorszam, ki.sorszam, ki.cim_hu, ki.cim_de, ki.cim_en FROM valaszadasok AS va        LEFT JOIN kitoltok AS k         ON va.kitolto_sorszam = k.sorszam        LEFT JOIN kerdoivek AS ki        ON va.kerdoiv_sorszam = ki.sorszam        WHERE nyilvanos = '1' AND va.regisztralt_kitolto = '$_SESSION[qa_user_id]'        OR k.email = '$_SESSION[sessfelhasznaloemail]' ORDER BY va.sorszam desc LIMIT 10");while ($next_element = mysql_fetch_array($result)){    #$kitoltott_kerdoivek .= '<a href="?p=eredmeny&amp;kerdoiv='.$next_element['cim_'.$_SESSION[lang]].'">'.$next_element['cim_'.$_SESSION[lang]].'</a>'."\n";    $kitoltott_kerdoivek .= '<a href="?p=kerdoiv&amp;kerdoiv='.$next_element['sorszam'].'&er=1">'.$next_element['cim_'.$_SESSION[lang]].'</a>'."\n";}$smarty->assign('tartalom', $tartalom);$smarty->assign('nyilvanos_kerdoivek', $nyilvanos_kerdoivek);$smarty->assign('kitoltott_kerdoivek', $kitoltott_kerdoivek);$smarty->assign('figy_uzenet', $figy_uzenet);$smarty->assign('lang', $lang);$smarty->assign('szotar', $szotar);if ($_SESSION["sessfelhasznalo"]){    $tartalom = $smarty->fetch('templates/cimlap2.tpl');} else {    $tartalom = $smarty->fetch('templates/cimlap.tpl');}
<?php
if ($_REQUEST[keres]){
   $keres_szur = "AND cim_hu LIKE '%$_REQUEST[keres]%'";
}

$result = "SELECT sorszam, cim_hu, cim_en, cim_de FROM kerdoivek WHERE status = '1' AND nyilvanos = '1' $keres_szur";
$navsav = new navsav();
$navsav->create_navsav($result, $_REQUEST['lap'], 2, $kiemeltx, $_REQUEST[kategoriaszures]);

$result = mysql_query($result."LIMIT $navsav->tol, $navsav->ig");
while ($next_element = mysql_fetch_array($result)){
    $nyilvanos_kerdoivek .= '<a href="?p=kerdoiv&amp;kerdoiv='.$next_element[sorszam].'">'.$next_element['cim_'.$_SESSION[lang]].'</a><br />'."\n";
}

$smarty->assign('lang', $lang);
$smarty->assign('keres', $_REQUEST[keres]);
$smarty->assign('navsav', $navsav->lapszamsor);
$smarty->assign('nyilvanos_kerdoivek', $nyilvanos_kerdoivek);

$tartalom = $smarty->fetch('templates/nyilvanos.tpl');
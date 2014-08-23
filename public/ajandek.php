<?php
if ($_REQUEST[keres]){
   $keres_szur = "AND (cim_hu LIKE '%$_REQUEST[keres]%' OR cim_en LIKE '%$_REQUEST[keres]%' OR cim_de LIKE '%$_REQUEST[keres]%'
           OR leiras_hu LIKE '%$_REQUEST[keres]%' OR leiras_en LIKE '%$_REQUEST[keres]%' OR leiras_de LIKE '%$_REQUEST[keres]%')";
}

$szur_ajandek = "AND (ajandek = '1')";

if ($_SESSION[lang] == 'hu'){ $nyelv_szur = "AND hu = '1'";};
if ($_SESSION[lang] == 'en'){ $nyelv_szur = "AND en = '1'";};
if ($_SESSION[lang] == 'de'){ $nyelv_szur = "AND de = '1'";};

$result = "SELECT sorszam FROM kerdoivek WHERE status = '1' $nyelv_szur $keres_szur $szur_ajandek";

$navsav = new navsav();
$navsav->create_navsav($result, $_REQUEST['lap'], 5, $kiemeltx, $_REQUEST[kategoriaszures], 'ajandek');

$result = mysql_query($result."ORDER BY kiemeles DESC, sorszam DESC LIMIT $navsav->tol, $navsav->ig");

while ($next_element = mysql_fetch_array($result)){  //5 darab kérdőív sorszámon megy végig
    $obj_kerdoiv = new kerdoiv;
    $obj_kerdoiv->load($next_element[sorszam]);
    $obj_array[] = $obj_kerdoiv;
}

$talalatszam .= '<div>A keresés eredménye: '.$navsav->termekdb.' db találat</div>';
    
$smarty->assign('szotar', $szotar);
$smarty->assign('obj_array', $obj_array);
$smarty->assign('keres', $_REQUEST[keres]);
$smarty->assign('navsav', $navsav->lapszamsor);
$smarty->assign('talalatszam', $talalatszam);
$tartalom = $smarty->fetch('templates/ajandek.tpl');
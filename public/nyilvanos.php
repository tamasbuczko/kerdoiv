<?php
if ($_REQUEST[keres]){
   $keres_szur = "AND (cim_hu LIKE '%$_REQUEST[keres]%' OR cim_en LIKE '%$_REQUEST[keres]%' OR cim_de LIKE '%$_REQUEST[keres]%'
           OR leiras_hu LIKE '%$_REQUEST[keres]%' OR leiras_en LIKE '%$_REQUEST[keres]%' OR leiras_de LIKE '%$_REQUEST[keres]%')";
}

$result = "SELECT sorszam, cim_hu, leiras_hu, leiras_en, leiras_de,  cim_en, cim_de, fejlec_kep FROM kerdoivek WHERE status = '1' AND nyilvanos = '1' $keres_szur";
$navsav = new navsav();
$navsav->create_navsav($result, $_REQUEST['lap'], 2, $kiemeltx, $_REQUEST[kategoriaszures]);

$result = mysql_query($result."LIMIT $navsav->tol, $navsav->ig");
while ($next_element = mysql_fetch_array($result)){
    $leiras_x = $next_element['leiras_'.$_SESSION[lang]];
    $talalat++;
    if ($_REQUEST[keres]){
        $leiras_x = str_replace($_REQUEST[keres], '<span class="kereses">'.$_REQUEST[keres].'</span>', $leiras_x);
    }
    $nyilvanos_kepek = $next_element[fejlec_kep];    
    $nyilvanos_kerdoivek .= '<a href="?p=kerdoiv&amp;kerdoiv='.$next_element[sorszam].'">'.$next_element['cim_'.$_SESSION[lang]].'</a><br />'
            . '<div>'.$leiras_x.'</div>'.'<div class="nyilvanos_kepek"><img src="fejlec_kepek/'.$nyilvanos_kepek.'" alt="" /></div>'."\n";
}

$talalatszam .= '<div>A keresés eredménye: '.$talalat.' db találat</div>';

$smarty->assign('lang', $lang);
$smarty->assign('keres', $_REQUEST[keres]);
$smarty->assign('navsav', $navsav->lapszamsor);
$smarty->assign('nyilvanos_kerdoivek', $nyilvanos_kerdoivek);
$smarty->assign('talalatszam', $talalatszam);
$smarty->assign('nyilvanos_kepek', $nyilvanos_kepek);

$tartalom = $smarty->fetch('templates/nyilvanos.tpl');
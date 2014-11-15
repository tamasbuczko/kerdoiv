<?php
if ($_REQUEST[id]){
    $datum = date("Y-m-d");
   if ($_REQUEST[status] == '1'){
       $datum_szur = ", aktivalas = '$datum'";
   }
   if ($_REQUEST[status] == '0'){
       $datum_szur = ", lejarat = '$datum'";
   }
   $result = mysql_query("UPDATE kerdoivek SET status = '$_REQUEST[status]' $datum_szur WHERE sorszam = $_REQUEST[id]");
   mysql_query($result);
   header("Location: ?p=7");
}

$result = mysql_query ("SELECT k.sorszam, k.cim_hu, k.cim_en, k.cim_de, k.status, h.user, k.zart FROM kerdoivek AS k
		  LEFT JOIN kerdoiv_hozzaferes AS h ON k.sorszam = h.kerdoiv
		  WHERE k.user_id = '$_SESSION[qa_user_id]' OR h.user = '$_SESSION[qa_user_id]' ORDER BY k.sorszam DESC");
$db_kerdoivek = 0;
$sorszamok = array();
while ($next_element = mysql_fetch_array($result)){
   if (!in_array($next_element[sorszam], $sorszamok)){ //csak akkor fut, ha nincs benne az aktuális sorszám a tömbben
   $db_kerdoivek++;
   $result2 = mysql_query("SELECT sorszam FROM valaszadasok WHERE kerdoiv_sorszam = $next_element[sorszam] GROUP BY kitolto_sorszam");
   $valaszadok_szama = mysql_num_rows($result2);
   
   $result33 = mysql_query("SELECT id FROM forum_figyeles WHERE kerdoiv_id = '$next_element[sorszam]' AND user_id = '$user->sorszam'");
   $ujuzenet = mysql_fetch_array($result33);
   
   if ($ujuzenet[0]){
       $ujuzenet_ikon = '<img src="graphics/level.png" alt="'.$szotar->fordit('Új üzenet érkezett').'"  style="margin: 5px 0px -8px 0px; width:25px;"/>';
   } else {
       $ujuzenet_ikon = '';
   }
   
   $resultc = mysql_query ("SELECT cim_hu, cim_en, cim_de, leiras_hu, leiras_en, leiras_de, hu, en, de FROM kerdoivek WHERE sorszam = '$next_element[sorszam]' ");
   $next_elementc = mysql_fetch_array ($resultc);
   $kerdoiv_cim=$next_elementc['cim_'.$_SESSION[lang]];
   $kerdoiv_leiras=$next_elementc['leiras_'.$_SESSION[lang]];
   
   $nyelv = 0;
   #$nyelv_db = 0;
   $zaszlo_hu = '';
   $zaszlo_en = '';
   $zaszlo_de = '';
   if ($next_elementc[hu] == 1){
	   $nyelv_db++;
	   $zaszlo_hu = '<img src="graphics/magyar_zaszlo.png" alt="'.$lang[magyar].'" />';
   }
   if ($next_elementc[en] == 1){
	   $nyelv_db++;
	   $zaszlo_en = '<img src="graphics/angol_zaszlo.png" alt="'.$lang[angol].'" />';
   }
   if ($next_elementc[de] == 1){
	   $nyelv_db++;
	   $zaszlo_de = '<img src="graphics/nemet_zaszlo.png" alt="'.$lang[nemet].'" />';
   }
   
   if ($next_element[user] == $_SESSION[qa_user_id]){
	  $megosztott = '<img src="graphics/megosztott.png" alt="megosztott kérdőív" title="megosztott kérdőív" style="width: 50px; margin: 5px 0px -8px 0px;" />';
   } else {
	  $megosztott = '';
   }
   
   if ($next_element['zart'] == '1'){
	  $kerdoiv_zart = '<img src="graphics/lock.png" alt="zárt kérdőív" title="zárt kérdőív" class="zart_ikon" />';
   } else {
	  $kerdoiv_zart = '';
   }
   
   #if ($nyelv_db > 1){
	  $nyelv_fejlec = '<th>'.$lang['nyelvek'].'</th>';
	  $zaszlok = $zaszlo_en.$zaszlo_de.$zaszlo_hu;
   #} else {
	#  $zaszlok = '';
   #}
   
    $nyelv = 'cim_'.$_SESSION[lang];
    $cim = $next_element[$nyelv];
	if ($cim == ''){
	   $cim = $next_element[cim_hu];
	   if ($cim == ''){ $cim = $next_element[cim_en];}
	   if ($cim == ''){ $cim = $next_element[cim_de];}
	}
	
	if ($next_element[status] == 1){
	   $status = '<a href="?p=7&amp;id='.$next_element[sorszam].'&amp;status=0"><img src="graphics/active.jpg" alt="kikapcsol" title="kikapcsol" /></a>';
	}
	if ($next_element[status] == 0){
	   $status = '<a href="?p=7&amp;id='.$next_element[sorszam].'&amp;status=1"><img src="graphics/inactive.jpg" alt="bekapcsol" title="bekapcsol" /></a>';
	}
	
    $lista_kerdoiveim .= '<tr>'
			. '<td><a href="?p=kerdoiv_adatlap&kerdoiv='.$next_element[sorszam].'">'.$cim.$megosztott.$kerdoiv_zart.$ujuzenet_ikon.'</a></td>'
			. '<td><a href="?p=kerdoiv&kerdoiv='.$next_element[sorszam].'&er=1"><img src="graphics/icon_graph.png" alt="eredmények" /></a></td>'
			. '<td><a href="?p=kerdoiv&kerdoiv='.$next_element[sorszam].'"><img src="graphics/icon_checked.png" alt="kitöltés" /></a></td>'
			. '<td><a href="?p=kerdoiv&amp;mod=1&amp;kerdoiv='.$next_element[sorszam].'"><img src="graphics/icon_edit.gif" alt="módosítás" /></a></td>'
			. '<td>'.$status.'</td>'
			. '<td>'.$valaszadok_szama.'</td>'
			. '<td class="kis_zaszlo">'.$zaszlok.'</td>'
			. '</tr>';
   }
   $sorszamok[] = $next_element[sorszam];
}

if ($db_kerdoivek == 0){
   $display_none = ' style="display: none;"';
   $uzenet = '<div style="width: 100%; text-align: center; margin: 70px 0px 90px 0px;">'.$szotar->fordit('Jelenleg még nincs saját kérdőíve!').'</div>';
}

$oldal = new html_blokk;

$smarty->assign('szotar', $szotar);
$smarty->assign('lang', $lang);
$smarty->assign('nyelv_fejlec',$nyelv_fejlec);
$smarty->assign('lista_kerdoiveim',$lista_kerdoiveim);
$smarty->assign('display_none',$display_none);
$smarty->assign('uzenet',$uzenet);
$smarty->assign('figy_uzenet',$figy_uzenet);
                
$tartalom = $smarty->fetch('templates/kerdoiveim.tpl');
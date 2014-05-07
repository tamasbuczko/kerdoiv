<?php
if ($_REQUEST[id]){
   $result = mysql_query("UPDATE kerdoivek SET status = '$_REQUEST[status]' WHERE sorszam = $_REQUEST[id]");
   mysql_query($result);
   header("Location: ?p=7");
}

$result = mysql_query ("SELECT sorszam, cim_hu, cim_en, cim_de, status FROM kerdoivek WHERE user_id = '$_SESSION[qa_user_id]' ");
$db_kerdoivek = 0;
while ($next_element = mysql_fetch_array($result)){
   $db_kerdoivek++;
   $result2 = mysql_query("SELECT sorszam FROM valaszadasok WHERE kerdoiv_sorszam = $next_element[sorszam] GROUP BY kitolto_sorszam");
   $valaszadok_szama = mysql_num_rows($result2);
   
   $resultc = mysql_query ("SELECT cim_hu, cim_en, cim_de, leiras_hu, leiras_en, leiras_de, hu, en, de FROM kerdoivek WHERE sorszam = '$next_element[sorszam]' ");
   $next_elementc = mysql_fetch_array ($resultc);
   $kerdoiv_cim=$next_elementc['cim_'.$_SESSION[lang]];
   $kerdoiv_leiras=$next_elementc['leiras_'.$_SESSION[lang]];
   $nyelv = 0;
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
   
   if ($nyelv_db > 1){
	  $nyelv_fejlec = '<th>'.$lang[nyelvek].'</th>';
	  $zaszlok = $zaszlo_en.$zaszlo_de.$zaszlo_hu;
   } else {
	  $zaszlok = '';
   }
   
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
			. '<td><a href="?p=kerdoiv_adatlap&kerdoiv='.$next_element[sorszam].'">'.$cim.'</a></td>'
			. '<td><a href="?p=eredmeny&kerdoiv='.$next_element[sorszam].'"><img src="graphics/icon_graph.png" alt="eredmények" /></a></td>'
			. '<td><a href="?p=kerdoiv&kerdoiv='.$next_element[sorszam].'"><img src="graphics/icon_checked.png" alt="eredmények" /></a></td>'
			. '<td><a href="?p=kerdoiv&amp;mod=1&amp;kerdoiv='.$next_element[sorszam].'"><img src="graphics/icon_edit.gif" alt="eredmények" /></a></td>'
			. '<td>'.$status.'</td>'
			. '<td>'.$valaszadok_szama.'</td>'
			. '<td class="kis_zaszlo">'.$zaszlok.'</td>'
			. '</tr>';
}

if ($db_kerdoivek == 0){
   $display_none = ' style="display: none;"';
   $uzenet = '<div style="width: 100%; text-align: center; margin: 70px 0px 90px 0px;">Jelenleg még nincs saját kérdőíve!</div>';
}


$oldal = new html_blokk;

$array = array( 'lista_kerdoiveim'       => $lista_kerdoiveim,
		'nyelv_fejlec'       => $nyelv_fejlec,
                'uj_kerdoiv_rogzitese'=> $lang[uj_kerdoiv_rogzitese], 
                'cim'       => $lang[cim],
                'eredmenyek'       => $lang[eredmenyek],
                'kitoltes'       => $lang[kitoltes],
                'modositas'       => $lang[modositas],
                'aktiv'       => $lang[aktiv],
		'display_none' => $display_none,
		'uzenet' => $uzenet,
                'kitoltottek'       => $lang[kitoltottek],
                'nyelvek' => $lang[nyelvek],
                'figy_uzenet'   => $figy_uzenet);

$oldal->load_template_file("templates/kerdoiveim.html",$array);

$tartalom = $oldal->html_code;
?>
<?php


$result = mysql_query ("SELECT sorszam, cim_hu, cim_en, cim_de FROM kerdoivek WHERE status = '1' AND user_id = '$_SESSION[qa_user_id]' ");
while ($next_element = mysql_fetch_array($result)){
   
   $result2 = mysql_query("SELECT sorszam FROM valaszadasok WHERE kerdoiv_sorszam = $next_element[sorszam] GROUP BY kitolto_sorszam");
   $valaszadok_szama = mysql_num_rows($result2);
   
   $resultc = mysql_query ("SELECT cim_hu, cim_en, cim_de, leiras_hu, leiras_en, leiras_de, hu, en, de FROM kerdoivek WHERE status = '1' AND sorszam = '$next_element[sorszam]' ");
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
	  $nyelv_fejlec = '<th>nyelvek</th>';
	  $zaszlok = '<td class="kis_zaszlo">'.$zaszlo_hu.$zaszlo_en.$zaszlo_de.'</td>';
   } else {
	  $zaszlok = '';
   }
   
    $nyelv = 'cim_'.$_SESSION[lang];
    $cim = $next_element[$nyelv];
    $lista_kerdoiveim .= '<tr><td>'.$cim.'</td>'
			. '<td><a href="?p=eredmeny&kerdoiv='.$next_element[sorszam].'"><img src="graphics/icon_graph.png" alt="eredmények" /></a></td>'
			. '<td><a href="?p=kerdoiv&kerdoiv='.$next_element[sorszam].'"><img src="graphics/icon_checked.png" alt="eredmények" /></a></td>'
			. '<td><a href="?p=kerdoiv&amp;mod=1&amp;kerdoiv='.$next_element[sorszam].'"><img src="graphics/icon_edit.png" alt="eredmények" /></a></td>'
			. '<td>x</td><td>'.$valaszadok_szama.' fő</td>'.$zaszlok.'</tr>';
}


$oldal = new html_blokk;

$array = array( 'lista_kerdoiveim'       => $lista_kerdoiveim,
				'nyelv_fejlec'       => $nyelv_fejlec,
                'figy_uzenet'   => $figy_uzenet);

$oldal->load_template_file("templates/kerdoiveim.html",$array);

$tartalom = $oldal->html_code;
?>
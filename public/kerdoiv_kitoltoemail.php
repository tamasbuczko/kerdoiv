<?php
$result = mysql_query("SELECT va.sorszam, k.email AS email FROM valaszadasok AS va LEFT JOIN kitoltok AS k ON va.kitolto_sorszam = k.sorszam WHERE va.kerdoiv_sorszam = '$_REQUEST[kerdoiv]' AND k.email != '' GROUP BY va.kitolto_sorszam");

$sor = 0;
while ($next_element = mysql_fetch_array($result)){
   $sor++;
   $list .= $sor.'. '.$next_element[email].'<br />';
   $emailek[$sor] = $next_element[email];
}

$tartalom = $list;
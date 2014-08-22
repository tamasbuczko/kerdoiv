<?php

if ($_REQUEST[kerdoiv]){
   if (!is_numeric($_REQUEST[kerdoiv])) {
	   $result = mysql_query("SELECT sorszam, user_id, hirdetessel, hu, en, de FROM kerdoivek WHERE sorszam <> '' $csak_aktiv AND hivatkozas = '$_REQUEST[kerdoiv]' ");
   } else {
	   $result = mysql_query("SELECT sorszam, user_id, hirdetessel, hu, en, de FROM kerdoivek WHERE sorszam <> '' $csak_aktiv AND sorszam = '$_REQUEST[kerdoiv]' ");
   }
   $a = mysql_fetch_array($result);
   if ($a[0]) {
	   $_REQUEST[kerdoiv] = $a[0];
   }

   $kerdoiv_nyelv_bekapcs = $a[$_SESSION[lang]];  //1 az értéke, ha az aktuális nyelven be van kapcsolva a kérdőív

   $kerdoiv_obj = new kerdoiv;  // át kell térni a használatára, jelenleg csak az iframe használja
   $kerdoiv_obj->load($_REQUEST[kerdoiv]);
}

$cikk = new cikkszoveg();

if ($_REQUEST[p]){
    $cikk->mysql_read($_REQUEST[p], $_SESSION['lang']);
} else {
    $cikk->mysql_read(2, $_SESSION['lang']);
}
if ($cikk->php_file){
    include('public/'.$cikk->php_file);
}

if ($cikk->php_file == 'cimlap.php'){
    $tartalom = $tartalom.$cikk->html_code;}
else {
    $tartalom = $cikk->html_code.$tartalom;
}
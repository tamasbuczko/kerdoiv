<?php
$result = mysql_query("SELECT va.sorszam, k.email AS email FROM valaszadasok AS va LEFT JOIN kitoltok AS k ON va.kitolto_sorszam = k.sorszam WHERE va.kerdoiv_sorszam = '$_REQUEST[kerdoiv]' AND k.email != '' GROUP BY va.kitolto_sorszam");

$sor = 0;
while ($next_element = mysql_fetch_array($result)){
   $sor++;
   if (filter_var($next_element[email], FILTER_VALIDATE_EMAIL)) {
	  $list .= $next_element[email].'<br />';
	  $emailek[$sor] = $next_element[email];
   }
}

$sorsol_db= $_REQUEST[sorsol_db];

for ($i = 1; $i<=$sorsol_db; $i++){
   $veletlen = rand(1,$sor);
   $nyertesek .= $i.'. ' . $emailek[$veletlen]. ' <br />';
   unset($emailek[$veletlen]);
}

if ($sorsol_db > 1){
   $tobbes = 'nyertesek';
} else {
   $tobbes = 'nyertes';
}

if ($nyertesek){
   $nyertesek = ''
		. '<div id="nyertesek">'
		. '<h2>A '.$tobbes.':</h2>'
		. $nyertesek
                . '<br />'
		. '</div>';
}

$form = '<form action="" id="sorsol" method="post">'
		. '<label>Hány nyertest akarsz sorsolni?</label>'
		. '<input type="text" name="sorsol_db" value="" style="width: 50px; margin-left:10px;" /><br />'
		. '<input type="submit" value="Sorsolás" style="margin-bottom:10px;">'
		. '</form>';

if ($_SESSION[qa_user_id] == $kerdoiv_obj->keszito_id){
    $tartalom = $form . $nyertesek . $list;
}  else {
    $tartalom = "A lista megtekintéséhez nincs jogosultsága!";
}


<?php

$result = mysql_query ("SELECT sorszam, cim_hu, cim_en, cim_de FROM kerdoivek WHERE status = '1' AND nyilvanos = '1' LIMIT 10");
while ($next_element = mysql_fetch_array($result)){
    $nyilvanos_kerdoivek .= '<a href="?p=kerdoiv&amp;kerdoiv='.$next_element[sorszam].'">'.$next_element['cim_'.$_SESSION[lang]].'</a>'."\n";
}

$array = array( 'tartalom'       => $tartalom,
                'nyilvanos_kerdoivek'       => $nyilvanos_kerdoivek,
                'bejelentkezes'       => $lang[bejelentkezes],
                'azonosito'       => $lang[azonosito],
		'jelszo'       => $lang[jelszo],
		'regisztracio'       => $lang[regisztracio],
                'figy_uzenet'   => $figy_uzenet,
                'aszf' => $lang[aszf],
                'uj_nyilvanos_kerdoivek' => $lang[uj_nyilvanos_kerdoivek]);

$oldal = new html_blokk;

if ($_SESSION["sessfelhasznalo"]){
    $oldal->load_template_file("templates/cimlap2.html",$array);
} else {
    $oldal->load_template_file("templates/cimlap.html",$array);
}

$tartalom = $oldal->html_code;

?>
<?php

if ($_REQUEST['lang'] != ''){
	$_SESSION["lang"] = $_REQUEST[lang];
} else {
	if ($_SESSION["lang"] == ''){
		$_SESSION["lang"] = 'hu';
	}
}

if ($_SESSION["lang"] == 'hu'){
    $lang[nyelv_valasztas] = 'Nyelv választás';
    $lang[magyar] = 'magyar';
    $lang[angol] = 'angol';
    $lang[nemet] = 'német';
    $lang[eletkor] = 'Életkor:';
    $lang[neme] = 'Neme:';
    $lang[orszag] = 'Ország:';
    $lang[foglalkozas] = 'Foglalkozás:';
    $lang[elkuldes] = 'Elküldés';
    $lang[email_bekeres] = 'Kérjük, adja meg e-mail címét, ha szeretné megkapni a kérdőív eredményét!';
    
}

if ($_SESSION["lang"] == 'en'){
    $lang[nyelv_valasztas] = 'Select language';
    $lang[magyar] = 'Hungarian';
    $lang[angol] = 'English';
    $lang[nemet] = 'German';
    $lang[eletkor] = 'Age:';
    $lang[neme] = 'Sex:';
    $lang[orszag] = 'Country:';
    $lang[foglalkozas] = 'Occupation:';
    $lang[elkuldes] = 'Submit';
    $lang[email_bekeres] = 'Please, give us your e-mail address if you want to know results of this survey!';
}

if ($_SESSION["lang"] == 'de'){
    $lang[nyelv_valasztas] = 'Sprache wählen';
    $lang[magyar] = 'ungarische';
    $lang[angol] = 'englisch';
    $lang[nemet] = 'deutsch';
    $lang[eletkor] = 'Alter:';
    $lang[neme] = 'Sex:';
    $lang[orszag] = 'Land:';
    $lang[foglalkozas] = 'Beruf:';
    $lang[elkuldes] = 'Sendung';
    $lang[email_bekeres] = 'Bitte, geben Sie uns Ihre E-Mail-Adresse, wenn Sie Ergebnisse dieser Umfrage wissen wollen!';
}


?>
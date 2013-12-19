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
    $lang[ferfi] = 'férfi';
    $lang[no] = 'nő';
    $lang[orszag] = 'Ország:';
    $lang[foglalkozas] = 'Foglalkozás:';
    $lang[elkuldes] = 'Elküldés';
    $lang[mentes] = 'Mentés';
    $lang[koszonjuk_valaszaid] = 'Köszönjük válaszaid!';
    $lang[email_bekeres] = 'Kérjük, adja meg e-mail címét, ha szeretné megkapni a kérdőív eredményét!';
    $lang[nem_valaszoltal] = 'Az alábbi kérdésekre nem válaszoltál: ';
	$lang[nem_feldolgozhato] = 'A kérdőív az alábbi hibák miatt nem feldolgozható: ';
	$lang[email_cimed_hianyzik] = 'Email címed hiányzik';
	$lang[nem_adta_meg_a_nemet] = 'Nem adta meg a nemét!';
	$lang[nem_adta_meg_a_korat] = 'Nem adta meg a korát!';
	$lang[nem_adta_meg_a_lakhelyet] = 'Nem adta meg a lakhelyét!';
	$lang[nem_adta_meg_a_foglalkozasat] = 'Nem adta meg a foglalkozását!';
}

if ($_SESSION["lang"] == 'en'){
    $lang[nyelv_valasztas] = 'Select language';
    $lang[magyar] = 'Hungarian';
    $lang[angol] = 'English';
    $lang[nemet] = 'German';
    $lang[eletkor] = 'Age:';
    $lang[neme] = 'Sex:';
    $lang[ferfi] = 'man';
    $lang[no] = 'woman';
    $lang[orszag] = 'Country:';
    $lang[foglalkozas] = 'Occupation:';
    $lang[elkuldes] = 'Submit';
    $lang[mentes] = 'Save';
	$lang[koszonjuk_valaszaid] = 'Thank you, for answers!';
    $lang[email_bekeres] = 'Please, give us your e-mail address if you want to know results of this survey!';
	$lang[nem_valaszoltal] = 'Az alábbi kérdésekre nem válaszoltál:';
	$lang[nem_feldolgozhato] = 'A kérdőív az alábbi hibák miatt nem feldolgozható: ';
	$lang[email_cimed_hianyzik] = 'Email címed hiányzik';
	$lang[nem_adta_meg_a_nemet] = 'Nem adta meg a nemét!';
	$lang[nem_adta_meg_a_korat] = 'Nem adta meg a korát!';
	$lang[nem_adta_meg_a_lakhelyet] = 'Nem adta meg a lakhelyét!';
	$lang[nem_adta_meg_a_foglalkozasat] = 'Nem adta meg a foglalkozását!';
}

if ($_SESSION["lang"] == 'de'){
    $lang[nyelv_valasztas] = 'Sprache wählen';
    $lang[magyar] = 'ungarische';
    $lang[angol] = 'englisch';
    $lang[nemet] = 'deutsch';
    $lang[eletkor] = 'Alter:';
    $lang[neme] = 'Sex:';
    $lang[ferfi] = 'férfi';
    $lang[no] = 'nő';
    $lang[orszag] = 'Land:';
    $lang[foglalkozas] = 'Beruf:';
    $lang[elkuldes] = 'Sendung';
    $lang[mentes] = 'Sendung';
	$lang[koszonjuk_valaszaid] = 'Köszönjük válaszaid!';
    $lang[email_bekeres] = 'Bitte, geben Sie uns Ihre E-Mail-Adresse, wenn Sie Ergebnisse dieser Umfrage wissen wollen!';
	$lang[nem_valaszoltal] = 'Az alábbi kérdésekre nem válaszoltál:';
	$lang[nem_feldolgozhato] = 'A kérdőív az alábbi hibák miatt nem feldolgozható: ';
	$lang[email_cimed_hianyzik] = 'Email címed hiányzik';
	$lang[nem_adta_meg_a_nemet] = 'Nem adta meg a nemét!';
	$lang[nem_adta_meg_a_korat] = 'Nem adta meg a korát!';
	$lang[nem_adta_meg_a_lakhelyet] = 'Nem adta meg a lakhelyét!';
	$lang[nem_adta_meg_a_foglalkozasat] = 'Nem adta meg a foglalkozását!';
}


?>
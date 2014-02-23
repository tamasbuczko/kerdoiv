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
    $lang[email_bekeres] = 'Kérjük, add meg e-mail címed, ha szeretnéd megkapni a kérdőív eredményét!';
    $lang[nem_valaszoltal] = 'Az alábbi kérdésekre nem válaszoltál: ';
	$lang[nem_feldolgozhato] = 'A kérdőív az alábbi hibák miatt nem feldolgozható: ';
	$lang[email_cimed_hianyzik] = 'Email címed hiányzik!';
	$lang[nem_adta_meg_a_nemet] = 'Nem adtad meg a nemed!';
	$lang[nem_adta_meg_a_korat] = 'Nem adtad meg a korod!';
	$lang[nem_adta_meg_a_lakhelyet] = 'Nem adtad meg a lakhelyed!';
	$lang[nem_adta_meg_a_foglalkozasat] = 'Nem adtad meg a foglalkozásod!';
}

if ($_SESSION["lang"] == 'en'){
    $lang[nyelv_valasztas] = 'Select language';
    $lang[magyar] = 'Hungarian';
    $lang[angol] = 'English';
    $lang[nemet] = 'German';
    $lang[eletkor] = 'Age:';
    $lang[neme] = 'Sex:';
    $lang[ferfi] = 'male';
    $lang[no] = 'female';
    $lang[orszag] = 'Country:';
    $lang[foglalkozas] = 'Occupation:';
    $lang[elkuldes] = 'Submit';
    $lang[mentes] = 'Save';
	$lang[koszonjuk_valaszaid] = 'Thank you, for answers!';
    $lang[email_bekeres] = 'Please, give us your e-mail address if you want to know results of this survey!';
	$lang[nem_valaszoltal] = 'You did not answer the following questions: ';
	$lang[nem_feldolgozhato] = 'We can not accept the survey because of the following defects: ';
	$lang[email_cimed_hianyzik] = 'Your Email is missing!';
	$lang[nem_adta_meg_a_nemet] = 'You did not give your sex!';
	$lang[nem_adta_meg_a_korat] = 'You did not give your age!';
	$lang[nem_adta_meg_a_lakhelyet] = 'You did not give your living place!';
	$lang[nem_adta_meg_a_foglalkozasat] = 'You did not give your occupation!';
}

if ($_SESSION["lang"] == 'de'){
    $lang[nyelv_valasztas] = 'Sprache wählen';
    $lang[magyar] = 'ungarische';
    $lang[angol] = 'englisch';
    $lang[nemet] = 'deutsch';
    $lang[eletkor] = 'Alter:';
    $lang[neme] = 'Sex:';
    $lang[ferfi] = 'männlich';
    $lang[no] = 'weiblich';
    $lang[orszag] = 'Land:';
    $lang[foglalkozas] = 'Beruf:';
    $lang[elkuldes] = 'Sendung';
    $lang[mentes] = 'Sendung';
	$lang[koszonjuk_valaszaid] = 'Danke für Antworten!';
    $lang[email_bekeres] = 'Bitte, geben Sie uns Ihre E-Mail-Adresse, wenn Sie Ergebnisse dieser Umfrage wissen wollen!';
	$lang[nem_valaszoltal] = 'Sie haben nicht die folgenden Fragen zu beantworten:';
	$lang[nem_feldolgozhato] = 'Wir können die Umfrage aufgrund der folgenden Fehler nicht akzeptieren:';
	$lang[email_cimed_hianyzik] = 'Ihre E-Mail fehlt!';
	$lang[nem_adta_meg_a_nemet] = 'Sie gab nicht Ihr Geschlecht!';
	$lang[nem_adta_meg_a_korat] = 'Sie gab nicht auf Ihr Alter!';
	$lang[nem_adta_meg_a_lakhelyet] = 'Sie haben es nicht geben Ihrem Lebensraum!';
	$lang[nem_adta_meg_a_foglalkozasat] = 'Sie haben Ihren Beruf nicht aufgeben!';
}


?>
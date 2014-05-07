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
    $lang[bejelentkezes] = 'Bejelentkezés';
    $lang[azonosito] = 'Azonosító';
    $lang[jelszo] = 'Jelszó';
    $lang[regisztracio] = 'Regisztráció';
    $lang[email] = 'E-mail';
    $lang[jelszo_megegyszer] = 'Jelszó mégegyszer';
    $lang[ingyenes] = 'ingyenes';
    $lang[ezust_csomag] = 'ezüst csomag';
    $lang[arany_csomag] = 'arany csomag';
	$lang[kapcsolat] = 'Kapcsolat';
	$lang[az_on_email_cime] = 'Az Ön e-mail címe';
	$lang[uzenet] = 'Üzenet';
	$lang[elkuldes] = 'Elküldés';
        $lang[uj_nyilvanos_kerdoivek] = 'Legfrissebb nyilvános kérdőívek';
        $lang[uj_kerdoiv_rogzitese] = 'Új kérdőív rögzítése';
        $lang[cim] = 'cím';
        $lang[eredmenyek] = 'eredmények';
        $lang[kitoltes] = 'kitöltés';
        $lang[modositas] = 'módosítás';
        $lang[aktiv] = 'aktív';
        $lang[kitoltottek] = 'kitöltötték';
        $lang[nyelvek] = 'nyelvek';
        $lang[aszf] = 'Használati és adatvédelmi szabályok';
        $lang[vezerlopult] = 'Vezérlőpult';
        $lang[radio_i] = 'A kitöltő csak egy választ jelölhet be.';
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
        $lang[bejelentkezes] = 'Login';
    $lang[azonosito] = 'Username';
	$lang[jelszo] = 'Password';
	$lang[regisztracio] = 'Registration';
	$lang[email] = 'E-mail';
	$lang[jelszo_megegyszer] = 'Password again';
	$lang[ingyenes] = 'free';
	$lang[ezust_csomag] = 'silver package';
	$lang[arany_csomag] = 'gold package';
	$lang[kapcsolat] = 'Contact';
	$lang[az_on_email_cime] = 'Your e-mail';
	$lang[uzenet] = 'Message';
	$lang[elkuldes] = 'Sending';
        $lang[uj_nyilvanos_kerdoivek] = 'Newest public surveys';
        $lang[uj_kerdoiv_rogzitese] = 'Add new survey';
        $lang[cim] = 'title';
        $lang[eredmenyek] = 'results';
        $lang[kitoltes] = 'filling';
        $lang[modositas] = 'modification';
        $lang[aktiv] = 'active';
        $lang[kitoltottek] = 'completed';
        $lang[nyelvek] = 'languages';
        $lang[aszf] = 'Terms and conditions';
        $lang[vezerlopult] = 'Control panel';
        $lang[radio_i] = 'The responser can mark only one answer.';
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
        $lang[bejelentkezes] = 'Anmelden';
    	$lang[azonosito] = 'Benutzername';
	$lang[jelszo] = 'Passwort';
	$lang[regisztracio] = 'Registrierung';
	$lang[email] = 'Ihre E-Mail';
	$lang[jelszo_megegyszer] = 'Passwort erneut';	
	$lang[ingyenes] = 'Frei';
	$lang[ezust_csomag] = 'Silber-Paket';
	$lang[arany_csomag] = 'Gold-Paket';
	$lang[kapcsolat] = 'Kontakt';
	$lang[az_on_email_cime] = 'Ihre E-Mail';
	$lang[uzenet] = 'Nachricht';
	$lang[elkuldes] = 'Sendung';
        $lang[uj_nyilvanos_kerdoivek] = 'Neueste öffentliche Umfrage';
        $lang[uj_kerdoiv_rogzitese] = 'Fügen Sie neue Umfrage';
        $lang[cim] = 'Titel';
        $lang[eredmenyek] = 'Ergebnisse';
        $lang[kitoltes] = 'Füllung';
        $lang[modositas] = 'Änderung';
        $lang[aktiv] = 'aktiv';
        $lang[kitoltottek] = 'vollendet';
        $lang[nyelvek] = 'Sprachen';
        $lang[aszf] = 'Allgemeine Geschäftsbedingungen';
        $lang[vezerlopult] = 'Schalttafel';
        $lang[radio_i] = 'Kitöltéskor csak egy válasz jelölhető be.';
}


?>
<?php

if ($_REQUEST['lang'] != ''){
	$_SESSION["lang"] = $_REQUEST[lang];
} else {
	if ($_SESSION["lang"] == ''){
		$_SESSION["lang"] = 'hu';
	}
}

$result = mysql_query("SELECT hu, en, de, ro FROM szotar");
while ($next_element = mysql_fetch_array($result)){
   $hu = $next_element['hu']; //a magyar szó
   $nyelv = $_SESSION[lang]; //milyen nyelven fut az oldal
   $lang[$hu] = $next_element[$nyelv]; //$lang[nyelvek] = $next_element[en];
}

function lang($hu, $lang){
   if (array_key_exists($hu, $lang)){
	  return $lang[$hu];
   } else {
	  return $hu;
   }
}

if ($_SESSION["lang"] == 'hu'){
    $lang[nyelv_valasztas] = 'Nyelv választás';
    $lang[magyar] = 'magyar';
    $lang[angol] = 'angol';
    $lang[nemet] = 'német'; 
    $lang[eletkor] = 'Életkor:';
	$lang['Építsd fel!'] = 'Építsd fel!';
	$lang['Terjeszd el!'] = 'Terjeszd el!';
	$lang['Arasd le!'] = 'Arasd le!';
    
    $lang[ferfi] = 'férfi';
    $lang[no] = 'nő';
    $lang[orszag] = 'Ország:';
    $lang[foglalkozas] = 'Foglalkozás:';
    $lang[mentes] = 'Mentés';
    $lang[elkuldes] = 'Elküldés';
    $lang[koszonjuk_valaszaid] = 'Köszönjük válaszaid!';
    $lang[email_bekeres] = 'Kérjük, add meg e-mail címed, ha szeretnéd megkapni a kérdőív eredményét!';
    $lang[nem_valaszoltal] = 'Az alábbi kérdésekre nem válaszoltál: ';
	$lang[nem_feldolgozhato] = 'A kérdőív az alábbi hibák miatt nem feldolgozható: ';
	$lang[email_cimed_hianyzik] = 'Email címed hiányzik!';
	$lang[nem_adta_meg_a_nemet] = 'Nem adtad meg a nemed!';
	$lang[nem_adta_meg_a_korat] = 'Nem adtad meg a korod!';
	$lang[nem_adta_meg_a_lakhelyet] = 'Nem adtad meg a lakhelyed!';
	$lang[nem_adta_meg_a_foglalkozasat] = 'Nem adtad meg a foglalkozásod!';
    
    
	$lang[kapcsolat] = 'Kapcsolat';
	$lang[az_on_email_cime] = 'Az Ön e-mail címe';
	$lang[uzenet] = 'Üzenet';
	$lang[uj_nyilvanos_kerdoivek] = 'Legfrissebb nyilvános kérdőívek';
        $lang[uj_kerdoiv_rogzitese] = 'Új kérdőív rögzítése';
        $lang[cim] = 'cím/adatlap';
        $lang[eredmenyek] = 'eredmények';
        $lang[kitoltes] = 'kitöltés nézet';
        $lang[modositas] = 'módosítás';
        $lang[aktiv] = 'aktív/ inaktív';
        $lang[kitoltottek] = 'kitöltötték';
        $lang[nyelvek] = 'nyelvek';
        $lang[aszf] = 'Használati és adatvédelmi szabályok';
        $lang[vezerlopult] = 'Vezérlőpult';
        $lang[radio_i] = 'A kitöltő csak egy választ jelölhet be.';
        $lang[select_i] = 'Kitöltéskor egy legördülő listából lehet egyet kiválasztani.';
        $lang[checkbox_i] = 'Kitöltéskor bármennyi válasz bejelölhető.';
        $lang[text_i] = 'Egy szavas vagy rövid mondatos választ kérhetünk.';
        $lang[textarea_i] = 'Hosszabb terjedelmű válasz kérésére használható.';
        $lang[ranking_i] = 'Egy vagy több válaszlehetőséget értékelhetünk 1-től 5-ig terjedő skálán.';
        $lang[uj_kerdes_rogzitese] = 'Új kérdés rögzítése';
        $lang[kerdoiv_modositasa] = 'Kérdőív módosítása';
        $lang[vissza] = 'vissza';
        $lang[vissza_a_kerdoivhez] = 'vissza a kérdőívhez';
        $lang[lathato_nyelvek] = 'Látható nyelvek:';
}

if ($_SESSION["lang"] == 'en'){
    $lang[nyelv_valasztas] = 'Select language';
    $lang[magyar] = 'Hungarian';
    $lang[angol] = 'English';
    $lang[nemet] = 'German';
    $lang[eletkor] = 'Age:';
	$lang['Építsd fel!'] = 'Build it!';
	$lang['Terjeszd el!'] = 'Propagate it!';
	$lang['Arasd le!'] = 'Reap it!';
    
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
   
	$lang[kapcsolat] = 'Contact';
	$lang[az_on_email_cime] = 'Your e-mail';
	$lang[uzenet] = 'Message';
	$lang[uj_nyilvanos_kerdoivek] = 'Newest public surveys';
        $lang[uj_kerdoiv_rogzitese] = 'Add new survey';
        $lang[cim] = 'title/datasheet';
        $lang[eredmenyek] = 'results';
        $lang[kitoltes] = 'responser view';
        $lang[modositas] = 'modification';
        $lang[aktiv] = 'active/ inactive';
        $lang[kitoltottek] = 'completed';
        $lang[nyelvek] = 'languages';
        $lang[aszf] = 'Terms and conditions';
        $lang[vezerlopult] = 'Control panel';
        $lang[radio_i] = 'The responser can mark only one answer.';
        $lang[select_i] = 'The responser can choose one answer from a drop-down list.';
        $lang[checkbox_i] = 'The responser can mark more answer.';
        $lang[text_i] = 'The responser can write a short answer.';
        $lang[textarea_i] = 'The responser can write longer answer.';
        $lang[ranking_i] = 'The responser can evaluate one or more answer from 1 to 5.';
        $lang[uj_kerdes_rogzitese] = 'Add a new question';
        $lang[kerdoiv_modositasa] = 'Survey modification';
        $lang[vissza] = 'back';
        $lang[vissza_a_kerdoivhez] = 'back to survey';
        $lang[lathato_nyelvek] = 'Visible languages:';
}

if ($_SESSION["lang"] == 'de'){
    $lang[nyelv_valasztas] = 'Sprache wählen';
    $lang[magyar] = 'ungarische';
    $lang[angol] = 'englisch';
    $lang[nemet] = 'deutsch';
    $lang[eletkor] = 'Alter:';
	$lang['Építsd fel!'] = 'Bauen!';
	$lang['Terjeszd el!'] = 'Propagieren!';
	$lang['Arasd le!'] = 'Ernte!';
    
    $lang[ferfi] = 'männlich';
    $lang[no] = 'weiblich';
    $lang[orszag] = 'Land:';
    $lang[foglalkozas] = 'Beruf:';
    $lang[mentes] = 'Sparen';
    $lang[elkuldes] = 'Sendung';
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
    
	
	$lang[kapcsolat] = 'Kontakt';
	$lang[az_on_email_cime] = 'Ihre E-Mail';
	$lang[uzenet] = 'Nachricht';
	$lang[uj_nyilvanos_kerdoivek] = 'Neueste öffentliche Umfrage';
        $lang[uj_kerdoiv_rogzitese] = 'Fügen Sie neue Umfrage';
        $lang[cim] = 'Titel/Datenblatt';
        $lang[eredmenyek] = 'Ergebnisse';
        $lang[kitoltes] = 'Füllung Blick';
        $lang[modositas] = 'Änderung';
        $lang[aktiv] = 'aktiv/ inaktiv';
        $lang[kitoltottek] = 'vollendet';
        $lang[nyelvek] = 'Sprachen';
        $lang[aszf] = 'Allgemeine Geschäftsbedingungen';
        $lang[vezerlopult] = 'Schalttafel';
        $lang[radio_i] = 'Kitöltéskor csak egy válasz jelölhető be.';
        $lang[select_i] = 'Kitöltéskor egy legördülő listából lehet egyet kiválasztani.';
        $lang[checkbox_i] = 'Kitöltéskor bármennyi válasz bejelölhető.';
        $lang[text_i] = 'Egy szavas vagy rövid mondatos választ kérhetünk.';
        $lang[textarea_i] = 'Hosszabb terjedelmű válasz kérésére használható.';
        $lang[ranking_i] = 'Egy vagy több válaszlehetőséget értékelhetünk 1-től 5-ig terjedő skálán.';
        $lang[uj_kerdes_rogzitese] = 'Anfügen neue Frage';
        $lang[kerdoiv_modositasa] = 'Umfrage Modifikation';
        $lang[vissza] = 'zurück';
        $lang[vissza_a_kerdoivhez] = 'zurück zur Umfrage';
        $lang[lathato_nyelvek] = 'Sichtbar Sprachen:';
}


?>

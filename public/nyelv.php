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
   
  
	$lang['Építsd fel!'] = 'Építsd fel!';
	$lang['Terjeszd el!'] = 'Terjeszd el!';
	$lang['Arasd le!'] = 'Arasd le!';
    
    
    $lang[mentes] = 'Mentés';
    $lang[elkuldes] = 'Elküldés';
    $lang[koszonjuk_valaszaid] = 'Köszönjük válaszaid!';
    $lang[email_bekeres] = 'Kérjük, add meg e-mail címed, ha szeretnéd megkapni a kérdőív eredményét!';
    
	$lang[nem_feldolgozhato] = 'A kérdőív az alábbi hibák miatt nem feldolgozható: ';
	
    
	$lang[kapcsolat] = 'Kapcsolat';
	$lang[az_on_email_cime] = 'Az Ön e-mail címe';
	$lang[uzenet] = 'Üzenet';
	$lang[uj_nyilvanos_kerdoivek] = 'Legfrissebb nyilvános kérdőívek';
        
        
        $lang[aszf] = 'Használati és adatvédelmi szabályok';
        $lang[vezerlopult] = 'Vezérlőpult';
        $lang[radio_i] = 'A kitöltő csak egy választ jelölhet be.';
        $lang[select_i] = 'Kitöltéskor egy legördülő listából lehet egyet kiválasztani.';
        $lang[checkbox_i] = 'Kitöltéskor bármennyi válasz bejelölhető.';
        $lang[text_i] = 'Egy szavas vagy rövid mondatos választ kérhetünk.';
        $lang[textarea_i] = 'Hosszabb terjedelmű válasz kérésére használható.';
        $lang[ranking_i] = 'Egy vagy több válaszlehetőséget értékelhetünk 1-től 5-ig terjedő skálán.';
        
       
        $lang[vissza] = 'vissza';
        $lang[vissza_a_kerdoivhez] = 'vissza a kérdőívhez';
        $lang[lathato_nyelvek] = 'Látható nyelvek:';
}

if ($_SESSION["lang"] == 'en'){
    
    
	$lang['Építsd fel!'] = 'Build it!';
	$lang['Terjeszd el!'] = 'Propagate it!';
	$lang['Arasd le!'] = 'Reap it!';
    
    
    $lang[elkuldes] = 'Submit';
    $lang[mentes] = 'Save';
    $lang[koszonjuk_valaszaid] = 'Thank you, for answers!';
    $lang[email_bekeres] = 'Please, give us your e-mail address if you want to know results of this survey!';
	
	$lang[nem_feldolgozhato] = 'We can not accept the survey because of the following defects: ';
	

        $lang[bejelentkezes] = 'Login';
   
	$lang[kapcsolat] = 'Contact';
	$lang[az_on_email_cime] = 'Your e-mail';
	$lang[uzenet] = 'Message';
	$lang[uj_nyilvanos_kerdoivek] = 'Newest public surveys';
       
        
        $lang[aszf] = 'Terms and conditions';
        $lang[vezerlopult] = 'Control panel';
        $lang[radio_i] = 'The responser can mark only one answer.';
        $lang[select_i] = 'The responser can choose one answer from a drop-down list.';
        $lang[checkbox_i] = 'The responser can mark more answer.';
        $lang[text_i] = 'The responser can write a short answer.';
        $lang[textarea_i] = 'The responser can write longer answer.';
        $lang[ranking_i] = 'The responser can evaluate one or more answer from 1 to 5.';
        
      
        $lang[vissza] = 'back';
        $lang[vissza_a_kerdoivhez] = 'back to survey';
        $lang[lathato_nyelvek] = 'Visible languages:';
}

if ($_SESSION["lang"] == 'de'){
    
   
	$lang['Építsd fel!'] = 'Bauen!';
	$lang['Terjeszd el!'] = 'Propagieren!';
	$lang['Arasd le!'] = 'Ernte!';
    
   
    $lang[mentes] = 'Sparen';
    $lang[elkuldes] = 'Sendung';
	$lang[koszonjuk_valaszaid] = 'Danke für Antworten!';
    $lang[email_bekeres] = 'Bitte, geben Sie uns Ihre E-Mail-Adresse, wenn Sie Ergebnisse dieser Umfrage wissen wollen!';
	
	$lang[nem_feldolgozhato] = 'Wir können die Umfrage aufgrund der folgenden Fehler nicht akzeptieren:';
	
	
        $lang[bejelentkezes] = 'Anmelden';
    
	
	$lang[kapcsolat] = 'Kontakt';
	$lang[az_on_email_cime] = 'Ihre E-Mail';
	$lang[uzenet] = 'Nachricht';
	$lang[uj_nyilvanos_kerdoivek] = 'Neueste öffentliche Umfrage';
        
       
        $lang[aszf] = 'Allgemeine Geschäftsbedingungen';
        $lang[vezerlopult] = 'Schalttafel';
        $lang[radio_i] = 'Kitöltéskor csak egy válasz jelölhető be.';
        $lang[select_i] = 'Kitöltéskor egy legördülő listából lehet egyet kiválasztani.';
        $lang[checkbox_i] = 'Kitöltéskor bármennyi válasz bejelölhető.';
        $lang[text_i] = 'Egy szavas vagy rövid mondatos választ kérhetünk.';
        $lang[textarea_i] = 'Hosszabb terjedelmű válasz kérésére használható.';
        $lang[ranking_i] = 'Egy vagy több válaszlehetőséget értékelhetünk 1-től 5-ig terjedő skálán.';
        
        
        $lang[vissza] = 'zurück';
        $lang[vissza_a_kerdoivhez] = 'zurück zur Umfrage';
        $lang[lathato_nyelvek] = 'Sichtbar Sprachen:';
}


?>

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
    
}

if ($_SESSION["lang"] == 'en'){
    $lang[nyelv_valasztas] = 'Select language';
    $lang[magyar] = 'hungarian';
    $lang[angol] = 'english';
}

if ($_SESSION["lang"] == 'de'){
    $lang[nyelv_valasztas] = 'Sprache wählen';
    $lang[magyar] = 'Ungarische';
    $lang[angol] = 'Englisch';
}


?>
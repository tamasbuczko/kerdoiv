<?php

#if ($_REQUEST[pub] == '1'){
$_SESSION[pub] = '1';
#}

if ($_REQUEST[pub] == '2') {
    unset($_SESSION[pub]);
}

if (!$_REQUEST[mod]) {
    $csak_aktiv = "AND status = '1'";
}

if ($_SESSION[qa_user_id]) {
    $csak_aktiv = "";
}

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


$result2 = mysql_query("SELECT authority FROM users WHERE id = '$a[1]'");
$b = mysql_fetch_array($result2);
$kerdoiv_authority = $b[0]; // a kérdőív készítőjének csomagja

if ((($kerdoiv_authority == '2') OR ( $kerdoiv_authority == '3')) AND ( $_SESSION[pub] == '1') AND ( !$_REQUEST[mod])) {
    $csak_kerdoiv = 'on'; //kikapcsolja a menüt
    $nincs_menu = 'on'; //kikapcsolja a menüt
}

require_once ('public/jogosultsag_kerdoiv.php');

if ($jogosult) {
    $tartalom = '';
    require_once('public/kerdoiv_hiba.php');
    require_once('public/kerdoiv_fejlec.php');

    $kerdes_darab = 0;
    $figyelmeztetes = 0;

    if ($kerdoiv_nyelv_bekapcs == '1') {
        require_once('public/kerdoiv_generator.php');
        require_once('public/kerdoiv_figyelmeztetesek.php');
    }

    if (($_REQUEST[submit]) AND ( $hiba == '0') AND ( $_REQUEST[b] == '1')) { //biztosan ment, megnyomta a mentés gombot
        unset($figy_uzenet);
        require_once('public/kerdoiv_mentes.php');
        //én itt átadnám a kitöltött kérdőív sorszámát vagy valamely egyedi azonosítóját, és kiírnám a főoldalon ilyenkor, hogy köszi a kitöltést. I-frames beágyazás enélkül elég butuska lenne.
        header("Location: index.php?ok=1&kerdes=" . $kerdoiv_sorszam);
    }

    if ($_REQUEST[ok] == 1) {
        $kerdes_blokk = '<div id="koszonjuk">' . $lang['koszonjuk_valaszaid'] . '</div>';
        $adat_off = 'display: none;'; //személyes adatlap kikapcsolása
    }
}

$tartalom .= $kerdes_blokk;

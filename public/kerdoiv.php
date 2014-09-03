<?php
$_SESSION[pub] = '1';

if ($_REQUEST[pub] == '2') {
    unset($_SESSION[pub]);
}

if (!$_REQUEST[mod]) {
    $csak_aktiv = "AND status = '1'";
}

if ($_SESSION[qa_user_id]) {
    $csak_aktiv = "";
}

require_once ('public/jogosultsag_kerdoiv.php');  //objektum miatt még átnézni

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

    if (($_REQUEST[submit]) AND ( $kerdoiv_obj->hiba == '0') AND ( $_REQUEST[b] == '1')) { //biztosan ment, megnyomta a mentés gombot
        unset($figy_uzenet);
        require_once('public/kerdoiv_mentes.php');
        if ($_REQUEST[i] != 1) {
            //én itt átadnám a kitöltött kérdőív sorszámát vagy valamely egyedi azonosítóját, és kiírnám a főoldalon ilyenkor, hogy köszi a kitöltést. I-frames beágyazás enélkül elég butuska lenne.
            header("Location: index.php?ok=1&kerdes=" . $kerdoiv_sorszam);
        } else {
            header("Location: index.php?p=kerdoiv&kerdoiv=7&i=1&ok=1");
        }
    }

    if ($_REQUEST[ok] == 1) {
        $kerdes_blokk = '<div id="koszonjuk">' . $lang['koszonjuk_valaszaid'] . '</div>'; // használjuk valahol???
    }
	
	$smarty->assign('kerdoiv_headline', $kerdoiv_headline);
	$smarty->assign('fejlec_szerk', $fejlec_szerk);
	$smarty->assign('control_box', $control_box);
	
	$smarty->assign('szotar', $szotar);
	$smarty->assign('kerdoiv_obj', $kerdoiv_obj);
	$smarty->assign('szemelyes_adatok', $szemelyes_adatok);
    $smarty->assign('kerdes_blokk_tomb', $kerdes_blokk_tomb);

	$tartalom .= $smarty->fetch('templates/kerdoiv.tpl');
}


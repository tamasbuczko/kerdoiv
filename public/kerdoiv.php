<?php
#$_SESSION[pub] = '1';

#if ($_REQUEST[pub] == '2') {
#    unset($_SESSION[pub]);
#}

if (!$_REQUEST[mod]) {
    $csak_aktiv = "AND status = '1'";
}

if ($_SESSION[qa_user_id]) {
    $csak_aktiv = "";
}

require_once ('public/jogosultsag_kerdoiv.php');  //objektum miatt még átnézni

if ($jogosult) {
    unset($tartalom);

    require_once('public/kerdoiv_hiba.php');
    
    if ($_REQUEST[kerdoiv]) {
        $kerdoiv_sorszam = $_REQUEST[kerdoiv];
        //kezelni, ha nincs a kért sorszámú kérdőív
    } else {
        $kerdoiv_sorszam = 1;
    }
    
    require_once('public/kerdoiv_masol.php');
    
    If (!$kerdoiv_obj->cim) {
        $tartalom = '<div id="koszonjuk">Nincs ilyen kérdőív!</div>';
    }

    $kerdes_darab = 0;
    $figyelmeztetes = 0;

    if ($kerdoiv_nyelv_bekapcs == '1') {
	   if ($_REQUEST[er] == '1'){
		require_once('public/eredmeny.php');
	   }
	   if ($_REQUEST[er] == '1'){
		  if ($jogosult_eredmeny){
			require_once('public/kerdoiv_generator.php');
		  }
	   }else{
		  require_once('public/kerdoiv_generator.php');
	   }
        require_once('public/kerdoiv_figyelmeztetesek.php');
	  
    }

    if (($_REQUEST[submit]) AND ( $kerdoiv_obj->hiba == '0') AND ( $_REQUEST[b] == '1')) { //biztosan ment, megnyomta a mentés gombot
        unset($figy_uzenet);
        unset($_SESSION[felnott]);
        require_once('public/kerdoiv_mentes.php');
        if ($_REQUEST[i] != 1) {
            //én itt átadnám a kitöltött kérdőív sorszámát vagy valamely egyedi azonosítóját, és kiírnám a főoldalon ilyenkor, hogy köszi a kitöltést. I-frames beágyazás enélkül elég butuska lenne.
            header("Location: index.php?ok=1&kerdes=" . $kerdoiv_sorszam);
        } else {
            header("Location: index.php?p=kerdoiv&kerdoiv=".$kerdoiv_sorszam."&kerdes=".$kerdoiv_sorszam."&i=1&ok=1");
        }
    }

    if ($_REQUEST[ok] == 1) {
        $kerdes_blokk = '<div id="koszonjuk">' . $lang['koszonjuk_valaszaid'] . '</div>'; // használjuk valahol???
    }
	if ($valasz_blokk_tomb){
	foreach ($valasz_blokk_tomb as $key => $value){
	   $xx = $valasz_blokk_tomb[$key][valasz_sorszam];
	   if (!$eredmenyek_tomb[$xx]['valasz_szavazatszam']){
		  $eredmenyek_tomb[$xx]['valasz_szavazatszam'] = 0;
		  $eredmenyek_tomb[$xx]['valasz_szavazatarany'] = 0;
	   }
	}
        }
	
        //a kérdéseket sorbarendezi, de a sorszámuk szerint!!! HIBA
	ksort($kerdes_blokk_tomb);
	
	$smarty->assign('szotar', $szotar);
	$smarty->assign('kerdoiv_obj', $kerdoiv_obj);
	$smarty->assign('szemelyes_adatok', $szemelyes_adatok);
	$smarty->assign('eredmenyek_tomb', $eredmenyek_tomb);
	if ($jogosult_eredmeny){
	  $smarty->assign('szuresek_lista', $szuresek_lista);
	}
    $smarty->assign('kerdes_blokk_tomb', $uj_kerdes_blokk_tomb);
	$smarty->assign('jogosult_eredmeny', $jogosult_eredmeny);
	$smarty->assign('valasz_blokk_tomb', $valasz_blokk_tomb);
        if (($_REQUEST[i] == '1') AND ($_REQUEST[ok] == '1')){
            $tartalom .= '<div class="koszonom">' . $szotar->fordit('Köszönjük, hogy kitöltötte a kérdőívet') . '</div>';
        } else {
            $tartalom .= $smarty->fetch('templates/kerdoiv.tpl');
        }
}
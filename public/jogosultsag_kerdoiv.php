<?php

if ($_REQUEST[kerdoiv]) {
    $result = mysql_query("SELECT k.sorszam, k.status, k.nyilvanos,  k.egyszerkitoltheto, k.user_id, h.user FROM kerdoivek AS k
						   LEFT JOIN kerdoiv_hozzaferes AS h ON k.sorszam = h.kerdoiv
						   WHERE k.sorszam = '$_REQUEST[kerdoiv]' ");
    $a = mysql_fetch_array($result);
} else {
    $a[user_id] = $_SESSION[qa_user_id]; //???
}

//be van-e lépve user és szerkeszteni akar
if ((!$_SESSION[qa_user_id])AND ( !$_REQUEST[mod])) {
    if ($a[status] == '1') {
        $jogosult = 1;
    } else {
        $tartalom = 'Nincs jogosultsága a kérdőív szerkesztéséhez!';
        //ez az üzenet jelenik meg az inaktív kérdőívek esetén is
    }
}

//be van-e lépve user és szerkeszteni akar
if (($_SESSION[qa_user_id])AND ( $_REQUEST[mod])) {
    if (($_SESSION[qa_user_id] == $a[user_id])OR ( $_SESSION[qa_user_id] == $a[user])) {
        $jogosult = 1;
    } else {
        $tartalom = 'Nincs jogosultsága a kérdőív szerkesztéséhez!';
    }
}


//adatlap másolása
//be van-e lépve a user és másolni akar
if (($_SESSION[qa_user_id])AND ( $_REQUEST[masol])) {
    if (($_SESSION[qa_user_id] == $a[user_id])OR ( $_SESSION[qa_user_id] == $a[user])) {
        $jogosult = 1;
    } else {
        $tartalom = 'Nincs jogosultsága a kérdőív szerkesztéséhez!';
    }
}

//be van-e lépve user és a kérdőív típusa a kérdés
//status (1-bárki, 2-, 3-), nyilvanos
if (($_SESSION[qa_user_id])AND ( !$_REQUEST[mod])AND ( !$_REQUEST[masol])AND ( $_REQUEST[p] != 'ujkerdes')AND ( $_REQUEST[p] != 'ujkerdoiv') AND ( $_REQUEST[p] != 'kerdoiv_adatlap')) {
    if ($a[status] == '1') {
        $jogosult = 1;
    } else if (($a[status] == '0') AND ($kerdoiv_obj->keszito_id != $_SESSION[qa_user_id]) AND ($kerdoiv_obj->nyilvanos == '1')){
        $tartalom = 'A kérdőív már nem aktív, így sajnos nem hozzáférhető az eredmények oldala. Ha érdekli az eredmény vegye fel a kapcsolatot velünk!';
    }    
    else {
        $tartalom = 'Nincs jogosultsága a kérdőív kitöltéséhez!';
    }
}

if (($_SESSION[qa_user_id])AND ( $_REQUEST[p] == 'ujkerdes')) {
    if (($_SESSION[qa_user_id] == $a[user_id]) OR ( $_SESSION[qa_user_id] == $a[user])) {
        $jogosult = 1;
    }
}

if (($_SESSION[qa_user_id])AND ( $_REQUEST[p] == 'ujkerdoiv')) {
    if (($_SESSION[qa_user_id] == $a[user_id]) OR ( $_SESSION[qa_user_id] == $a[user])) {
        $jogosult = 1;
    }
}

if (($_SESSION[qa_user_id])AND ( $_REQUEST[p] == 'kerdoiv_adatlap')) {
    if (($_SESSION[qa_user_id] == $a[user_id]) OR ( $_SESSION[qa_user_id] == $a[user])) {
        $jogosult = 1;
    }
}

if (($_REQUEST[kerdoiv]) AND ( $_REQUEST[er] == '1')) {
    $result = mysql_query("SELECT sorszam, status, nyilvanos, user_id FROM kerdoivek WHERE sorszam = '$_REQUEST[kerdoiv]' ");
    $a = mysql_fetch_array($result);
    if (($a[user_id] != $_SESSION['qa_user_id']) AND ( $a[nyilvanos] == '0')) {
        unset($jogosult);
        // utólagos nyilvános kikapcsnál a listában megjelenik, de nem tudja megnézni
        // és csak azok lássák, akik kitöltötték
    }
    if (($kerdoiv_obj->keszito_id != $_SESSION[qa_user_id]) AND ($kerdoiv_obj->nyilvanos == '0')){
        unset($jogosult);
        $kerdoiv_obj->jogosultsag_uzenet = 'A kérdőív eredményei már nem nyilvánosak!';
        $tartalom = 'A kérdőív eredményei már nem nyilvánosak!';
    }
	
	if (in_array($_SESSION[qa_user_id], $kerdoiv_obj->megosztott_admin)){
	   $jogosult = 1;
	}
    
}

if (($kerdoiv_obj->keszito_id == $_SESSION[qa_user_id])){
   $jogosult = 1;	
}

if ($_REQUEST[er] != '1'){
//eldöntés, hogy kell e vizsgálni kitöltést
$egyszerkitoltheto = mysql_fetch_assoc(mysql_query("SELECT `egyszerkitoltheto` FROM `kerdoivek` WHERE `sorszam`='" . $_REQUEST[kerdoiv] . "'"));

if ($egyszerkitoltheto[egyszerkitoltheto] == '1') {

    $result = mysql_query("SELECT k.sorszam, k.status, k.nyilvanos,  k.egyszerkitoltheto, k.user_id, h.user FROM kerdoivek AS k
						   LEFT JOIN kerdoiv_hozzaferes AS h ON k.sorszam = h.kerdoiv
						   WHERE k.sorszam = '$_REQUEST[kerdoiv]' ");
    $a = mysql_fetch_array($result);

    if (($_SESSION[qa_user_id] != $a[user_id])) {

//kérdőívet kitöltötte e már
        if (isset($_SESSION[qa_user_id])) {
            $meglevokitoltesek = mysql_query("SELECT * FROM `kitoltesi_naplo` WHERE `regisztralt_kitolto`='" . $_SESSION[qa_user_id] . "' AND `kerdoiv`='" . $_REQUEST[kerdoiv] . "'");
            $most = date("Y-m-d H:i:s");
            $huszonnegyoraja = strtotime(date("Y-m-d H:i:s"));
            $huszonnegyoraja = date("Y-m-d H:i:s", strtotime("-9999 day", $huszonnegyoraja));
        } else {
            $meglevokitoltesek = mysql_query("SELECT * FROM `kitoltesi_naplo` WHERE `egyeb_kitolto`='" . $_COOKIE[qasession] . "' AND `kerdoiv`='" . $_REQUEST[kerdoiv] . "'");
            $most = date("Y-m-d H:i:s");
            $huszonnegyoraja = strtotime(date("Y-m-d H:i:s"));
            $huszonnegyoraja = date("Y-m-d H:i:s", strtotime("-1 day", $huszonnegyoraja));
        }

        while ($meglevokitoltes = mysql_fetch_assoc($meglevokitoltesek)) {
            if ($meglevokitoltes[idopont] > $huszonnegyoraja) {
                //Ezt majd szóráttal kell kiíratni de nem éri el a $szotár osztályt
                //$tartalom = $szotar->fordit('A kérdőívet naponta csak egyszer töltheted ki.'); 
                $tartalom = 'A kérdőívet csak egyszer töltheted ki.';
                unset($jogosult);
            }
        }
    }
}
}

if (($kerdoiv_obj->authority == '1') AND ($_REQUEST[i])){
    $tartalom = 'A kérdőív beágyazásához nincs jogosultsága!<br />'
            . '<a href="http://questionaction.com/?p=csomagok" target="_blank">Csomagváltási lehetőség</a>';
    unset($jogosult);
    $kerdoiv_obj->csak_kerdoiv = 'on';
}

if ($_SESSION[qa_user_id]){
    $result = mysql_query("SELECT sorszam FROM kitoltesi_naplo WHERE regisztralt_kitolto = '$_SESSION[qa_user_id]' AND kerdoiv = '$kerdoiv_obj->sorszam'");
    $kitoltotte = mysql_fetch_array($result);
    if (($kitoltotte[0]) AND ($kerdoiv_obj->nyilvanos == '1')){
        $jogosult_eredmeny = 1;
    }
    
    if ($kerdoiv_obj->megosztott_admin){
    if (in_array($_SESSION[qa_user_id], $kerdoiv_obj->megosztott_admin)){
        $jogosult_eredmeny = 1;
    }
    }
    
    if ($kerdoiv_obj->keszito_id == $_SESSION[qa_user_id]){
        $jogosult_eredmeny = 1;
    }
}

if (in_array($_SESSION[qa_user_id], $kerdoiv_obj->megosztott_admin)){
	   $jogosult = 1;
}
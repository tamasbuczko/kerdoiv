<?php//munkamenetkezelés bekapcsolásasession_start();//cookie beillesztés napi azonosításraif (empty($_COOKIE[qasession])) {    $azonosito = rand(10000000, 99999999);    setcookie("qasession", $azonosito, time() + 86400);}//néhány rendszerállandó beállításarequire_once('parameters.php');//osztályok betöltése az objektumokhozrequire_once('class/class.php');//funkciók betöltéserequire_once('functions.php');//Smarty sablonkezelő betöltéserequire_once('smarty.php');$smarty = new Smarty();//kapcsolat létrehozása az adatbázis szerverrel (class.php)$adatkapcsolat = new data_connect;  //példányosítjuk az objektumot$adatkapcsolat->connect();          //az objektum connect fügvényét futatjuk//logolás bekapcsolása$log = new log_db;$log->write('x', 'Futás indul...');//fejlesztés alatti sql szinkronizációkrequire_once('sql_commands.php');//látogató beléptetése, illetve állapotvizsgálat$user = new user;$user->login();//nyelvi változatok kezelése, csak a lang tömböt használó sablonok miattinclude('public/nyelv.php');//szótár objektum betöltése$szotar = new szotar;//az oldal alap változóinak betöltése$page = new page;//a megjelenített tartalom elágazásainak kezeléserequire_once('public/tartalomvalasztas.php');if ($_REQUEST[reg]) {    $_SESSION[messagetodiv] = '<p>' . $szotar->fordit('Regisztrációd sikeres!') . '</p><ul><li>' . $szotar->fordit('E-mailes aktiválás szükséges!') . '</li></ul>';}//if (is_numeric($_GET[kerdes])) {//    $_SESSION[messagetodiv] = '<p>' . $szotar->fordit('Köszönjük, hogy kitöltötte a kérdőívet') . '</p>';//}if ($_SESSION[messagetodiv]) {    $hibauzenet = $_SESSION[messagetodiv];    unset($_SESSION[messagetodiv]);}//slider összeállításarequire_once('public/slider.php');//nyelvváltáshoz$url_params = explode('?', $_SERVER['REQUEST_URI']);$url_param = '&' . $url_params[1];if ($_REQUEST['lang'] != '') {    $url_param_x = str_replace("&lang=" . $_REQUEST['lang'], "", $url_param); //kitöröljük a nyelvi paramétert az url-ből    $url_param_x = substr($url_param_x, 1); //első karaktert levágjuk    $url_param_x = '?' . $url_param_x;    header("Location: " . $url_param_x);}if ($_REQUEST[er] != '1') { //felejtse el a szűrést, ha nem az eredmény oldal az aktív    unset($_SESSION['szures']);    unset($_SESSION['szures2']);}if ($_REQUEST[f] == '1'){    $_SESSION[felnott] = '1';  //felnőtt a user (esetleg kérdőívszámhoz kötni a session-t)}if (($_REQUEST[i] == '1') AND ($_REQUEST[ok] == '1')){   $hibauzenet = '<p>A teszt kitöltése sikeres!</p>';}if ($_REQUEST[kerdoiv] == ''){    unset($_SESSION[felnott]);}$menu_obj = new menu_cikkek;$menu_obj->mysql_read($_SESSION["lang"]);$menu = $menu_obj->html_code;//a teljes oldaltemplate-et feltöltjük és kiiratjuk a böngészőnek(index.html)$smarty->assign('tartalom', $tartalom);$smarty->assign('popup_tartalom', $popup_tartalom);$smarty->assign('slider', $slider);$smarty->assign('kerdoiv_obj', $kerdoiv_obj);$smarty->assign('hibauzenet', $hibauzenet);$smarty->assign('figy_uzenet', $figy_uzenet);$smarty->assign('menu', $menu);$smarty->assign('url_param', $url_param);$smarty->assign('page', $page);$smarty->assign('szotar', $szotar);if ($_REQUEST[pity] == '1'){    $smarty->display('templates/index_zart.tpl');} else {   $smarty->display('templates/index.tpl'); }
<?php
if ($nincs_menu != 'on'){
$menu_obj = new menu_cikkek;
$menu_obj->mysql_read($_SESSION["lang"]);
$menu = $menu_obj->html_code;
}

#echo 'x'. $_SERVER['REMOTE_ADDR'];
#echo 'x'. $_SERVER['HTTP_USER_AGENT'];
#echo 'x'.gethostname();

$vissza_linkx = $_SERVER['HTTP_REFERER'];
$vissza_linkx = explode('?', $vissza_linkx);

if (($_REQUEST[p] == 'kerdoiv') AND ($_SESSION[pub] == '1') AND ($_REQUEST[mod] !='1')){
    $vissza = '<a href="?'.$vissza_linkx[1].'" class="visszax">vissza</a>';
}

if ($_SESSION["sessfelhasznalo"]){
    $user_nick = '<div id="user_box">'.$lang["Bejelentkezve"].':<a href="?p=profil" alt="profil" title="profil">'.$_SESSION["sessfelhasznalo"].'</a><a href="?logout=1">'.$lang["Kijelentkezés"].'</a>'.$vissza.'</div>';
}

$smarty->assign('lang', $lang);
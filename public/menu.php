<?php
if ($nincs_menu != 'on'){
$menu_obj = new menu_cikkek;
$menu_obj->mysql_read($_SESSION["lang"]);
$menu = $menu_obj->html_code;
}

if ($_SESSION["sessfelhasznalo"]){
    $user_nick = '<div id="user_box">'.$lang["Bejelentkezve"].':<a href="?p=profil" alt="profil" title="profil">'.$_SESSION["sessfelhasznalo"].'</a><a href="?logout=1">'.$lang["Kijelentkezés"].'</a></div>';
}

$smarty->assign('lang', $lang);
<?php
$menu_obj = new menu_cikkek;
$menu_obj->mysql_read($_SESSION["lang"]);
$menu = $menu_obj->html_code;

if ($_SESSION["sessfelhasznalo"]){
    $user_nick = '<div id="user_box"><span>Bejelentkezve: '.$_SESSION["sessfelhasznalo"].'</span><a href="?logout=1">Kijelentkezés</a></div>';
}
?>
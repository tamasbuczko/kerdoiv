<?php
if ($nincs_menu != 'on'){
    $menu_obj = new menu_cikkek;
    $menu_obj->mysql_read($_SESSION["lang"]);
    $menu = $menu_obj->html_code;
}

#echo 'x'. $_SERVER['REMOTE_ADDR'];
#echo 'x'. $_SERVER['HTTP_USER_AGENT'];
#echo 'x'.gethostname();

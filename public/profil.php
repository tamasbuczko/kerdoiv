<?php

if ($_REQUEST[submit]){
   $query = mysql_query("UPDATE users SET email='$_REQUEST[email_mod]', authority='$_REQUEST[csomag_mod]' WHERE id = '$_SESSION[qa_user_id]'");
   mysql_query($query);
   $user->email = $_REQUEST[email_mod];
   $user->jog = $_REQUEST[csomag_mod]; //tesztidő után törölni
}

$smarty->assign('lang', $lang);
$smarty->assign('user', $user);
$tartalom = $smarty->fetch('templates/profil.tpl').$fizetes_form;
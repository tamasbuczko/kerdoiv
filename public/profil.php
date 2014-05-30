<?php

if ($_REQUEST[submit]){
   $query = mysql_query("UPDATE users SET email='$_REQUEST[email_mod]' WHERE id = '$_SESSION[qa_user_id]'");
   mysql_query($query);
}

$smarty->assign('lang', $lang);
$smarty->assign('user', $user);
$tartalom = $smarty->fetch('templates/profil.tpl').$fizetes_form;


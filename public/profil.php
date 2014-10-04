<?php

if ($_REQUEST[submit_profil]){
   $query = mysql_query("UPDATE users SET email='$_REQUEST[email_mod]', authority='$_REQUEST[csomag_mod]' WHERE id = '$_SESSION[qa_user_id]'");
   mysql_query($query);
   $user->email = $_REQUEST[email_mod];
   $user->jog = $_REQUEST[csomag_mod]; //tesztidő után törölni
   
   $jel = mysql_real_escape_string($_REQUEST['jelszo_regi']);
   $jel = md5($jel);
   $result = mysql_query("SELECT id, nick, password FROM users WHERE id = '$_SESSION[qa_user_id]' AND password = '$jel'");	
   $s = mysql_fetch_row($result);
   if ($s[0]){
       $uj_jelszo = md5($_REQUEST[jelszo1_mod]);
       $query = mysql_query("UPDATE users SET password='$uj_jelszo' WHERE id = '$_SESSION[qa_user_id]'");
       $uzenet = 'Jelszavadat sikeresen megváltoztattad!';
   }
}
$smarty->assign('szotar', $szotar);
$smarty->assign('lang', $lang);
$smarty->assign('user', $user);
$smarty->assign('uzenet', $uzenet);
$tartalom = $smarty->fetch('templates/profil.tpl').$fizetes_form;
<?php
if ($_REQUEST[send]){
   $email = $_REQUEST[email];
   
   $result = mysql_query("SELECT id, nick, authority, email, aktivalo_link FROM users WHERE email = '$email'");	
   $s = mysql_fetch_array($result);
   
   if ($s[3]){
	  $chars="abcdefhjkmnpqrstuxy345789";
	  $uj_jelszo="";
	  for ($i=0;$i<10;$i++){
		$rand=rand(0,strlen($chars)-1);
		$uj_jelszo.=$chars[$rand];
	  }
	  $x_email = $s[3];
	  $message_bevezeto = 'Kedves Felhasználó!<br/><br/>
					
					Felhasználói azonosítód:<br/>
					'.$s[1].'<br/><br/>
					Az új ideiglenes jelszavad:<br/>
					' . $uj_jelszo .'<br/><br/><br/>
					
					Bejelentkezés után a jelszót megváltoztathatod.

					Amennyiben kérdésed van kérjük írj az info@questionaction.com címre.<br/><br/>
					
					A bejelentkezéshez kattints: <a href="http://www.questionaction.com">http://www.questionaction.com</a><br/><br/>
					
					Üdvözlettel: a QuestionAction.com csapata';
		
		$uj_jelszo_md5 = md5($uj_jelszo);
		$subject = 'questionaction.com - új jelszó igénylése';
		$s_from = 'info@questionaction.com';
		$s_feladnev = 'questionaction.com';
		$to2x = $x_email;
		$message = $message_bevezeto . $message_hirek;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: '.$s_feladnev.'<'.$s_from.'>' . "\r\n" .
			'Reply-To: '.$s_from.'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		#mail($to, $subject, $message, $headers);
		
		$query = "UPDATE users SET password = '$uj_jelszo_md5' WHERE email = '$email'";
		mysql_query($query);
		
		mail($to2x, $subject, $message, $headers);
		$_SESSION[messagetodiv] = '<p>Figyelem!</p><ul><li>Új jelszavad elküldtük a megadott email címre!</li></ul>';
   } else {
	  $_SESSION[messagetodiv] = '<p>Figyelem!</p><ul><li>Nincs ilyen regisztrált e-mail cím!</li></ul>';
   }
   
}
$smarty->assign('lang', $lang);
$smarty->assign('szotar', $szotar);
$tartalom = $smarty->fetch('templates/elfelejtett.tpl');
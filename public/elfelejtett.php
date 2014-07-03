<?php
if ($_REQUEST[send]){
   $chars="abcdefhjkmnpqrstuxy345789";
   $uj_jelszo="";
   for ($i=0;$i<10;$i++){
	 $rand=rand(0,strlen($chars)-1);
	 $uj_jelszo.=$chars[$rand];
   }
   
   $message_bevezeto = 'Kedves Felhasználó!<br/><br/>
					
					Az új ideiglenes jelszavad:<br/><br/>
					' . $uj_jelszo .'<br/><br/><br/>
					
					Bejelentkezés után a jelszót megváltoztathatod.

					Amennyiben kérdése van kérjük írjon az info@questionaction.com címre.<br/><br/>
					
					A bejelentkezéshez kattintson: <a href="http://www.questionaction.com">http://www.questionaction.com</a><br/><br/>
					
					Üdvözlettel: a QuestionAction.com csapata';

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
		mail($to2x, $subject, $message, $headers);
   
}
$smarty->assign('lang', $lang);
$tartalom = $smarty->fetch('templates/elfelejtett.tpl');
<?php
if ($_REQUEST[uzenet]){
   $figy_uzenet = 'Üzeneted köszönjük, hamarosan válaszolunk!';
   
   $message_bevezeto = 'Questionaction üzenet!<br/><br/>
					
					Küldő email címe:<br/>' . $_REQUEST[email] .'<br/><br/>
					Üzenet:<br/>' . $_REQUEST[uzenet] . '<br/><br/>
					';

		$subject = 'questionaction.com - kapcsolat üzenet';
		$s_from = 'info@questionaction.com';
		$s_feladnev = 'questionaction.com';
		$to2x = 'info@questionaction.com';
		$message = $message_bevezeto;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: '.$s_feladnev.'<'.$s_from.'>' . "\r\n" .
			'Reply-To: '.$s_from.'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		mail($to2x, $subject, $message, $headers);
   
}

$smarty->assign('lang', $lang);
$smarty->assign('szotar', $szotar);
$tartalom = $smarty->fetch('templates/kapcsolat.tpl');
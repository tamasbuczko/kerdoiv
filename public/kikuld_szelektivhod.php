<?php
if (($kerdoiv_obj->sorszam == '63') OR ($kerdoiv_obj->sorszam == '64') OR ($kerdoiv_obj->sorszam == '65') OR ($kerdoiv_obj->sorszam == '68') OR ($kerdoiv_obj->sorszam == '69') OR ($kerdoiv_obj->sorszam == '70') OR ($kerdoiv_obj->sorszam == '75') OR ($kerdoiv_obj->sorszam == '76') OR ($kerdoiv_obj->sorszam == '77')){
$message_bevezeto = '
   Kérdőív: '.$kerdoiv_obj->cim.'<br /><br />
   Email: '.$_REQUEST[email].'<br />
   Csoport neve: '.$_REQUEST[csoport_neve].'<br />
   Iskola: '.$_REQUEST[iskola].'<br />
   Osztály: '.$_REQUEST[osztaly].'<br />
   Csapattag 1.: '.$_REQUEST[csapattag_1].'<br />
   Csapattag 2.: '.$_REQUEST[csapattag_2].'<br />
   Csapattag 3.: '.$_REQUEST[csapattag_3].'<br />
	  <br />
   Válaszok: '.$teszt_kerdes_darab_helyes.'/'.$teszt_kerdes_darab.'
   <br />'. $szelektivhod_email;

		$subject = 'szelektivhod.hu - tesztlap kitöltés';
		$s_from = 'info@questionaction.com';
		$s_feladnev = 'questionaction.com';
		$to1 = 'molnarzoli82@gmail.com';
		$to2 = 'kvizjatek@szelektivhod.hu';
		$to3 = 'zoldvasarhely@hodmezovasarhely.hu';
		$message = $message_bevezeto . $message_hirek;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: '.$s_feladnev.'<'.$s_from.'>' . "\r\n" .
			'Reply-To: '.$s_from.'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		#mail($to, $subject, $message, $headers);
		mail($to1, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
		mail($to2, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
		mail($to3, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
}
<?php

if ($_REQUEST[submit_reg]){
   $query = mysql_query("UPDATE users SET authority='$_REQUEST[csomag_mod]' WHERE id = '$_SESSION[qa_user_id]'");
   mysql_query($query);
   $user->login();
   //$user->jog = $_REQUEST[csomag_mod]; //tesztidő után törölni
}

$hiba= 0;
//új regisztrált rögzítése
if ($_REQUEST[send]){
	$x_azonosito = $_REQUEST[reg_azonosito];
	$x_email = $_REQUEST[email];
	$x_jelszo = $_REQUEST[jelszo];
	$x_jelszo2 = $_REQUEST[jelszo2];
        $x_csomag = $_REQUEST[csomag];
	
	if ($x_jelszo == $x_jelszo2){
	  $result = mysql_query("SELECT id FROM users WHERE nick = '$x_azonosito'");
	  $meglevo = mysql_fetch_array($result);
          
	  if ($meglevo[0]){
		 $_SESSION[popup_tartalom] = 'A megadott felhasználónév már foglalt!';
		 $hiba++;
                 $hiba_uzenetek[$hiba] = 'A megadott felhasználónév már foglalt!';	
	  }
	  $result = mysql_query("SELECT id FROM users WHERE email = '$x_email'");
	  $meglevo = mysql_fetch_array($result);
	  if ($meglevo[0]){
		 $_SESSION[popup_tartalom] = 'A megadott email címmel már történt regisztráció!<br /> Ha elfelejtette jelszavát, kérjen új jelszót!';
		 $hiba++;
		 $hiba_uzenetek[$hiba] = 'A megadott email címmel már történt regisztráció!';
	  }
	  if ($hiba == 0){
		 
		 $chars="abcdefhjkmnpqrstuxy345789";
		 $aktivalo_link="";
		 for ($i=0;$i<10;$i++){
			 $rand=rand(0,strlen($chars)-1);
			 $aktivalo_link.=$chars[$rand];
		 }
              
		 $result = mysql_query("SELECT MAX(id) FROM users");
		 $row = mysql_fetch_array($result); 
		 $max_id=$row[0];
		 $max_id++;
		 $md_jelszo = md5($x_jelszo);	
		 $sql = "INSERT INTO users 
		 (id, nick, password, email, authority, status, aktivalo_link)
		 VALUES
		 ('$max_id', '$x_azonosito', '$md_jelszo', '$x_email', '$x_csomag', '0', '$aktivalo_link')";
		 mysql_query($sql);
		 $_SESSION[popup_tartalom] = 'Sikeres regisztráció!';
		 
		 $message_bevezeto = 'Kedves Látogató!<br/><br/>
					
					Köszönjük, hogy regisztrált a www.questionaction.com weboldalon.<br/><br/>
					
					Az Ön azonosítója: ' . $x_azonosito .'<br/>
					Az Ön jelszava: ' . $_REQUEST[jelszo] . '<br/><br/>
					
					Az alábbi linkre kattintva, vagy azt böngészőjébe másolva tudja aktiválni regisztrációját:<br />
					<a href="http://questionaction.com/?p=aktivalas&link='.$aktivalo_link.'">http://questionaction.com/?p=aktivalas&link='.$aktivalo_link.'</a><br /><br />
					
					Amennyiben kérdése van kérjük írjon az info@questionaction.com címre.<br/><br/>
					
					A bejelentkezéshez kattintson: <a href="http://www.questionaction.com">http://www.questionaction.com</a><br/><br/>
					
					Üdvözlettel: a QuestionAction.com csapata';

		$subject = 'questionaction.com - regisztráció';
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
		mail($to2x, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
		 
		 header("Location: index.php?reg=1");
	  }
	} else {
	   
            

	}
}

if ($hiba>0){
    foreach($hiba_uzenetek as $key => $value){
        $hibauzenet .= '- '. $value. '<br />';
    }
    $hibauzenet = '<h3>'.$lang['nem_feldolgozhato'].'</h3>'.$hibauzenet;
}
$array = array( 'tartalom'       => $tartalom,
                'regisztracio'   => $lang[regisztracio],
		'azonosito'       => $lang[azonosito],
		'email'       => $lang[email],
		'jelszo'       => $lang[jelszo],
		'jelszo_megegyszer' => $lang[jelszo_megegyszer],
		'ingyenes' => $lang[ingyenes],
		'ezust_csomag' => $lang[ezust_csomag],
                'arany_csomag' => $lang[arany_csomag],
                'figy_uzenet'   => $figy_uzenet);

$oldal = new html_blokk;

$smarty->assign('lang', $lang);
$smarty->assign('szotar', $szotar);
$smarty->assign('tartalom', $tartalom);
$smarty->assign('figy_uzenet', $figy_uzenet);
$smarty->assign('user', $user);
$tartalom = $smarty->fetch('templates/csomag_leiras.tpl');

?>
<?php

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
              
		 $result = mysql_query("SELECT MAX(id) FROM users");
		 $row = mysql_fetch_array($result); 
		 $max_id=$row[0];
		 $max_id++;
		 $md_jelszo = md5($x_jelszo);	
		 $sql = "INSERT INTO users 
		 (id, nick, password, email, authority, status)
		 VALUES
		 ('$max_id', '$x_azonosito', '$md_jelszo', '$x_email', '$x_csomag', '0')";
		 mysql_query($sql);
		 $_SESSION[popup_tartalom] = 'Sikeres regisztráció!';
		 
		 $message_bevezeto = 'Kedves Látogató!<br/><br/>
					
					Köszönjük, hogy regisztrált a www.questionaction.com weboldalon.<br/><br/>
					
					Az Ön azonosítója: ' . $x_azonosito .'<br/>
					Az jelszava: ' . $_REQUEST[jelszo] . '<br/><br/>
					
					
					Amennyiben kérdése van kérjük írjon az info@homeup.eu címre.<br/><br/>
					
					A bejelentkezéshez kattintson: <a href="http://www.questionaction.com">http://www.questionaction.com</a><br/><br/>
					
					Üdvözlettel: a homeup.eu csapata';

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
		mail($to2x, $subject, $message, $headers);
		 
		 header("Location: index.php");
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

if ($_SESSION["sessfelhasznalo"]){
    $oldal->load_template_file("templates/regisztracio2.html",$array);
} else {
    $oldal->load_template_file("templates/regisztracio.html",$array);
}

$tartalom = $oldal->html_code;

?>
<?php
if ($_REQUEST[submit]){
    foreach($kerdesek as $key => $value){
        if ($kerdesek[$key] != '0'){ 
            $figy_uzenet .= $value.', ';  //ha a kérdésre nincs válasz, akkor feljegyezzük
	}
    }
          
    if ($figy_uzenet){
	$figy_uzenet = substr($figy_uzenet, 0, -2); //eltávolítjuk az utolsó két karaktert
	$figy_uzenet = '<h3><br />'.$lang['nem_valaszoltal'].'</h3>'.$figy_uzenet;
    }
          
    if ((!$_REQUEST[email]) AND (!$_REQUEST[ok])){
        $figy_uzenet .= '<br /><br />'.$lang['email_cimed_hianyzik'];
    }
}

if (!$figy_uzenet){
    $_REQUEST['b'] = '1';
}
?>
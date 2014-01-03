<?php
if (($_REQUEST[submit]) AND (!$_REQUEST[email]) AND (!$_REQUEST[ok])){
   $figyelmeztetes++;
   $figyelmeztetes_uzenetek[$figyelmeztetes] = '<br /><br />'.$lang['email_cimed_hianyzik'];
}

if ($figyelmeztetes > 0){
   if ($_REQUEST[submit]){
	  foreach($kerdesek as $key => $value){
		 if ($kerdesek[$key] == '0'){ 
		 $figy_uzenet .= $key.', ';
		 }
	  }
	  if ($figy_uzenet){
		$figy_uzenet = substr($figy_uzenet, 0, -2);
		$figy_uzenet = '<h3><br />'.$lang['nem_valaszoltal'].'</h3>'.$figy_uzenet;
	  }
   }
}
else {
   $_REQUEST['b'] = '1';
}

if (!$figy_uzenet){
    $_REQUEST['b'] = '1';
}

?>
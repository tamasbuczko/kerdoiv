<?php
$hiba = 0;
if ($_REQUEST[submit]){ //űrlap elküldésének vizsgálata(személyes adatok)
    $email = mysql_real_escape_string($_REQUEST[email]);
    $foglalkozas = mysql_real_escape_string($_REQUEST[foglalkozas]);
    
    if ($_REQUEST[neme] == 'x'){
        $hiba++;
        $hiba_uzenetek[$hiba] = lang('Nem adtad meg a nemed!',$lang);
        //$tomb[1] = 'első elem';
        //$tomb[2] = 'második elem';
    } else {
        //
        $request_neme_value = '<option value="'.$_REQUEST[neme].'" selected="selected">'.$_REQUEST[neme].'</option>';
    }
    
    if ($_REQUEST[eletkora] == 'x'){
        $hiba++;
        $hiba_uzenetek[$hiba] = lang('Nem adtad meg a korod!',$lang);
    } else {
        $request_eletkora_value = '<option value="'.$_REQUEST[eletkora].'" selected="selected">'.$_REQUEST[eletkora].'</option>';
    }
    
    if ($_REQUEST[lakhely] == 'x'){
        $hiba++;
        $hiba_uzenetek[$hiba] = lang('Nem adtad meg a lakhelyed!',$lang);
    }
    
    if ($_REQUEST[foglalkozas] == 'x'){
        $hiba++;
        #$hiba_uzenetek[$hiba] = $lang['nem_adta_meg_a_foglalkozasat'];
		$hiba_uzenetek[$hiba] = lang('Nem adtad meg a foglalkozásod!', $lang);
    }
	
	if ($_REQUEST[vegzettseg] == 'x'){
        $hiba++;
        $hiba_uzenetek[$hiba] = lang('Nem adtad meg a vegzettséged!', $lang);
    }
	
	if ($_REQUEST[csaladiallapot] == 'x'){
        $hiba++;
        #$hiba_uzenetek[$hiba] = $lang['Nem adtad meg a családi állapotod!'];
		$hiba_uzenetek[$hiba] = lang('Nem adtad meg a családi állapotod!', $lang);
    }
	
	if ($_REQUEST[jovedelmek] == 'x'){
        $hiba++;
        $hiba_uzenetek[$hiba] = lang('Nem adtad meg a jövedelmed!', $lang);
    }
        
    $request_foglalkozas_value = $_REQUEST[foglalkozas];
    $request_email_value = $_REQUEST[email];
}

if ($hiba > 0){
    foreach($hiba_uzenetek as $key => $value){
        $hibauzenet .= '- '. $value. '<br />';
    }
    $hibauzenet = '<h3>'.$lang['nem_feldolgozhato'].'</h3>'.$hibauzenet;
}
$smarty->assign('lang', $lang);
?>
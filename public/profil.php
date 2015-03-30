<?php

if ($_REQUEST[submit_profil]){
   $query = mysql_query("UPDATE users SET email='$_REQUEST[email_mod]', authority='$_REQUEST[csomag_mod]', cegnev='$_REQUEST[cegnev_mod]', cegcim='$_REQUEST[cegcim_mod]', kapcsnev='$_REQUEST[nev_mod]', telefon='$_REQUEST[telefon_mod]', cegemail='$_REQUEST[cegemail_mod]' WHERE id = '$_SESSION[qa_user_id]'");
   mysql_query($query);
   $user->email = $_REQUEST[email_mod];
   $user->login();
   //$user->jog = $_REQUEST[csomag_mod]; //tesztidő után törölni
   
   $jel = mysql_real_escape_string($_REQUEST['jelszo_regi']);
   $jel = md5($jel);
   $result = mysql_query("SELECT id, nick, password FROM users WHERE id = '$_SESSION[qa_user_id]' AND password = '$jel'");	
   $s = mysql_fetch_row($result);
   if ($s[0]){
       $uj_jelszo = md5($_REQUEST[jelszo1_mod]);
       $query = mysql_query("UPDATE users SET password='$uj_jelszo' WHERE id = '$_SESSION[qa_user_id]'");
       $uzenet = 'Jelszavadat sikeresen megváltoztattad!';
   }
   
   //megnézni, hogy megváltozott e a csomag típusa,
   //ha igen, akkor fizetesek táblát is módosítani
   
   //p=5-ről (csomagok) is ide irányítani a form-ot
   
}

$result = mysql_query("SELECT id,idopont, lejarat, osszeg, csomag, status_fizetett FROM fizetesek WHERE user_id = '$_SESSION[qa_user_id]'");
$sorszam = 1;
while ($row = mysql_fetch_array($result)){
    $fizetesek[$sorszam][sorszam] = $sorszam;
    $fizetesek[$sorszam][id] = $row[id];     
    $fizetesek[$sorszam][idopont] =  substr($row[idopont], 0,-9);
    $fizetesek[$sorszam][lejarat] = $row[lejarat];     
    $fizetesek[$sorszam][osszeg] = $row[osszeg];
    $fizetesek[$sorszam][status_fizetett] = $row[status_fizetett];
    $fizetesek[$sorszam][csomag] = $row[csomag];  
    
    //paypal fizetéshez adatok 
    //https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/formbasics/
    if ($row[status_fizetett] == '0'){
        $_SESSION[paypal_fizetes_id] = $row[id];
    }
    
    $sorszam++;
}




$smarty->assign('szotar', $szotar);
$smarty->assign('lang', $lang);
$smarty->assign('user', $user);
$smarty->assign('uzenet', $uzenet);
$smarty->assign('fizetesek', $fizetesek);
$smarty->assign('sorszam', $sorszam);
$tartalom = $smarty->fetch('templates/profil.tpl').$fizetes_form;


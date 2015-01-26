<?php
if ($_SESSION[qa_user_id] == $kerdoiv_obj->keszito_id){

$kerdoiv= $_REQUEST[kerdoiv];

if ($_REQUEST[masol]){
    $result2 = mysql_query("SELECT DISTINCT va.kitolto_sorszam, k.email FROM valaszadasok AS va
                       LEFT JOIN kitoltok AS k ON va.kitolto_sorszam = k.sorszam
                       WHERE va.kerdoiv_sorszam = '$kerdoiv'");
while ($row = mysql_fetch_array($result2)){
    $email_cim = $row[email];

    $sql = "INSERT INTO zart_email (email,kerdoiv) 
           VALUES ('$email_cim', '$kerdoiv')";
   mysql_query($sql); //futtatás
}
}

$zart_rendszerbe_masol = '<form method="post" action="" style="margin-bottom:20px;">				
			<input type="submit" name="masol" value="E-mailek másolása a zárt rendszerbe">
                        </form>';

$sorok = 0;
$result = mysql_query("SELECT DISTINCT va.kitolto_sorszam, k.email FROM valaszadasok AS va
                       LEFT JOIN kitoltok AS k ON va.kitolto_sorszam = k.sorszam
                       WHERE va.kerdoiv_sorszam = '$kerdoiv'");
while ($row = mysql_fetch_array($result)){
    $sorok++;
    $lista .= '<a href="?p=kerdoiv&kerdoiv='.$kerdoiv.'&er=1&kitolto='.$row[kitolto_sorszam].'">'.$sorok.'. '.$row[email].'</a><br />';
}
}
$tartalom='Kitöltők válaszai: <br />' .$zart_rendszerbe_masol. $lista;
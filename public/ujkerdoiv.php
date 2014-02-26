<?php

if ($_REQUEST[mentes]){
    $result = mysql_query("SELECT MAX(sorszam) FROM kerdoivek");
    $a = mysql_fetch_row($result);
    $max_kerdoiv_sorszam = $a[0];
    $max_kerdoiv_sorszam++;
    
    $sql = "INSERT INTO kerdoivek (sorszam, cim_hu, leiras_hu, status, user_id)
            VALUES
            ('$max_kerdoiv_sorszam', '$_REQUEST[cim]', '$_REQUEST[leiras]', '1', '$_SESSION[qa_user_id]')";
    mysql_query($sql);
    
    $sql = "INSERT INTO kerdesek (kerdoiv_sorszam, kerdes_hu, status, sorrend)
		   VALUES
		   ('$max_kerdoiv_sorszam', 'Új kérdés', '1', '')";
   mysql_query($sql);
    
    header("Location: ?p=kerdoiv&mod=1&kerdoiv=".$max_kerdoiv_sorszam);
}

$array = array( 'tartalom'       => $tartalom,
                'figy_uzenet'   => $figy_uzenet);

$oldal = new html_blokk;
$oldal->load_template_file("templates/ujkerdoiv.html",$array);
$tartalom = $oldal->html_code;

?>
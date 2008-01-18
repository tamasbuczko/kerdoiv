<?php

if ($_SESSION[qa_user_id] == $kerdoiv_obj->keszito_id) {

    $kerdoiv = $_REQUEST[kerdoiv];
    $status = 1;
    if ($_REQUEST[masol]) {
        $result2 = mysql_query("SELECT DISTINCT va.kitolto_sorszam, k.email, k.nev, k.cegnev FROM valaszadasok AS va
                       LEFT JOIN kitoltok AS k ON va.kitolto_sorszam = k.sorszam
                       WHERE va.kerdoiv_sorszam = '$kerdoiv' AND k.email != ''");
        while ($row = mysql_fetch_array($result2)) {
            $email_cim = $row[email];
            $nev = $row[nev];
            $cegnev = $row[cegnev];

            $result4 = mysql_query("SELECT email, kerdoiv FROM zart_emailek WHERE (email = '$email_cim' AND kerdoiv = '$_REQUEST[kerdoiv_szam]')");
            $talalat = mysql_fetch_array($result4);
            if (!$talalat[0]) {      //ellenőriz, hogy van e már ilyen e-mail. Ha nincs csak akkor írja be az adatbáisba.
                $sql = "INSERT INTO zart_emailek (email, kerdoiv, status, nev, cegnev) 
           VALUES ('$email_cim', '$_REQUEST[kerdoiv_szam]', '$status', '$nev', '$cegnev')";
                mysql_query($sql); //futtatás   
            }
        }
    }

    $sorok = 0;
    $result = mysql_query("SELECT DISTINCT va.kitolto_sorszam, k.email, k.nev, k.cegnev FROM valaszadasok AS va
                       LEFT JOIN kitoltok AS k ON va.kitolto_sorszam = k.sorszam
                       WHERE va.kerdoiv_sorszam = '$kerdoiv'");
    
    $nevek = ' - ';
    
    while ($row = mysql_fetch_array($result)) {
        $sorok++;
        $osszpontszam = pontszam($kerdoiv, $row[kitolto_sorszam]);
        $pontkategoria = pontkategoria($kerdoiv, $osszpontszam);
        $nev = $row[nev];
        $cegnev = $row[cegnev];
        if ($nev AND ! $cegnev) {
            $nevek = $nev . ' - ';
        }
        if (!$nev AND $cegnev) {
            $nevek = $cegnev . ' - ';
        }
        if ($nev AND $cegnev) {
            $nevek = $nev . ' - ' . $cegnev . ' - ';
        }
        $lista .= '<a href="?p=kerdoiv&kerdoiv=' . $kerdoiv . '&er=1&kitolto=' . $row[kitolto_sorszam] . '">' . $sorok . '. ' . $nevek . $row[email] . '</a>(' . $osszpontszam . ' - ' . $pontkategoria . ')<br />';
    }

    $result3 = mysql_query("SELECT sorszam, cim_hu, cim_de, cim_en FROM kerdoivek WHERE user_id = $_SESSION[qa_user_id]");
    while ($a = mysql_fetch_array($result3)) {
        $kerdoiv_tomb[$a['sorszam']] = $a['cim_' . $_SESSION[lang]];
    }

    $kitolto_lista = 'Kitöltők válaszai: <br />' . $lista;

    $smarty->assign('kitolto_lista', $kitolto_lista);
    $smarty->assign('kerdoiv_tomb', $kerdoiv_tomb);
    $smarty->assign('kerdoiv_obj', $kerdoiv_obj);

    $tartalom = $smarty->fetch('templates/kitoltok_valaszai.tpl');
}

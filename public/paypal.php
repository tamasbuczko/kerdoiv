<?php

if ($_REQUEST[ok]){
    $idopont = date("Y-m-d H:i:s");
   
    if ($_REQUEST[ok] == '1'){    
        $sql = "UPDATE fizetesek SET status_fizetett = '1', fizetes_ideje = '$idopont' WHERE id = '$_SESSION[paypal_fizetes_id]'";
        mysql_query($sql);
    }
    
    if ($_REQUEST[ok] == '2'){    
        $sql = "INSERT INTO fizetesek_sikertelen (fizetes_id, idopont) VALUES ('$_SESSION[paypal_fizetes_id]', '$idopont')";
        mysql_query($sql);
    }
    
    header("Location: index.php?p=paypal");
}

$result = mysql_query("SELECT id,idopont, lejarat, osszeg, csomag, status_fizetett FROM fizetesek WHERE id = '$_SESSION[paypal_fizetes_id]'");
$fizetes = mysql_fetch_array($result);

$smarty->assign('szotar', $szotar);
$smarty->assign('fizetes', $fizetes);
$tartalom = $smarty->fetch('templates/paypal.tpl');
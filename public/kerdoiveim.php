<?php
if ($_REQUEST[id]){
    $datum = date("Y-m-d");
   if ($_REQUEST[status] == '1'){
       $datum_szur = ", aktivalas = '$datum'";
   }
   if ($_REQUEST[status] == '0'){
       $datum_szur = ", lejarat = '$datum'";
   }
   $result = mysql_query("UPDATE kerdoivek SET status = '$_REQUEST[status]' $datum_szur WHERE sorszam = $_REQUEST[id]");
   mysql_query($result);
   header("Location: ?p=7");
}

$result = mysql_query ("SELECT k.sorszam FROM kerdoivek AS k
                        LEFT JOIN kerdoiv_hozzaferes AS h ON k.sorszam = h.kerdoiv
                        WHERE k.user_id = '$_SESSION[qa_user_id]' OR h.user = '$_SESSION[qa_user_id]'
                        ORDER BY k.sorszam DESC");

$sorszamok = array();
while ($next_element = mysql_fetch_array($result)){
   if (!in_array($next_element[sorszam], $sorszamok)){ //csak akkor fut, ha nincs benne az aktuális sorszám a tömbben
    $obj_kerdoiv = new kerdoiv;
    $obj_kerdoiv->load($next_element[sorszam]);
    $obj_array[] = $obj_kerdoiv;
    $sorszamok[] = $next_element[sorszam];
   }
}

$oldal = new html_blokk;

$smarty->assign('obj_array', $obj_array);
$smarty->assign('szotar', $szotar);
$smarty->assign('figy_uzenet',$figy_uzenet);
                
$tartalom = $smarty->fetch('templates/kerdoiveim.tpl');
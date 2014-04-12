<?php
$cikk = new cikkszoveg();

if ($_REQUEST[p]){
    $cikk->mysql_read($_REQUEST[p], $_SESSION['lang']);
} else {
    $cikk->mysql_read(2, $_SESSION['lang']);
}
if ($cikk->php_file){
    include('public/'.$cikk->php_file);
}

if ($cikk->php_file == 'cimlap.php'){
    $tartalom = $tartalom.$cikk->html_code;}
else {
    $tartalom = $cikk->html_code.$tartalom;
}
?>
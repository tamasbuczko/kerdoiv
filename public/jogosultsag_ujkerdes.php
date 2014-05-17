<?php
$result = mysql_query("SELECT kerdoiv_sorszam FROM kerdesek WHERE sorszam = '$_REQUEST[id]'");
$a = mysql_fetch_row($result);

$_REQUEST[kerdoiv] = $a[0];

require_once('public/jogosultsag_kerdoiv.php');
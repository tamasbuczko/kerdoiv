<?php
include ('public/regisztracio.php');

if ($_REQUEST[package]){
$tartalom = $smarty->fetch('templates/csomag_leiras.tpl');
}

?>
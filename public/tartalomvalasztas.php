<?php
//$tartalom változó létrehozása
if ($_REQUEST[p]){
    include('public/'.$_REQUEST[p].'.php');
} else {
    include('public/kerdoiv.php');
}
?>
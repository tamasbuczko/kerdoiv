<?php
if ($_REQUEST[teszt]){
    $_SESSION[teszt] = $_REQUEST[teszt];
}

if ($_SERVER['HTTP_HOST'] != 'localhost'){
    if ($_SESSION[teszt] != 'on'){
      die;
    } 
}
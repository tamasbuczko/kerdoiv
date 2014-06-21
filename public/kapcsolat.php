<?php
if ($_REQUEST[uzenet]){
   $figy_uzenet = 'Üzeneted köszönjük, hamarosan válaszolunk!';
}

$smarty->assign('lang', $lang);
$tartalom = $smarty->fetch('templates/kapcsolat.tpl');
<?php
#?p=40&kerdoiv=11
$smarty->assign('kerdoiv_obj', $kerdoiv_obj);
$smarty->assign('szotar', $szotar);

$tartalom = $smarty->fetch('templates/zartkerdoivek.tpl');

<?php

$array = array( 'tartalom'       => $tartalom,
                'figy_uzenet'   => $figy_uzenet);

$oldal = new html_blokk;

if ($_SESSION["sessfelhasznalo"]){
    $oldal->load_template_file("templates/cimlap2.html",$array);
} else {
    $oldal->load_template_file("templates/cimlap.html",$array);
}

$tartalom = $oldal->html_code;

?>
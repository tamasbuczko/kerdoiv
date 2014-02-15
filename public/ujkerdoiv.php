<?php

$array = array( 'tartalom'       => $tartalom,
                'figy_uzenet'   => $figy_uzenet);

$oldal = new html_blokk;
$oldal->load_template_file("templates/ujkerdoiv.html",$array);
$tartalom = $oldal->html_code;

?>
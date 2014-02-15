<?php

$array = array( 'tartalom'       => $tartalom,
                'figy_uzenet'   => $figy_uzenet);

$oldal = new html_blokk;
$oldal->load_template_file("templates/ujkerdes.html",$array);
$tartalom = $oldal->html_code;

?>
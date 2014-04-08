<?php
$array = array( 'kapcsolat'       => $lang[kapcsolat],
                'az_on_email_cime'   => $lang[az_on_email_cime],
				'uzenet'   => $lang[uzenet],
				'elkuldes'   => $lang[elkuldes]);

$oldal = new html_blokk;

$oldal->load_template_file("templates/kapcsolat.html",$array);

$tartalom = $oldal->html_code;
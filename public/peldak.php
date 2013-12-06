<?php


//select
$elso_opcio = $_REQUEST[elso_opcio]; //input elem name paraméterére hivatkozunk

//checkbox
for ($i = 1; $i<4; $i++){
    $checkbox = $_REQUEST['checkbox_'.$i];
    if ($checkbox == 'on'){   
        $checkboxs[$i]= 1;
    }
}

//text
$szoveg = mysql_real_escape_string($_REQUEST[szoveg]); //mysql biztonság, nem fut le amit beír.

//textarea
$szovegblokk = mysql_real_escape_string($_REQUEST[szovegblokk]); //mysql biztonság, nem fut le amit beír.

//radio
$radio = $_REQUEST[sex];

?>
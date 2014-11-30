<?php

	//Open database connection
	$domain = $_SERVER['HTTP_HOST'];
	if ($domain == 'localhost'){
      $con = mysql_connect("localhost","root","");
      mysql_select_db("kerdoiv", $con);}
    else{
      $con = mysql_connect("localhost","hegeszte_kerdoiv","ho1z60");
      mysql_select_db("hegeszte_qa", $con);
    }
    
    mysql_set_charset("utf8",$con);
    $data_table = $_GET["data_table"];

$result = mysql_query("SELECT id, status_hu FROM zart_kerdoiv_statuszok");
while ($sor = mysql_fetch_array($result)){
   $sorok .= '{"DisplayText":"'.$sor['status_hu'].'", "Value":"'.$sor['id'].'"},';
}
$sorok = '{"DisplayText":" ", "Value":"0"},'.$sorok;

$sorok = substr($sorok, 0, -1);

$data = '
{
   "Result":"OK",
   "Options":[
      '.$sorok.'
   ]
}';

echo $data;
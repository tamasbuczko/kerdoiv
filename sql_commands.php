<?php

$i = 0;
$result = mysql_query("SELECT kerdoiv_sorszam, sorrend FROM kerdesek ORDER BY kerdoiv_sorszam, sorrend");
while ($row = mysql_fetch_assoc($result)){
   $i++;
   $sorrend_tomb[$i][kerdoiv_sorszam] = $row[kerdoiv_sorszam];
   $sorrend_tomb[$i][sorrend] = $row[sorrend];
}

foreach ($sorrend_tomb as $key=>$value){
   if ($regi_kerdoiv != $value[kerdoiv_sorszam]){
	  $i = 0;
   }
   $i++;
   $sql = "UPDATE kerdesek SET sorrend = '$i' WHERE kerdoiv_sorszam = $value[kerdoiv_sorszam] AND sorrend = $value[sorrend]";
   mysql_query($sql);
   $regi_kerdoiv = $value[kerdoiv_sorszam];
}



$result = mysql_query("SELECT COUNT( * ) 
					 FROM information_schema.columns
					 WHERE table_name =  'kerdoivek'");
$sql = mysql_num_rows($result);

if ($sql < 23) {
    $result = "ALTER TABLE `kerdoivek` ADD  `hirdetessel` VARCHAR( 1 ) NULL AFTER  `status`";
    mysql_query($result);
}


$result = mysql_query("SHOW INDEX FROM valaszadasok");
$sql = mysql_num_rows($result);

if ($sql < 2) {
    $result2 = "ALTER TABLE `valaszadasok` ADD INDEX (`kerdes_sorszam`)";
    mysql_query($result2);
    $result2 = "ALTER TABLE `valaszadasok` ADD INDEX (`valasz_sorszam`)";
    mysql_query($result2);
    $result2 = "ALTER TABLE `valaszadasok` ADD INDEX (`kerdoiv_sorszam`)";
    mysql_query($result2);
}

$result = mysql_query("SELECT COUNT( * ) 
					 FROM information_schema.columns
					 WHERE table_name =  'valaszok'");
$sql = mysql_num_rows($result);

if ($sql < 11) {
    $result3 = "ALTER TABLE `valaszok` ADD  `kapcs_szoveg` VARCHAR(1) NULL DEFAULT  '1',
   ADD  `kapcs_kep` VARCHAR(1) NULL DEFAULT  '0',
   ADD  `kapcs_video` VARCHAR(1) NULL DEFAULT  '0'";

    mysql_query($result3);
}

//Remélem ezt jól csináltam, meg ilyet még nem kellett :) Ha valami gond van vele kérlek szóljatok, hogy tanulhassak én is.

$result = mysql_query("SELECT COUNT( * ) 
		       FROM `information_schema`.`columns`
		       WHERE `table_name` =  'kerdoivek'");
$sql = mysql_num_rows($result);

if ($sql < 29) {
    $result = "ALTER TABLE `kerdoivek` ADD `egyszerkitoltheto` BOOLEAN NOT NULL DEFAULT FALSE AFTER  `nyilvanos`";
    mysql_query($result);
}

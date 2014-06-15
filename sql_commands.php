<?php
$result = mysql_query("SELECT COUNT( * ) 
					 FROM information_schema.columns
					 WHERE table_name =  'kerdoivek'");
$sql = mysql_num_rows($result);

if ($sql < 23){
   $result = "ALTER TABLE `kerdoivek` ADD  `hirdetessel` VARCHAR( 1 ) NULL AFTER  `status`";
   mysql_query($result);
}


$result = mysql_query("SHOW INDEX FROM valaszadasok");
$sql = mysql_num_rows($result);

if ($sql < 2){
   $result2 ="ALTER TABLE `valaszadasok` ADD INDEX (`kerdes_sorszam`)";
   mysql_query($result2);   
   $result2 ="ALTER TABLE `valaszadasok` ADD INDEX (`valasz_sorszam`)";
   mysql_query($result2);
   $result2 ="ALTER TABLE `valaszadasok` ADD INDEX (`kerdoiv_sorszam`)";
   mysql_query($result2);
}

$result = mysql_query("SELECT COUNT( * ) 
					 FROM information_schema.columns
					 WHERE table_name =  'valaszok'");
$sql = mysql_num_rows($result);

if ($sql < 11){
   $result3 = "ALTER TABLE `valaszok` ADD  `kapcs_szoveg` VARCHAR(1) NULL DEFAULT  '1',
   ADD  `kapcs_kep` VARCHAR(1) NULL DEFAULT  '0',
   ADD  `kapcs_video` VARCHAR(1) NULL DEFAULT  '0'";

   mysql_query($result3);
}

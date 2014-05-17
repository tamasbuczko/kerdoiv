<?php
$result = mysql_query("SELECT sorszam FROM szoveg WHERE php_file = 'nyilvanos.php'");
$sql = mysql_num_rows($result);

if ($sql < 3){
   $result = "INSERT INTO szoveg"
		   . "(`sorszam`, `cikkszam`, `cim`, `tartalom`, `archiv`, `jog`, `nyelv`, `menunev`, `sorrend`, `php_file`, `hivatkozas`)"
		   . "VALUES (NULL, '20', 'Nyilvános kérdőívek', NULL, '0', '1', 'hu', NULL, NULL, 'nyilvanos.php', 'nyilvanos');";
   mysql_query($result);
   $result = "INSERT INTO szoveg"
		   . "(`sorszam`, `cikkszam`, `cim`, `tartalom`, `archiv`, `jog`, `nyelv`, `menunev`, `sorrend`, `php_file`, `hivatkozas`)"
		   . "VALUES (NULL, '20', 'Nyilvános kérdőívek', NULL, '0', '1', 'en', NULL, NULL, 'nyilvanos.php', 'nyilvanos');";
   mysql_query($result);
   $result = "INSERT INTO szoveg"
		   . "(`sorszam`, `cikkszam`, `cim`, `tartalom`, `archiv`, `jog`, `nyelv`, `menunev`, `sorrend`, `php_file`, `hivatkozas`)"
		   . "VALUES (NULL, '20', 'Nyilvános kérdőívek', NULL, '0', '1', 'de', NULL, NULL, 'nyilvanos.php', 'nyilvanos');";
   mysql_query($result);
}

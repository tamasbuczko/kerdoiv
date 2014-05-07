<?php
$result = mysql_query("SELECT sorszam FROM szoveg WHERE php_file = 'ujkerdes.php'");
$sql = mysql_num_rows($result);

if ($sql < 3){
   $result = "INSERT INTO szoveg"
		   . "(`cikkszam`, `archiv`, `jog`, `nyelv`, `php_file`, `hivatkozas`) VALUES"
		   . "('11', '0', '2', 'de', 'ujkerdes.php', 'ujkerdes'),"
		   . "('11', '0', '2', 'en', 'ujkerdes.php', 'ujkerdes')";
   mysql_query($result);
}
<?php
$result = mysql_query("SELECT sorszam FROM szoveg WHERE php_file = 'ujkerdes.php'");
$sql = mysql_num_rows($result);

if ($sql < 3){
   $result = "INSERT INTO szoveg"
		   . "('cikkszam', 'archiv', 'jog', 'nyelv', 'php_file', 'hivatkozas') VALUES"
		   . "('11', '0', '2', 'de', 'ujkerdes.php', 'ujkerdes'),"
		   . "('11', '0', '2', 'en', 'ujkerdes.php', 'ujkerdes')";
   mysql_query($result);
}

$result = mysql_query("SELECT sorszam FROM szoveg WHERE php_file = 'kerdoiv_kitoltoemail.php'");
$sql = mysql_num_rows($result);

if ($sql < 3){
   $result = "INSERT INTO szoveg"
		   . "(cikkszam, cim, archiv, jog, nyelv, php_file, hivatkozas) VALUES"
		   . "('15', 'Kitöltők email címei', '0', '2', 'hu', 'kerdoiv_kitoltoemail.php', 'kitoltok'),"
		   . "('15', 'Kitöltők email címei', '0', '2', 'en', 'kerdoiv_kitoltoemail.php', 'kitoltok'),"
		   . "('15', 'Kitöltők email címei', '0', '2', 'de', 'kerdoiv_kitoltoemail.php', 'kitoltok')";
   mysql_query($result);
}

$result = mysql_query("SELECT sorszam FROM szoveg WHERE php_file = 'profil.php'");
$sql = mysql_num_rows($result);

if ($sql < 3){
   $result = "INSERT INTO szoveg"
		   . "(cikkszam, cim, archiv, jog, nyelv, php_file, hivatkozas) VALUES"
		   . "('16', 'Profil', '0', '2', 'hu', 'profil.php', 'kitoltok'),"
		   . "('16', 'Profil', '0', '2', 'en', 'profil.php', 'kitoltok'),"
		   . "('16', 'Profil', '0', '2', 'de', 'profil.php', 'kitoltok')";
   mysql_query($result);
}
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


$val = mysql_query('SELECT sorszam FROM regisztralt');

if($val == FALSE){
   $result = "
   CREATE TABLE IF NOT EXISTS `regisztralt` (
	 `sorszam` int(11) NOT NULL AUTO_INCREMENT,
	 `azonosito` varchar(20) COLLATE latin2_hungarian_ci NOT NULL,
	 `jelszo` varchar(32) COLLATE latin2_hungarian_ci NOT NULL,
	 `email` varchar(100) COLLATE latin2_hungarian_ci DEFAULT NULL,
	 `hirlevel` varchar(10) COLLATE latin2_hungarian_ci DEFAULT NULL,
	 `jog` varchar(1) COLLATE latin2_hungarian_ci NOT NULL DEFAULT '0',
	 `csoport` int(11) DEFAULT NULL,
	 `archiv` varchar(1) COLLATE latin2_hungarian_ci NOT NULL DEFAULT '0',
	 `regisztracio` datetime DEFAULT NULL,
	 `bejelentkezes` datetime DEFAULT NULL,
	 `megjegyzes` text COLLATE latin2_hungarian_ci,
	 PRIMARY KEY (`sorszam`)
   ) ENGINE=InnoDB  DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci AUTO_INCREMENT=285 ;";

   mysql_query($result);
   
   $result = "
   INSERT INTO `regisztralt` (`sorszam`, `azonosito`, `jelszo`, `email`, `hirlevel`, `jog`, `csoport`, `archiv`, `regisztracio`, `bejelentkezes`, `megjegyzes`) VALUES
   (3, 'AdminZoli', 'e20ffabe4230eed6ba92c6ee9d9618e4', 'info@inkozrt.hu', '1', '1', 1, '0', NULL, NULL, NULL),
   (24, 'BT', 'a4094997585517ef239386c45f0b0fa5', 'tamasbuczko@gmail.com', '1', '1', 1, '0', NULL, NULL, NULL)";
   mysql_query($result);
}
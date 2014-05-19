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

$result = mysql_query("SELECT sorszam FROM kerdoiv_szemelyesadat");
$sql = mysql_num_rows($result);

if ($sql < 7){
$result ="DROP TABLE `kerdoiv_szemelyesadat`";
mysql_query($result);   
   
$result = "
CREATE TABLE IF NOT EXISTS `kerdoiv_szemelyesadat` (
  `sorszam` int(11) NOT NULL,
  `kerdoiv_sorszam` int(11) DEFAULT NULL,
  `neme` varchar(1) DEFAULT NULL,
  `kora` varchar(1) DEFAULT NULL,
  `orszag` varchar(1) DEFAULT NULL,
  `varos` varchar(1) DEFAULT NULL,
  `foglalkozas` varchar(1) DEFAULT NULL,
  `vegzettseg` varchar(1) DEFAULT NULL,
  `jovedelem` varchar(1) DEFAULT NULL,
  `csaladiallapot` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`sorszam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
mysql_query($result);

$result = " 
INSERT INTO `kerdoiv_szemelyesadat`
(`sorszam`, `kerdoiv_sorszam`, `neme`, `kora`, `orszag`, `varos`, `foglalkozas`, `vegzettseg`, `jovedelem`, `csaladiallapot`) VALUES
(1, 1, '1', '1', '1', '1', '1', '1', '1', '1'),
(2, 2, '1', '1', '1', '1', '1', '1', '1', '1'),
(3, 3, '1', '1', '1', '1', '1', '1', '1', '1'),
(4, 4, '1', '1', '1', '1', '1', '1', '1', '1'),
(5, 5, '1', '1', '1', '1', '1', '1', '1', '1'),
(6, 6, '1', '1', '1', '1', '1', '1', '1', '1'),
(7, 7, '1', '1', '1', '1', '1', '1', '1', '1');";
mysql_query($result);
echo mysql_error();
}
<?php
if ($_REQUEST[link]){
   $result = mysql_query("SELECT aktivalo_link FROM users WHERE aktivalo_link = $_REQUEST[link]");
   $row = mysql_fetch_array($result);
   if ($row[0]){
	  $tartalom = '<h1>Sikeres aktiválás!</h1>';
   }
}
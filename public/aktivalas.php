<?php
if ($_REQUEST[link]){
   $result = mysql_query("SELECT aktivalo_link FROM users WHERE aktivalo_link = '$_REQUEST[link]'");
   $row = mysql_fetch_array($result);
   if ($row[aktivalo_link]){
	  $tartalom = '<h1>Sikeres aktiválás!</h1>';
          $query = "UPDATE users SET aktivalo_link = '' WHERE aktivalo_link = '$_REQUEST[link]' ";
          mysql_query($query);
   }
}
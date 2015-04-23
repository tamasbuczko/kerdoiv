<?php
//megnézzük a user összes kérdőívét és acsomag jogaihoz kapcsoljuk a szükséges mezőket

$result = mysql_query("SELECT * FROM kerdoivek WHERE user_id = $user");
while ($row = mysql_fetch_array($result)){
    
}
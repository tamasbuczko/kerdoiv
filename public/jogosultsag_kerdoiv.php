<?php
if ($_REQUEST[kerdoiv]){
   $result = mysql_query ("SELECT sorszam, status, nyilvanos, user_id FROM kerdoivek WHERE sorszam = '$_REQUEST[kerdoiv]' ");
   $a = mysql_fetch_array($result);
} else {
   $a[user_id] = $_SESSION[qa_user_id]; //???
}

//be van-e lépve user és szerkeszteni akar
if ((!$_SESSION[qa_user_id])AND(!$_REQUEST[mod])){
   if ($a[status] == '1'){
	  $jogosult = 1;
   } else {
	  $tartalom = 'Nincs jogosultsága a kérdőív szerkesztéséhez!';
	  //ez az üzenet jelenik meg az inaktív kérdőívek esetén is
   }
}

//be van-e lépve user és szerkeszteni akar
if (($_SESSION[qa_user_id])AND($_REQUEST[mod])){
   if ($_SESSION[qa_user_id] == $a[user_id]){
	  $jogosult = 1;
   } else {
	  $tartalom = 'Nincs jogosultsága a kérdőív szerkesztéséhez!';
   }
}

//be van-e lépve user és a kérdőív típusa a kérdés
//status (1-bárki, 2-, 3-), nyilvanos
if (($_SESSION[qa_user_id])AND(!$_REQUEST[mod])AND($_REQUEST[p]!='ujkerdes')AND($_REQUEST[p]!='ujkerdoiv') AND ($_REQUEST[p]!='kerdoiv_adatlap')){
   if ($a[status] == '1'){
	  $jogosult = 1;
   } else {
	  $tartalom = 'Nincs jogosultsága a kérdőív kitöltéséhez!';
   }
}

if (($_SESSION[qa_user_id])AND($_REQUEST[p]=='ujkerdes')){
   if ($_SESSION[qa_user_id] == $a[user_id]){
	  $jogosult = 1;
   }
}

if (($_SESSION[qa_user_id])AND($_REQUEST[p]=='ujkerdoiv')){
   if ($_SESSION[qa_user_id] == $a[user_id]){
	  $jogosult = 1;
   }
}

if (($_SESSION[qa_user_id])AND($_REQUEST[p]=='kerdoiv_adatlap')){
   if ($_SESSION[qa_user_id] == $a[user_id]){
	  $jogosult = 1;
   }
}

if (($_REQUEST[kerdoiv]) AND ($_REQUEST[p] == 'eredmeny')){
   $result = mysql_query ("SELECT sorszam, status, nyilvanos, user_id FROM kerdoivek WHERE sorszam = '$_REQUEST[kerdoiv]' ");
   $a = mysql_fetch_array($result);
   if (($a[user_id] != $_SESSION['qa_user_id']) AND ($a[nyilvanos] == '0')){
       unset($jogosult);
       // utólagos nyilvános kikapcsnál a listában megjelenik, de nem tudja megnézni
       // és csak azok lássák, akik kitöltötték
   }
}
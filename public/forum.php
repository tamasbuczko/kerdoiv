<?php
$almenu = $_REQUEST[kerdoiv];
if (($_REQUEST['submit']) AND ($_REQUEST[uj_hozzaszolas])){
   $idopont = date("Y-m-d H:i:s");
   $sql = "INSERT INTO forum (nev, szoveg, idopont, forumszam) VALUES
		   ('$user->nev', '$_REQUEST[uj_hozzaszolas]', '$idopont', '$almenu')";
   mysql_query($sql);
   
   foreach ($kerdoiv_obj->megosztott_admin as $key=>$value){
       if ($user->sorszam != $value){
        $sql = "INSERT INTO forum_figyeles (kerdoiv_id, user_id) VALUES
                        ('$almenu', '$value')";
        mysql_query($sql);
       }
   }
   
   if ($user->sorszam != $kerdoiv_obj->keszito_id){
       $sql = "INSERT INTO forum_figyeles (kerdoiv_id, user_id) VALUES
                        ('$almenu', '$kerdoiv_obj->keszito_id')";
        mysql_query($sql);
   }
   header("Location: ?p=kerdoiv_adatlap&kerdoiv=$almenu&no=1");
}
$result = mysql_query("SELECT sorszam, nev, szoveg, valaszszam, idopont, forumszam, status FROM forum WHERE forumszam = '$kerdoiv_obj->sorszam' ORDER BY idopont DESC");
while ($row = mysql_fetch_array($result)){
	 $hozzaszolasok[$row[sorszam]]['sorszam'] = $row['sorszam'];
	 $hozzaszolasok[$row[sorszam]]['nev'] = $row['nev'];
     $hozzaszolasok[$row[sorszam]]['szoveg'] = $row['szoveg'];
	 $hozzaszolasok[$row[sorszam]]['idopont'] = $row['idopont'];
}
$smarty->assign('hozzaszolasok', $hozzaszolasok);
$smarty->assign('user', $user);
$smarty->assign('szotar', $szotar);
$forum = $smarty->fetch('templates/forum.tpl');
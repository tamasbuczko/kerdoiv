<?php
$smarty_admin = new Smarty();
$slide = new slide();

If ($_REQUEST['torles']) { $slide->mysql_delete($_REQUEST[torles]);}
If ($_REQUEST['upload']) {
   #képfile feltöltése
		$result = mysql_query("SELECT MAX(sorszam) FROM ".$_SESSION[adatbazis_etag]."_slideshow");
		if (is_resource($result)) {
			$row = mysql_fetch_array($result); 
			$num_rows=$row[0];
			$num_rows++;}
		else {
			$num_rows = 1;}
		
		$fajlnev_n = $num_rows . $_SESSION["f5"] .'.jpg';
		$konyvtar = 'slider/';
		foreach($_FILES as $allomanynev => $all_tomb) {
			move_uploaded_file($all_tomb['tmp_name'], "$konyvtar/$fajlnev_n");
			If ($all_tomb['tmp_name'] == "") {
				$nincsfajl=1;
			}
			$filenev = "slider/".$all_tomb['name'];
			$filename = $all_tomb['name'];
			settype ($filenev, 'string');
			$uzenet = $all_tomb['tmp_name'];
		}
		
		#a kép adatainak rögzítése az adatbázisba
		If ($nincsfajl != 1) {
			$sql2 = "INSERT INTO ".$_SESSION[adatbazis_etag]."_slideshow (sorszam, slide, aktiv) values ('$num_rows', '$fajlnev_n', '0')";
			mysql_query($sql2);
			header('Location: /'.MAIN_DIRECTORY.'admin.php?tartalom=slideshow');
		}	
   
   #$slide->mysql_insert();
}

If ($_REQUEST['submit']) { 
   for ($i = 0; $i<1000; $i++){
	  $data_sorszam = 'sorszam_'.$i;
	  $data_delete = 'torol_'.$i;
	  if ($_REQUEST[$data_sorszam]){ 
		 $slide->mysql_check($i, 'lista');
		 $slide->mysql_update($i);
	  }
	  if ($_REQUEST[$data_delete] == 'on'){
		 $slide->mysql_delete($i);
	  }
   }
}

if (($_REQUEST['valaszt'] == '') OR ($_REQUEST['check_torles'] == "on")){
   $result = mysql_query("SELECT sorszam FROM ".$_SESSION[adatbazis_etag]."_slideshow ORDER BY sorrend");
   while ($next_element = mysql_fetch_array($result)){
	   $obj_name = "slide_".$next_element[sorszam];
	   $$obj_name = new slide();
	   $$obj_name->mysql_read($next_element[sorszam]);   
	   $slide_array[] = $$obj_name; 
   }
  
	$smarty_admin->assign('slide_array', $slide_array);
	$admin_torzs = $smarty_admin->fetch('admin_slideshow.html');
}

If ($kikapcs == 1) { $admin_torzs = '<div class="tabla_k">Ehhez a menüponthoz nem tartozik szerkeszthető tartalom!</div>';}
?>
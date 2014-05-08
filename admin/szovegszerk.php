<?php
$smarty_admin = new Smarty();
$cikkx = new cikkszoveg();

If ($_REQUEST['torles']) { $cikkx->mysql_delete($_REQUEST[torles]);}
If ($_POST['ujcim'] != "") { $cikkx->mysql_insert();}
If ($_POST['cim'] != "") { $cikkx->mysql_update($_POST[sorszam]);}

If ($_REQUEST[valaszt] != ''){
   $cikkx->mysql_read($_REQUEST[valaszt], $_SESSION[lang]);
	if ($cikkx->hir == 1) {$cikkhir_check = 'checked="checked"';}
	if ($cikkx->kiemelt == 1) {$cikkkiemelt_check = 'checked="checked"';}
}	

$db_peroldal = 15;
$adminpublic = 'admin';

$nyelvszur = "AND nyelv = '$_SESSION[lang]' ";

if (($_REQUEST['valaszt'] == '') OR ($_REQUEST['check_torles'] == "on")){
   $result = mysql_query("SELECT sorszam, cim, nyelv, archiv, menu_fent, sorrend, hir, megjelenes, hivatkozas FROM ".$_SESSION[adatbazis_etag]."_szoveg WHERE sorszam > 0 $nyelvszur ORDER BY sorrend ".$lapszam."");
   $sor = 0;
   while ($next_element = mysql_fetch_array($result)){
	  
	   $sor++;
	   if ($next_element[archiv] == 0){ $archivkapcs = 'igen';}
		 else { $archivkapcs = 'nem';}

	   if ($next_element[menu_fent] == 0){ $menukapcs = 'nem';}
		 else {$menukapcs = 'igen';
	   }
	   $idopont = date("Y-m-d H:i:s");
	   if ($next_element[megjelenes] > $idopont){ $sorszin = ' style="color: red;"';}
		 else { $sorszin = '';}
	   
	   $obj_name = "cikk_".$next_element[sorszam];
	   $$obj_name = new cikkszoveg();
	   $$obj_name->mysql_read($next_element[sorszam], $_SESSION[lang]);   
	   $obj_array[] = $$obj_name; 
   }
   
	$smarty_admin->assign('lapszamsor', $ujnavsav->lapszamsor);
	$smarty_admin->assign('szulo', $_REQUEST[szulo]);
	$smarty_admin->assign('obj_array', $obj_array);
	$admin_torzs = $smarty_admin->fetch('admin_szovegszerk_lista.html');
} else {
   
   $resultc = mysql_query("SELECT cim FROM ".$_SESSION[adatbazis_etag]."_szoveg WHERE nyelv = 'hu' ORDER BY cim");
   echo mysql_error(); 
   while ($next_element = mysql_fetch_array($resultc)){
	   if ($next_element[cikkszam] == $cikkx->cikkszam){$magyar_option_sel = ' selected="selected"';}
	   $magyar_option .= '<option value="' . $next_element[cikkszam] . '"'.$magyar_option_sel.'>' . $next_element[cim] . '</option>';
	   $magyar_option_sel = '';
   }

   if ($cikkx->cikkszam == $cikkx->sorszam){$magyar_option_sel = ' selected="selected"';}

    $magyar_option = '<option value="'.$cikkx->sorszam.'"'.$magyar_option_sel.'>nincs</option>'.$magyar_option;
   
	$smarty_admin->assign('cikkkiemelt_check', $cikkkiemelt_check);
	$smarty_admin->assign('magyar_option', $magyar_option);
	$smarty_admin->assign('cikkx', $cikkx);
	$admin_torzs = $smarty_admin->fetch('admin_szovegszerk_lap.html');
}

If ($kikapcs == 1) { $admin_torzs = '<div class="tabla_k">Ehhez a menüponthoz nem tartozik szerkeszthető tartalom!</div>';}
?>
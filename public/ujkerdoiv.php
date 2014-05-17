<?php
require_once ('public/jogosultsag_ujkerdoiv.php');

if ($_REQUEST[fejleckeptorles]){
   $sql = "UPDATE kerdoivek SET fejlec_kep='' WHERE sorszam = $_REQUEST[id]";
   mysql_query($sql);
   header("Location: ?p=ujkerdoiv&id=".$_REQUEST[id]);
}

if ($_REQUEST[mentes]){
    
        if ($_REQUEST[check_hu] == 'on'){
            $check_hu = 1;}
        else {
            $check_hu = 0;
        }
        
        if ($_REQUEST[check_en] == 'on'){
            $check_en = 1;}
        else {
            $check_en = 0;
        }
        
        if ($_REQUEST[check_de] == 'on'){
            $check_de = 1;}
        else {
            $check_de = 0;
        }
        
        if ($_REQUEST[nyilvanos] == 'on'){
            $check_nyilvanos = 1;}
        else {
            $check_nyilvanos = 0;
        }
		
		if ($_REQUEST[neme] == 'on'){
            $check_neme = 1;}
        else {
            $check_neme = 0;
        }
		
		if ($_REQUEST[kora] == 'on'){
            $check_kora = 1;}
        else {
            $check_kora = 0;
        }
		
		if ($_REQUEST[orszag] == 'on'){
            $check_orszag = 1;}
        else {
            $check_orszag = 0;
        }
		
		if ($_REQUEST[foglalkozas] == 'on'){
            $check_foglalkozas = 1;}
        else {
            $check_foglalkozas = 0;
        }
    
    if (!$_REQUEST[sorszam]){
        $result = mysql_query("SELECT MAX(sorszam) FROM kerdoivek");
        $a = mysql_fetch_row($result);
        $max_kerdoiv_sorszam = $a[0];
        $max_kerdoiv_sorszam++;

        $sql = "INSERT INTO kerdoivek (sorszam, cim_hu, leiras_hu, status, user_id, hu, en, de, cim_en, leiras_en, cim_de, leiras_de, zaras_hu, zaras_en, zaras_de, nyilvanos)
                VALUES
                ('$max_kerdoiv_sorszam', '$_REQUEST[cim_hu]', '$_REQUEST[leiras_hu]', '1', '$_SESSION[qa_user_id]', '$check_hu', '$check_en', '$check_de', '$_REQUEST[cim_en]', '$_REQUEST[leiras_en]', '$_REQUEST[cim_de]', '$_REQUEST[leiras_de]', '$_REQUEST[zaras_hu]','$_REQUEST[zaras_en]','$_REQUEST[zaras_de]', '$check_nyilvanos')";
        mysql_query($sql);

        $sql = "INSERT INTO kerdesek (kerdoiv_sorszam, kerdes_hu, status, sorrend)
                       VALUES
                       ('$max_kerdoiv_sorszam', 'Új kérdés', '1', '')";
       mysql_query($sql);

        header("Location: ?p=kerdoiv&mod=1&kerdoiv=".$max_kerdoiv_sorszam);
    } else {
        if ($_FILES['fejlec_kep']['tmp_name'] != "") {
	  $chars="abcdefhjkmnpqrstuxy345789";
	  for ($i=0;$i<4;$i++){
		  $rand=rand(0,strlen($chars)-1);
		  $f5strx.=$chars[$rand];
	  }

	  $fajlnev_n = $kerdoiv_sorszam.'_'.$f5strx .'.jpg';
	  $konyvtar = 'fejlec_kepek/';

	  move_uploaded_file($_FILES['fejlec_kep']['tmp_name'], $konyvtar.$fajlnev_n);

	  $filenev = $konyvtar.$_FILES['fejlec_kep']['name'];
	  $filename = $_FILES['fejlec_kep']['name'];
	  settype ($filenev, 'string');
	  $uzenet = $_FILES['fejlec_kep']['tmp_name'];
          $sql = "UPDATE kerdoivek SET fejlec_kep='$fajlnev_n' WHERE sorszam='$_REQUEST[id]'";
          mysql_query($sql);
	}
        
        $cim_hu = $_REQUEST[cim_hu];
        $leiras_hu = $_REQUEST[leiras_hu];
        $zaras_hu = $_REQUEST[zaras_hu];
        $cim_en = $_REQUEST[cim_en];
        $leiras_en = $_REQUEST[leiras_en];
        $zaras_en = $_REQUEST[zaras_en];
        $cim_de = $_REQUEST[cim_de];
        $leiras_de = $_REQUEST[leiras_de];
        $zaras_de = $_REQUEST[zaras_de];
                        
		$aktivalas = $_REQUEST[aktivalas_datum];
		$lejarat = $_REQUEST[lejarat_datum];
		
		$css_id = $_REQUEST[stilus];
        
        $sql = "UPDATE kerdoivek SET cim_hu='$cim_hu', leiras_hu='$leiras_hu', zaras_hu='$zaras_hu',
                cim_en='$cim_en', leiras_en='$leiras_en', zaras_en='$zaras_en',
                cim_de='$cim_de', leiras_de='$leiras_de', zaras_de='$zaras_de',
                hu='$check_hu', en='$check_en', de='$check_de', css_id = '$css_id',
                nyilvanos='$check_nyilvanos', aktivalas='$aktivalas', lejarat='$lejarat' WHERE sorszam='$_REQUEST[sorszam]'";
        mysql_query($sql);
		
		$result = mysql_query("SELECT kerdoiv_sorszam FROM kerdoiv_szemelyesadat WHERE kerdoiv_sorszam = '$_REQUEST[sorszam]'");
		$ertek = mysql_fetch_row($result);
		
		if ($ertek[0]){
			$sql = "UPDATE kerdoiv_szemelyesadat SET neme='$check_neme', kora='$check_kora', orszag='$check_orszag', foglalkozas='$check_foglalkozas' WHERE kerdoiv_sorszam = '$_REQUEST[sorszam]'";
			mysql_query($sql);}
		else {
			$sql = "INSERT INTO kerdoiv_szemelyesadat (kerdoiv_sorszam, neme, kora, orszag, foglalkozas) VALUES"
					. "($_REQUEST[sorszam], '$check_neme', '$check_kora', '$check_orszag', '$check_foglalkozas')";
			mysql_query($sql);
		}
    }
}

$div_kikapcs = 'style="display: none;"';

if ($_REQUEST[id]){
    $result = mysql_query("SELECT cim_hu, leiras_hu, hu, en, de, cim_en, leiras_en, cim_de, leiras_de, nyilvanos, aktivalas, lejarat, zaras_hu, zaras_en, zaras_de, css_id, fejlec_kep FROM kerdoivek WHERE sorszam = '$_REQUEST[id]'");
    $a = mysql_fetch_row($result);
    $kerdoiv_sorszam = $_REQUEST[id];
    $cim_hu = $a[0];
    $leiras_hu = $a[1];
    $cim_en = $a[5];
    $leiras_en = $a[6];
    $cim_de = $a[7];
    $leiras_de = $a[8];
    $nyilvanos = $a[9];
    $aktivalas = $a[10];
    $lejarat = $a[11];
    $zaras_hu = $a[12];
    $zaras_en = $a[13];
    $zaras_de = $a[14];
    $css_id = $a[15];
    $fejlec_kep = $a[16];
    $hu = $a[2];
    $en = $a[3];
    $de = $a[4];
    $nyelv_db = 0;
	
	$resultx = mysql_query ("SELECT neme, kora, orszag, varos, foglalkozas FROM kerdoiv_szemelyesadat WHERE kerdoiv_sorszam = '$kerdoiv_sorszam'");
   $next_elementx = mysql_fetch_array ($resultx);
   $kapcs_neme = $next_elementx[neme];
   $kapcs_kora = $next_elementx[kora];
   $kapcs_orszag = $next_elementx[orszag];
   $kapcs_varos = $next_elementx[varos];
   $kapcs_foglalkozas = $next_elementx[foglalkozas];
   if ($kapcs_neme == '1'){$checked_neme = 'checked="checked"';}
   if ($kapcs_kora == '1'){$checked_kora = 'checked="checked"';}
   if ($kapcs_orszag == '1'){$checked_orszag = 'checked="checked"';}
   if ($kapcs_varos == '1'){$checked_varos = 'checked="checked"';}
   if ($kapcs_foglalkozas == '1'){$checked_foglalkozas = 'checked="checked"';}
    
    if ($fejlec_kep){
        $kep_fejlec = '<div class="admin_fejleckep">'
                . '<img src="fejlec_kepek/'.$fejlec_kep.'" alt="" />'
                . '<img src="graphics/icon_del.png" class="icon_del" alt="törlés" onclick="megerosites_x(\''.$_REQUEST[id].'\', \'fejlec_kep\', \'1\')" />'
                . '</div>';
    }
	
	if ($css_id == '0'){ $checked_stilus_alap = 'checked="checked"';}
	if ($css_id == '1'){ $checked_stilus_1 = 'checked="checked"';}
	if ($css_id == '2'){ $checked_stilus_2 = 'checked="checked"';}
	
    if ($hu == '1'){
        $nyelv_db++;
        $checked_hu = 'checked="checked"';
        
    } else {
        $cim_hux = $div_kikapcs;
        $leiras_hux = $div_kikapcs;
        $zaras_hux = $div_kikapcs;
        $control_hu = 'style="display: none; opacity: 0.5;"';
    }
    if ($en == '1'){
        $nyelv_db++;
        $checked_en = 'checked="checked"';
        
    } else {
        $cim_enx = $div_kikapcs;
        $leiras_enx = $div_kikapcs;
        $zaras_enx = $div_kikapcs;
        $control_en = 'style="display: none; opacity: 0.5;"';
    }
    if ($de == '1'){
        $nyelv_db++;
        $checked_de = 'checked="checked"';
        
    } else {
        $cim_dex = $div_kikapcs;
        $leiras_dex = $div_kikapcs;
        $zaras_dex = $div_kikapcs;
        $control_de = 'style="display: none; opacity: 0.5;"';
    }
    
    if ($nyilvanos == '1'){
        $checked_nyilvanos = 'checked="checked"';
    }
    
        $control_box_ki = $div_kikapcs;
    
    
    $urlap_cim = 'Kérdőív módosítása';
} else {
    if ($_SESSION[lang] == 'hu'){
        $urlap_cim = 'Új kérdőív rögzítése';
        $control_box_ki = $div_kikapcs;
        $cim_enx = $div_kikapcs;
        $cim_dex = $div_kikapcs;
        $leiras_enx = $div_kikapcs;
        $leiras_dex = $div_kikapcs;
        $zaras_enx =  $div_kikapcs;
        $zaras_dex =  $div_kikapcs;
        $checked_hu = 'checked="checked"';
        #$cim_hu = 'Az új kérdőív címe';
        #$cim_hu = $lang[az_uj_kerdoiv_cime];
        $leiras_hu = 'Az új kérdőív rövid leírása';
        $zaras_hu = 'A kérdőív záró szövege';
        $control_en = 'style="opacity: 0.5;"';
        $control_de = 'style="opacity: 0.5;"';
    }
    if ($_SESSION[lang] == 'en'){
        $urlap_cim = 'Új kérdőív rögzítése';
        $control_box_ki = $div_kikapcs;
        $cim_hux = $div_kikapcs;
        $cim_dex = $div_kikapcs;
        $leiras_hux = $div_kikapcs;
        $leiras_dex = $div_kikapcs;
        $zaras_hux =  $div_kikapcs;
        $zaras_dex =  $div_kikapcs;
        $checked_en = 'checked="checked"';
        $cim_en = 'Az új kérdőív címe';
        $leiras_en = 'Az új kérdőív rövid leírása';
        $zaras_en = 'A kérdőív záró szövege';
        $control_hu = 'style="opacity: 0.5;"';
        $control_de = 'style="opacity: 0.5;"';
    }
    if ($_SESSION[lang] == 'de'){
        $urlap_cim = 'Új kérdőív rögzítése';
        $control_box_ki = $div_kikapcs;
        $cim_hux = $div_kikapcs;
        $cim_enx = $div_kikapcs;
        $leiras_hux = $div_kikapcs;
        $leiras_enx = $div_kikapcs;
        $zaras_hux =  $div_kikapcs;
        $zaras_enx =  $div_kikapcs;
        $checked_de = 'checked="checked"';
        $cim_de = 'Az új kérdőív címe';
        $leiras_de = 'Az új kérdőív rövid leírása';
        $zaras_de = 'A kérdőív záró szövege';
        $control_hu = 'style="opacity: 0.5;"';
        $control_en = 'style="opacity: 0.5;"';
    }
}

if ($kerdoiv_sorszam){
    $vissza_link = '?p=kerdoiv&mod=1&kerdoiv='.$kerdoiv_sorszam;
} else {
    $vissza_link = '?p=kerdoiveim';
}

$array = array( 'kerdoiv_sorszam'       => $kerdoiv_sorszam,
                'tartalom'       => $tartalom,
                'vissza_link'       => $vissza_link,
                'urlap_cim'       => $urlap_cim,
                'cim_hu'       => $cim_hu,
                'leiras_hu'       => $leiras_hu,
                'zaras_hu'       => $zaras_hu,
                'cim_en'       => $cim_en,
                'leiras_en'       => $leiras_en,
                'zaras_en'       => $zaras_en,
                'cim_de'       => $cim_de,
                'leiras_de'       => $leiras_de,
                'zaras_de'       => $zaras_de,
                'id'       => $_REQUEST[id],
                'checked_hu'       => $checked_hu,
                'checked_en'       => $checked_en,
                'checked_de'       => $checked_de,
                'checked_nyilvanos' => $checked_nyilvanos,
                'cim_hux'       => $cim_hux,
                'cim_enx'       => $cim_enx,
                'cim_dex'       => $cim_dex,
                'kep_fejlec'       => $kep_fejlec,
                'leiras_hux'       => $leiras_hux,
                'leiras_enx'       => $leiras_enx,
                'leiras_dex'       => $leiras_dex,
                'zaras_hux'       => $zaras_hux,
                'zaras_enx'       => $zaras_enx,
                'zaras_dex'       => $zaras_dex,
				'checked_neme'       => $checked_neme,
				'checked_kora'       => $checked_kora,
				'checked_orszag'       => $checked_orszag,
				'checked_foglalkozas'       => $checked_foglalkozas,
			   'checked_stilus_alap'       => $checked_stilus_alap,
			   'checked_stilus_1'       => $checked_stilus_1,
			   'checked_stilus_2'       => $checked_stilus_2,
                'control_hu'       => $control_hu,
                'control_en'       => $control_en,
                'control_de'       => $control_de,
		'aktivalas'       => $aktivalas,
		'lejarat'       => $lejarat,
                'control_box_ki'       => $control_box_ki,
                'figy_uzenet'   => $figy_uzenet,
                'vissza_a_kerdoivhez' => $lang[vissza_a_kerdoivhez],
                'vissza' => $lang[vissza],
                'mentes' => $lang[mentes],
                'vezerlopult' => $lang[vezerlopult]);

$oldal = new html_blokk;
if ($jogosult){
   $oldal->load_template_file("templates/ujkerdoiv.html",$array);}
else {
   $oldal->load_template_file("templates/nem_jogosult.tpl",$array);	  
}
$tartalom = $oldal->html_code;
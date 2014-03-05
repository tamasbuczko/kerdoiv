<?php

//válasz törlése
if ($_REQUEST[torles]){
   $sql = "DELETE FROM valaszok WHERE sorszam = $_REQUEST[torles]";
   mysql_query($sql);
   header("Location: ?p=ujkerdes&id=".$_REQUEST[id]);
}

//kérdés törlése
if ($_REQUEST[kerdestorles]){
   $result = mysql_query("SELECT kerdoiv_sorszam, kerdes_hu, tipus FROM kerdesek WHERE sorszam = '$_REQUEST[id]'");
   $a = mysql_fetch_row($result);
   $kerdoiv_sorszam = $a[0];
	   
   $sql = "DELETE FROM kerdesek WHERE sorszam = $_REQUEST[id]";
   mysql_query($sql);
   
   $sql = "DELETE FROM valaszok WHERE kerdes_valasz = $_REQUEST[id]";
   mysql_query($sql);
   
   header("Location: ?p=kerdoiv&kerdoiv=".$kerdoiv_sorszam."&mod=1");
}

//új kérdés rögzítése
if ($_REQUEST[ujkerdes]){
    $kerdoiv_sorszam = $_REQUEST[kerdoiv];
    
    $result = mysql_query("SELECT MAX(sorszam) FROM kerdesek;");
    $a = mysql_fetch_row($result);
    $ujkerdes_sorszam = $a[0];
    $ujkerdes_sorszam++;
    
   if ($_REQUEST[ujkerdes] == 'x'){
       $result = mysql_query("SELECT MAX(sorrend) FROM kerdesek;");
        $a = mysql_fetch_row($result);
        $ujkerdes_sorrend = $a[0];
        $ujkerdes_sorrend++;
       
       $sql = "INSERT INTO kerdesek (sorszam, kerdoiv_sorszam, kerdes_hu, status, sorrend)
                        VALUES
                        ('$ujkerdes_sorszam', '$kerdoiv_sorszam', 'Új kérdés', '1', '$ujkerdes_sorrend')";
        mysql_query($sql);
        header("Location: ?p=ujkerdes&id=".$ujkerdes_sorszam);
   } else {

        $result = mysql_query("SELECT sorrend FROM kerdesek WHERE sorszam =$_REQUEST[ujkerdes]");
        $a = mysql_fetch_row($result);
        $uj_sorrend = $a[0]-1;


        
        $sql = "INSERT INTO kerdesek (sorszam, kerdoiv_sorszam, kerdes_hu, status, sorrend)
                        VALUES
                        ('$ujkerdes_sorszam', '$kerdoiv_sorszam', 'Új kérdés', '1', '$uj_sorrend')";
        mysql_query($sql);
        header("Location: ?p=ujkerdes&id=".$ujkerdes_sorszam);
   }
}

if (($_REQUEST[mentes]) OR ($_REQUEST[pluszvalasz])){
    $kerdes_szoveg = $_REQUEST[kerdes];
    $kerdes_tipus = $_REQUEST[tipus];
    $kerdes_sorszam = $_REQUEST[id];
    $sql = "UPDATE kerdesek SET kerdes_hu='$kerdes_szoveg', tipus='$kerdes_tipus' WHERE sorszam='$kerdes_sorszam'";
    mysql_query($sql);
    
    $resultxx = mysql_query("SELECT MAX(sorszam) FROM valaszok ");
    $b = mysql_fetch_row($resultxx);
    $utolsovalaszsorszam = $b[0];
    for ($i = 0; $i <= $utolsovalaszsorszam; $i++){
        $valasz_x = 'valasz_'.$i;
        if ($_REQUEST[$valasz_x]){
            $valasz_ertek = $_REQUEST[$valasz_x];
            $sql = "UPDATE valaszok SET valasz_hu = '$valasz_ertek' WHERE sorszam = $i";
            mysql_query($sql);
        }
    }
    
}

if ($_REQUEST[pluszvalasz]){
   $kerdoiv_sorszam = $_REQUEST[kerdoiv_sorszam];
   $sql = "INSERT INTO valaszok (kerdoiv_sorszam, kerdes_valasz, status, sorrend)
		   VALUES
		   ('$kerdoiv_sorszam', '$kerdes_sorszam', '1', '$utolsovalaszsorszam')";
   mysql_query($sql);
   header("Location: ?p=ujkerdes&id=".$_REQUEST[id]);
}

if ($_REQUEST[id]){
    $result = mysql_query("SELECT kerdoiv_sorszam, kerdes_hu, tipus FROM kerdesek WHERE sorszam = '$_REQUEST[id]'");
    $a = mysql_fetch_row($result);
    $kerdoiv_sorszam = $a[0];
    $kerdes_szoveg = $a[1];
    $kerdes_tipus = $a[2];
    $urlap_cim = 'Kérdés módosítása';
    if ($kerdes_tipus == 'radio') {$check_radio = 'checked="checked"';}
    if ($kerdes_tipus == 'select') {$check_select = 'checked="checked"';}
    if ($kerdes_tipus == 'checkbox') {$check_checkbox = 'checked="checked"';}
    if ($kerdes_tipus == 'text') {$check_text = 'checked="checked"';}
    if ($kerdes_tipus == 'textarea') {$check_textarea = 'checked="checked"';}
    if ($kerdes_tipus == 'ranking') {$check_ranking = 'checked="checked"';}
} else {
    $urlap_cim = 'Új kérdés rögzítése';
}

if ($_REQUEST[id]){
    $resultx = mysql_query("SELECT sorszam, kerdes_valasz, valasz_hu FROM valaszok WHERE status = '1' AND kerdes_valasz = '$_REQUEST[id]' ORDER BY sorrend");
    while ($next_elementv = mysql_fetch_array($resultx)){
        $valaszok .= '<input type="text" name="valasz_'.$next_elementv[sorszam].'" value="'.$next_elementv[valasz_hu].'" /><img src="graphics/icon_del.png" class="icon_del" alt="törlés" onclick="megerosites_x('.$next_elementv[sorszam].', \'valasz\', \''.$_REQUEST[id].'\')" />';
		$valaszok2 .= '<li name="v" value="1" data-row="1" data-col="1" data-sizex="50" data-sizey="2"><input type="text" name="valasz_'.$next_elementv[sorszam].'" value="'.$next_elementv[valasz_hu].'" /><img src="graphics/icon_del.png" class="icon_del" alt="törlés" onclick="megerosites_x('.$next_elementv[sorszam].', \'valasz\', \''.$_REQUEST[id].'\')" /></li>';
    }
}

$array = array( 'kerdoiv_sorszam'       => $kerdoiv_sorszam,
                'urlap_cim'   => $urlap_cim,
                'valaszok'   => $valaszok,
				'valaszok2'   => $valaszok2,
                'check_radio'   => $check_radio,
                'check_select'   => $check_select,
                'check_checkbox'   => $check_checkbox,
                'check_text'   => $check_text,
                'check_textarea'   => $check_textarea,
                'check_ranking'   => $check_ranking,
                'id'   => $_REQUEST[id],
                'kerdes_szoveg' => $kerdes_szoveg);

$oldal = new html_blokk;
$oldal->load_template_file("templates/ujkerdes.html",$array);
$tartalom = $oldal->html_code;

?>
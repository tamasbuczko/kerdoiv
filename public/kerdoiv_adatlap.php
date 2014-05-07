<?php
$kerdoiv_sorszam = $_REQUEST[kerdoiv];
$user_id = $_SESSION["qa_user_id"];

$resultc = mysql_query ("SELECT cim_hu, cim_en, cim_de, leiras_hu, leiras_en, leiras_de, hu, en, de, datum, aktivalas, lejarat, nyilvanos FROM kerdoivek WHERE sorszam = '$kerdoiv_sorszam' ");
$next_elementc = mysql_fetch_array ($resultc);
$kerdoiv_cim=$next_elementc['cim_'.$_SESSION[lang]];
$kerdoiv_leiras=$next_elementc['leiras_'.$_SESSION[lang]];
$kerdoiv_kelt=$next_elementc['datum'];
$kerdoiv_aktivalas=$next_elementc['aktivalas'];
$kerdoiv_lejarat=$next_elementc['lejarat'];
$kerdoiv_nyilvanos=$next_elementc['nyilvanos'];

//nyelvek száma
$nyelv = 0;
if ($next_elementc[hu] == 1){
    $nyelv_db++;
    $zaszlo_hu = '<span id="magyar_zaszlo"><img src="graphics/magyar_zaszlo.png" alt="'.$lang[magyar].'" />'.$lang[magyar].'</span>';
}
if ($next_elementc[en] == 1){
    $nyelv_db++;
    $zaszlo_en = '<span id="angol_zaszlo"><img src="graphics/angol_zaszlo.png" alt="'.$lang[angol].'" />'.$lang[angol].'</span>';
}
if ($next_elementc[de] == 1){
    $nyelv_db++;
    $zaszlo_de = '<span id="nemet_zaszlo"><img src="graphics/nemet_zaszlo.png" alt="'.$lang[nemet].'" />'.$lang[nemet].'</span>';
}
$zaszlok = 'Kérdőív fordításai ('.$nyelv_db.'): <div id="adatlap_zaszlok">'. $zaszlo_en . $zaszlo_de.$zaszlo_hu.'</div>';

//kérdések száma
$resultx = mysql_query("SELECT COUNT(sorszam) FROM kerdesek WHERE kerdoiv_sorszam = '$kerdoiv_sorszam'");
$x = mysql_fetch_row($resultx);
$kerdesek_szama = 'A kérdések száma: '.$x[0];

//hányan töltötték ki
$result2 = mysql_query("SELECT sorszam FROM valaszadasok WHERE kerdoiv_sorszam = '$kerdoiv_sorszam' GROUP BY kitolto_sorszam");
$valaszadok_szama = 'A kitöltők száma: '.mysql_num_rows($result2);

//hányan töltötték ki (email-el)
$result2 = mysql_query("SELECT va.sorszam FROM valaszadasok AS va LEFT JOIN kitoltok AS k ON va.kitolto_sorszam = k.sorszam WHERE va.kerdoiv_sorszam = $kerdoiv_sorszam AND k.email != '' GROUP BY va.kitolto_sorszam");
$kitoltok_email = mysql_num_rows($result2);
if ($kitoltok_email > 0){
   $kitoltok_link = ' <a href="?p=kitoltok&amp;kerdoiv='.$kerdoiv_sorszam.'">listázás</a>';
}
$valaszadok_szama_emailes = 'A kitöltők száma (e-mail): '.$kitoltok_email.$kitoltok_link;
    
//létrehozás dátuma
$created_date = 'A létrehozás dátuma: '.$kerdoiv_kelt;

//aktiválás dátuma
if (!$kerdoiv_aktivalas){ $kerdoiv_aktivalas = 'még nem aktivált';}
$activated_date = 'Az aktiválás dátuma: '.$kerdoiv_aktivalas;

//lejárat dátuma
if (!$kerdoiv_lejarat){ $kerdoiv_lejarat = 'határozatlan';}
$expire_date = 'Az előfizetés lejárati dátuma: korlátlan <br />Kérdőív lejárati dátuma: '.$kerdoiv_lejarat;

//nyilvánosság
if ($kerdoiv_nyilvanos == '0'){ $nyilvanos = 'nem';}
if ($kerdoiv_nyilvanos == '1'){ $nyilvanos = 'igen';}
$nyilvanos = 'A kérdőív eredményei nyilvánosak: '.$nyilvanos;
 
    $result2 = mysql_query("SELECT COUNT(sorszam) FROM kerdoivek WHERE user_id = '$user_id'");
    $b = mysql_fetch_row($result2);
    $osszes_kerdoiv = $b[0];
    
    $result3 = mysql_query("SELECT sorszam FROM kerdoivek WHERE user_id = '$user_id' ORDER BY sorszam");
    $szamlalo = 0;
    while ($next_elementv = mysql_fetch_array($result3)){
        $szamlalo++;
        $kerdoivekx[$szamlalo] = $next_elementv[sorszam];
        if ($_REQUEST[kerdoiv] == $next_elementv[sorszam]){
            $hanyadik_kerdoiv = $szamlalo;
        }
    }
    $elozo_kerdoiv = $kerdoivekx[$hanyadik_kerdoiv-1];
    $kovetkezo_kerdoiv = $kerdoivekx[$hanyadik_kerdoiv+1];
    
    if ($_REQUEST[kerdoiv] == end($kerdoivekx)){$kovetkezo_kerdoiv = $kerdoivekx[1];}
    if ($_REQUEST[kerdoiv] == $kerdoivekx[1]){$elozo_kerdoiv = end($kerdoivekx);}


$array = array( 'kerdoiv_cim'       => $kerdoiv_cim,
                'kerdoiv_leiras'   => $kerdoiv_leiras,
                'zaszlok'   => $zaszlok,
                'kerdesek_szama'   => $kerdesek_szama,
                'valaszadok_szama'   => $valaszadok_szama,
				'valaszadok_szama_emailes'   => $valaszadok_szama_emailes,
                'created_date'   => $created_date,
                'activated_date'   => $activated_date,
                'expire_date'   => $expire_date,
                'nyilvanos'   => $nyilvanos,
                'elozo_kerdoiv'   => $elozo_kerdoiv,
                'kovetkezo_kerdoiv'   => $kovetkezo_kerdoiv,
                'hanyadik_kerdoiv'   => $hanyadik_kerdoiv,
                'osszes_kerdoiv'   => $osszes_kerdoiv,
                'kerdoiv_sorszam'   => $kerdoiv_sorszam);

$oldal = new html_blokk;
$oldal->load_template_file("templates/kerdoiv_adatlap.html",$array);
$tartalom = $oldal->html_code;
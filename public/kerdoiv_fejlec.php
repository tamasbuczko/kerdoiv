<?php
if ($_REQUEST[kerdoiv]){
    $kerdoiv_sorszam = $_REQUEST[kerdoiv];
    //kezelni, ha nincs a kért sorszámú kérdőív
}
else {
    $kerdoiv_sorszam = 1;
}

#országok beolvasása comboboxhoz
$result = mysql_query("SELECT country_id, short_name, calling_code FROM dat_orszag ORDER BY short_name");
while ($next_element = mysql_fetch_array($result)){
        if ($_REQUEST[lakhely] == $next_element[country_id]){//Ez végzi a kiválasztott elem megtartását.
            $request_lakhely = 'selected="selected"';
        } else {
            $request_lakhely = '';
        }
	$orszag_combo .= '<option value="' . $next_element[country_id] . '" '.$request_lakhely.'>' . $next_element[short_name] . '</option>';
}

#foglalkozások beolvasása comboboxhoz
$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_foglalkozasok ORDER BY nev_hu");
while ($next_element = mysql_fetch_array($result)){
        if ($_REQUEST[foglalkozas] == $next_element[id]){//Ez végzi a kiválasztott elem megtartását.
            $request_foglalkozas = 'selected="selected"';
        } else {
            $request_foglalkozas = '';
        }
        $fogl_nyelv = 'nev_'.$_SESSION[lang];
	$foglalkozas_combo .= '<option value="' . $next_element[id] . '" '.$request_foglalkozas.'>' . $next_element[$fogl_nyelv] . '</option>';
}

#végzettség beolvasása comboboxhoz
$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_vegzettseg ORDER BY nev_hu");
while ($next_element = mysql_fetch_array($result)){
        if ($_REQUEST[vegzettseg] == $next_element[id]){//Ez végzi a kiválasztott elem megtartását.
            $request_vegzettseg = 'selected="selected"';
        } else {
            $request_vegzettseg = '';
        }
        $vegzettseg_nyelv = 'nev_'.$_SESSION[lang];
	$vegzettseg_combo .= '<option value="' . $next_element[id] . '" '.$request_vegzettseg.'>' . $next_element[$vegzettseg_nyelv] . '</option>';
}

#családi állapot beolvasása comboboxhoz
$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_csaladiallapot ORDER BY nev_hu");
while ($next_element = mysql_fetch_array($result)){
        if ($_REQUEST[csaladiallapot] == $next_element[id]){//Ez végzi a kiválasztott elem megtartását.
            $request_csaladiallapot = 'selected="selected"';
        } else {
            $request_csaladiallapot = '';
        }
        $csaladiall_nyelv = 'nev_'.$_SESSION[lang];
	$csaladiallapot_combo .= '<option value="' . $next_element[id] . '" '.$request_csaladiallapot.'>' . $next_element[$csaladiall_nyelv] . '</option>';
}

#jövedelmek beolvasása comboboxhoz
$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_jovedelmek ORDER BY nev_hu");
while ($next_element = mysql_fetch_array($result)){
        if ($_REQUEST[jovedelmek] == $next_element[id]){//Ez végzi a kiválasztott elem megtartását.
            $request_jovedelmek = 'selected="selected"';
        } else {
            $request_jovedelmek = '';
        }
        $jovedelmek_nyelv = 'nev_'.$_SESSION[lang];
	$jovedelmek_combo .= '<option value="' . $next_element[id] . '" '.$request_jovedelmek.'>' . $next_element[$jovedelmek_nyelv] . '</option>';
}

#életkorok beolvasása comboboxhoz
$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_eletkor ORDER BY nev_hu");
while ($next_element = mysql_fetch_array($result)){
        if ($_REQUEST[eletkora] == $next_element[id]){//Ez végzi a kiválasztott elem megtartását.
            $request_neme = 'selected="selected"';
        } else {
            $request_neme = '';
        }
        $neme_nyelv = 'nev_'.$_SESSION[lang];
	$eletkora_combo .= '<option value="' . $next_element[id] . '" '.$request_neme.'>' . $next_element[$neme_nyelv] . '</option>';
}

#nemek beolvasása comboboxhoz
$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_nemek ORDER BY nev_hu");
while ($next_element = mysql_fetch_array($result)){
        if ($_REQUEST[eletkora] == $next_element[id]){//Ez végzi a kiválasztott elem megtartását.
            $request_eletkora = 'selected="selected"';
        } else {
            $request_eletkora = '';
        }
        $eletkora_nyelv = 'nev_'.$_SESSION[lang];
	$neme_combo .= '<option value="' . $next_element[id] . '" '.$request_eletkora.'>' . $next_element[$eletkora_nyelv] . '</option>';
}

//a választott nyelv szerinti kérdőív cím és leírás betöltése
$resultc = mysql_query ("SELECT cim_hu, cim_en, cim_de, leiras_hu, leiras_en, leiras_de, hu, en, de, fejlec_kep, css_id, zaras_hu, zaras_en, zaras_de, status FROM kerdoivek WHERE sorszam = '$kerdoiv_sorszam' ");
$next_elementc = mysql_fetch_array ($resultc);
$kerdoiv_cim=$next_elementc['cim_'.$_SESSION[lang]];
$kerdoiv_leiras=nl2br($next_elementc['leiras_'.$_SESSION[lang]]);
$kerdoiv_fejlec_kep=$next_elementc['fejlec_kep'];
$kerdoiv_css=$next_elementc['css_id'];
$kerdoiv_zaras=$next_elementc['zaras_'.$_SESSION[lang]];

if ($kerdoiv_css > 0){
   $resultcc = mysql_query ("SELECT file FROM css WHERE sorszam = '$kerdoiv_css'");
   $next_elementcss = mysql_fetch_array($resultcc);
   $kerdoiv_css = $next_elementcss[file];
}

$resultx = mysql_query ("SELECT neme, kora, orszag, varos, foglalkozas, vegzettseg, jovedelem, csaladiallapot FROM kerdoiv_szemelyesadat WHERE kerdoiv_sorszam = '$kerdoiv_sorszam'");
$next_elementx = mysql_fetch_array ($resultx);
$kapcs_neme = $next_elementx[neme];
$kapcs_kora = $next_elementx[kora];
$kapcs_orszag = $next_elementx[orszag];
$kapcs_varos = $next_elementx[varos];
$kapcs_foglalkozas = $next_elementx[foglalkozas];
$kapcs_vegzettseg = $next_elementx[vegzettseg];
$kapcs_jovedelem = $next_elementx[jovedelem];
$kapcs_csaladiallapot = $next_elementx[csaladiallapot];

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

if ($nyelv_db > 1){
$nyelv_blokk = '<div id="languages">
                        <h3>'.$lang[nyelv_valasztas].'</h3>
                        '.$zaszlo_en.'
                        '.$zaszlo_de.'
                        '.$zaszlo_hu.'
                </div>';
}

if ($nyelv_db > 1){
$control_box_distance = 'style="margin-left: 690px"';
$intro_width = 'width: 400px';
} else {
       $control_box_distance = 'style="margin-left: 690px"';
       $intro_width = 'width: 550px';
       }

if (($_REQUEST[mod]) AND ($_SESSION[qa_user_id])){
   $fejlec_szerk = '<a href="?p=ujkerdoiv&amp;id='.$kerdoiv_sorszam.'" class="modosito_gomb" title="kérdőív módosítása"></a>';
   $control_box = '<div id="control_box" '.$control_box_distance.'>
                            <h3>'.$lang[vezerlopult].'</h3>
							<br />
                            <a href="?p=kerdoiv_adatlap&kerdoiv='.$kerdoiv_sorszam.'" class="sarga_gomb" style="float: left; margin-bottom: 20px;">'.$lang['kérdőív adatlap'].'</a>
                            <a href="?p=ujkerdes&amp;kerdoiv='.$kerdoiv_sorszam.'&ujkerdes=x" class="zold_gomb" style="float: left;">'.$lang[uj_kerdes_rogzitese].'</a>
                            <a href="?p=ujkerdoiv&amp;id='.$kerdoiv_sorszam.'" class="sarga_gomb" style="float: left;">'.$lang[kerdoiv_modositasa].'</a>
							<br /><br />
                            <a href="?p=kerdoiveim" class="back" />'.$lang[vissza].'</a>
                        </div>
						<script type="text/javascript">control_box();</script>';
}

if ($kerdoiv_fejlec_kep){
$kerdoiv_headline = '<div id="headline">
                    <img src="fejlec_kepek/'.$kerdoiv_fejlec_kep.'" id="headline_img" alt="" />
                   </div>';
}

unset($nyelv_blokk);

if ($kapcs_kora == '1'){
   $x_kora = '<label>'.$lang[eletkor].'</label>
                        <select name="eletkora">
                            '.$request_eletkora_value.'
                            <option value="x">---</option>
                            '.$eletkora_combo.'
                        </select><br />';
}

if ($kapcs_neme == '1'){
   $x_neme = '<label>'.$lang[neme].'</label>
                        <select name="neme">
                            '.$request_neme_value.'
                            <option value="x">---</option>
                            '.$neme_combo.'
                        </select>
                        <br />';
}

if ($kapcs_foglalkozas == '1'){
   $x_foglalkozas = '<label>'.$lang[foglalkozas].'</label>
                        <select name="foglalkozas">
                            <option value="x">---</option>
                            '.$foglalkozas_combo.'
                        </select>
                        <br />';
}

if ($kapcs_orszag == '1'){
   $x_orszag = ' <label>'.$lang[orszag].'</label>
                        <select name="lakhely">
                            <option value="x">---</option>
                            '.$orszag_combo.'
                        </select>
                        <br />';
}

if ($kapcs_vegzettseg == '1'){
   $x_vegzettseg = ' <label>'.$lang['Végzettség:'].'</label>
                        <select name="vegzettseg">
                            <option value="x">---</option>
                            '.$vegzettseg_combo.'
                        </select>
                        <br />';
}

if ($kapcs_csaladiallapot == '1'){
   $x_csaladiallapot = ' <label>'.$lang['Családi állapot:'].'</label>
                        <select name="csaladiallapot">
                            <option value="x">---</option>
                            '.$csaladiallapot_combo.'
                        </select>
                        <br />';
}
   
if ($kapcs_jovedelem == '1'){
   $x_jovedelmek = ' <label>'.$lang['Jövedelmek:'].'</label>
                        <select name="jovedelmek">
                            <option value="x">---</option>
                            '.$jovedelmek_combo.'
                        </select>
                        <br />';
}   

$kerdoiv_fejlec = $kerdoiv_headline.'
                  <div id="intro">
                    '.$nyelv_blokk.'
                    <div id="survey_intro" style="'.$adat_off2.'">
                        <h1>'.$kerdoiv_cim.'</h1>
                        '.$fejlec_szerk.'
                        <div id="survey_intro_div">
                            '.$kerdoiv_leiras.'
                        </div>

                        '.$control_box.'

                    </div>
					
                </div> 

		 <div id="survey">
           <form action="?" name="form_survey" id="form_survey" method="post">'
		. '<input type="hidden" name="kerdoiv" id="kerdoiv" value="'.$kerdoiv_sorszam.'" />
                    <input type="hidden" name="p" id="p" value="'.$_REQUEST[p].'" />
                    <div class="szemelyes" style="'.$adat_off.'">                        
                        '.$x_kora.'
                        '.$x_neme.'
                        '.$x_orszag.'
                        '.$x_foglalkozas.'
                        '.$x_vegzettseg.'
                        '.$x_csaladiallapot.'
                        '.$x_jovedelmek.'
                    </div>';

If (!$kerdoiv_cim){
   $tartalom = '<div id="koszonjuk">Nincs ilyen kérdőív!</div>';
   $adat_off = 'display: none;';
   $adat_off2 = 'display: none;';   
}
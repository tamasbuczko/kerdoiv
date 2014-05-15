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

$resultx = mysql_query ("SELECT neme, kora, orszag, varos, foglalkozas FROM kerdoiv_szemelyesadat WHERE kerdoiv_sorszam = '$kerdoiv_sorszam'");
$next_elementx = mysql_fetch_array ($resultx);
$kapcs_neme = $next_elementx[neme];
$kapcs_kora = $next_elementx[kora];
$kapcs_orszag = $next_elementx[orszag];
$kapcs_varos = $next_elementx[varos];
$kapcs_foglalkozas = $next_elementx[foglalkozas];

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
                            <option value="0">---</option>
                            <option value="18">&lt;18</option>
                            <option value="18-25">18-25</option>
                            <option value="25-35">25-35</option>
                            <option value="35-45">35-45</option>
                            <option value="45">45&lt;</option>
                        </select><br />';
}

if ($kapcs_neme == '1'){
   $x_neme = '<label>'.$lang[neme].'</label>
                        <select name="neme">
                            '.$request_neme_value.'
                            <option value="0">---</option>
                            <option value="'.$lang[ferfi].'">'.$lang[ferfi].'</option>
                            <option value="'.$lang[no].'">'.$lang[no].'</option>
                        </select>
                        <br />';
}

if ($kapcs_foglalkozas == '1'){
   $x_foglalkozas = '<label>'.$lang[foglalkozas].'</label>
                        <select name="foglalkozas">
                            <option value="0">---</option>
                            '.$foglalkozas_combo.'
                        </select>
                        <!--<input type="text" name="foglalkozas" value="'.$request_foglalkozas_value.' " />
<select id="in_work2" name="in_work2" style="width:auto;">
<option value=""> ---- </option>
<option value="job1">Adminisztráció / Titkári</option>
<option value="job2">Bank</option>
<option value="job6">Biztonság / Honvédelem</option>
<option value="job25">Egyéb</option>
<option value="job22">Egészségügy / Szociális ellátás</option>
<option value="job5">Emberi erőforrások</option>
<option value="12">Háztartásbeli</option>
<option value="job8">Információs technológia / Elektronika</option>
<option value="job10">Jog / Jogi tanácsadás</option>
<option value="job17">Kereskedelem</option>
<option value="job11">Kultúra / Művészetek / Szórakozás</option>
<option value="job18">Közlekedés / Logisztika</option>
<option value="job14">Marketing / Reklám</option>
<option value="job20">Menedzsment</option>
<option value="job12">Mezőgazdaság / Környezettudományok</option>
<option value="job3">Munkanélküli</option>
<option value="job24">Média / PR</option>
<option value="job9">Oktatás / Tudomány</option>
<option value="job7">Pénzügy / Könyvelés</option>
<option value="job15">Szolgáltatás</option>
<option value="job23">Telekommunikáció</option>
<option value="job16">Termelés / Gyártás</option>
<option value="job19">Turizmus / Hotelek / Vendéglátás</option>
<option value="job21">Állami adminisztráció / Igazgatásszervezés</option>
<option value="job4">Építőipar / Ingatlanforgalmazás</option>
</select>-->
                        <br />';
}

if ($kapcs_orszag == '1'){
   $x_orszag = ' <label>'.$lang[orszag].'</label>
                        <select name="lakhely">
                            <option value="0">---</option>
                            '.$orszag_combo.'
                        </select>
                        <br />';
}

#if ($kapcs_vegzettseg == '1'){
   $x_vegzettseg = ' <label>'.$lang['végzettség'].'</label>
                        <select name="vegzettseg">
                            <option value="0">---</option>
                            '.$vegzettseg_combo.'
                        </select>
                        <br />';
#}



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
                    </div>';

If (!$kerdoiv_cim){
   $tartalom = '<div id="koszonjuk">Nincs ilyen kérdőív!</div>';
   $adat_off = 'display: none;';
   $adat_off2 = 'display: none;';   
}

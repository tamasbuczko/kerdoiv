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

//a választott nyelv szerinti kérdőív cím és leírás betöltése
$resultc = mysql_query ("SELECT cim_hu, cim_en, cim_de, leiras_hu, leiras_en, leiras_de, hu, en, de, fejlec_kep, css_id, zaras_hu, zaras_en, zaras_de FROM kerdoivek WHERE status = '1' AND sorszam = '$kerdoiv_sorszam' ");
$next_elementc = mysql_fetch_array ($resultc);
$kerdoiv_cim=$next_elementc['cim_'.$_SESSION[lang]];
$kerdoiv_leiras=$next_elementc['leiras_'.$_SESSION[lang]];
$kerdoiv_fejlec_kep=$next_elementc['fejlec_kep'];
$kerdoiv_css=$next_elementc['css_id'];
$kerdoiv_zaras=$next_elementc['zaras_'.$_SESSION[lang]];

if ($kerdoiv_css > 0){
   $resultcc = mysql_query ("SELECT file FROM css WHERE sorszam = '$kerdoiv_css'");
   $next_elementcss = mysql_fetch_array($resultcc);
   $kerdoiv_css = $next_elementcss[file];
}

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
$control_box_distance = 'style="margin-left: 450px"';
$intro_width = 'width: 400px';
} else {
       $control_box_distance = 'style="margin-left: 650px"';
       $intro_width = 'width: 550px';
       }

if (($_REQUEST[mod]) AND ($_SESSION[qa_user_id])){
   $fejlec_szerk = '<a href="?p=ujkerdoiv&amp;id='.$kerdoiv_sorszam.'" class="modosito_gomb" title="kérdőív adatlap módosítása"></a>';
   $control_box = '<div id="control_box" '.$control_box_distance.'>
                            <h3>Vezérlőpult</h3>
							<br />
                            <a href="?p=ujkerdes&amp;kerdoiv='.$kerdoiv_sorszam.'&ujkerdes=x">Új kérdés rögzítése</a>
							<br /><br />
                            <a href="?p=kerdoiveim" class="back" />vissza</a>
                        </div>
						<script type="text/javascript">control_box();</script>';
}

if ($kerdoiv_fejlec_kep){
$kerdoiv_headline = '<div id="headline">
                    <img src="fejlec_kepek/'.$kerdoiv_fejlec_kep.'" id="headline_img" alt="" />
                   </div>';
}

$kerdoiv_fejlec = $kerdoiv_headline.'
                  <div id="intro">
                    '.$nyelv_blokk.'
                    <div id="survey_intro" style="'.$adat_off2.'">
                        <h1 style="'.$intro_width.'">'.$kerdoiv_cim.'</h1>
                        '.$fejlec_szerk.'
                        <div id="survey_intro_div" style="'.$intro_width.'">
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
                        <label>'.$lang[eletkor].'</label>
                        <select name="eletkora">
                            '.$request_eletkora_value.'
                            <option value="0">---</option>
                            <option value="18">&lt;18</option>
                            <option value="18-25">18-25</option>
                            <option value="25-35">25-35</option>
                            <option value="35-45">35-45</option>
                            <option value="45">45&lt;</option>
                        </select>
                        <br />
                        <label>'.$lang[neme].'</label>
                        <select name="neme">
                            '.$request_neme_value.'
                            <option value="0">---</option>
                            <option value="'.$lang[ferfi].'">'.$lang[ferfi].'</option>
                            <option value="'.$lang[no].'">'.$lang[no].'</option>
                        </select>
                        <br />
                        <label>'.$lang[orszag].'</label>
                        <select name="lakhely">
                            <option value="0">---</option>
                            '.$orszag_combo.'
                        </select>
                        <br />
                        <label>'.$lang[foglalkozas].'</label>
                        <input type="text" name="foglalkozas" value="'.$request_foglalkozas_value.'" />
                        <br />
                    </div>';

If (!$kerdoiv_cim){
   $tartalom = '<div id="koszonjuk">Nincs ilyen kérdőiv!</div>';
   $adat_off = 'display: none;';
   $adat_off2 = 'display: none;';   
}
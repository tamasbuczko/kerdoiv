<?php
if ($_REQUEST[kerdoiv]){
    $kerdoiv_sorszam = $_REQUEST[kerdoiv];
    //kezelni, ha nincs a kért sorszámú kérdőív
}
else {
    $kerdoiv_sorszam = 1;
}

//a választott nyelv szerinti kérdőív cím és leírás betöltése
$resultc = mysql_query ("SELECT cim_hu, cim_en, cim_de, leiras_hu, leiras_en, leiras_de FROM kerdoivek WHERE status = '1' AND sorszam = '$kerdoiv_sorszam' ");
$next_elementc = mysql_fetch_array ($resultc);
$kerdoiv_cim=$next_elementc['cim_'.$_SESSION[lang]];
$kerdoiv_leiras=$next_elementc['leiras_'.$_SESSION[lang]];

$kerdoiv_fejlec = '<div id="intro">
                    <div id="languages">
                        <h3>'.$lang[nyelv_valasztas].'</h3>
                        <span id="magyar_zaszlo"><img src="graphics/magyar_zaszlo.png" alt="'.$lang[magyar].'" />'.$lang[magyar].'</span>
                        <span id="angol_zaszlo"><img src="graphics/angol_zaszlo.png" alt="'.$lang[angol].'" />'.$lang[angol].'</span>
                        <!--
                        <span id="nemet_zaszlo"><img src="graphics/nemet_zaszlo.png" alt="'.$lang[nemet].'" />'.$lang[nemet].'</span>
                        -->
                    </div>
                    <div id="survey_intro" style="'.$adat_off2.'">
                        <h1>'.$kerdoiv_cim.'</h1>
                        <div>
                            '.$kerdoiv_leiras.'
                        </div>
                    </div>
                </div> 

		 <div id="survey">
           <form action="?" name="form_survey" id="form_survey" method="post">'
		. '<input type="hidden" name="kerdoiv" value="'.$kerdoiv_sorszam.'" />
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

?>
<?phpif ($_REQUEST[kerdoiv]) {    $kerdoiv_sorszam = $_REQUEST[kerdoiv];    //kezelni, ha nincs a kért sorszámú kérdőív} else {    $kerdoiv_sorszam = 1;}#országok beolvasása comboboxhoz$result = mysql_query("SELECT country_id, short_name, calling_code FROM dat_orszag ORDER BY short_name");while ($next_element = mysql_fetch_array($result)) {    if ($_REQUEST[lakhely] == $next_element[country_id]) {//Ez végzi a kiválasztott elem megtartását.        $request_lakhely = 'selected="selected"';    } else {        $request_lakhely = '';    }    $orszag_combo .= '<option value="' . $next_element[country_id] . '" ' . $request_lakhely . '>' . $next_element[short_name] . '</option>';}#foglalkozások beolvasása comboboxhoz$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_foglalkozasok ORDER BY nev_hu");while ($next_element = mysql_fetch_array($result)) {    if ($_REQUEST[foglalkozas] == $next_element[id]) {//Ez végzi a kiválasztott elem megtartását.        $request_foglalkozas = 'selected="selected"';    } else {        $request_foglalkozas = '';    }    $fogl_nyelv = 'nev_' . $_SESSION[lang];    $foglalkozas_combo .= '<option value="' . $next_element[id] . '" ' . $request_foglalkozas . '>' . $next_element[$fogl_nyelv] . '</option>';}#végzettség beolvasása comboboxhoz$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_vegzettseg ORDER BY nev_hu");while ($next_element = mysql_fetch_array($result)) {    if ($_REQUEST[vegzettseg] == $next_element[id]) {//Ez végzi a kiválasztott elem megtartását.        $request_vegzettseg = 'selected="selected"';    } else {        $request_vegzettseg = '';    }    $vegzettseg_nyelv = 'nev_' . $_SESSION[lang];    $vegzettseg_combo .= '<option value="' . $next_element[id] . '" ' . $request_vegzettseg . '>' . $next_element[$vegzettseg_nyelv] . '</option>';}#családi állapot beolvasása comboboxhoz$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_csaladiallapot ORDER BY nev_hu");while ($next_element = mysql_fetch_array($result)) {    if ($_REQUEST[csaladiallapot] == $next_element[id]) {//Ez végzi a kiválasztott elem megtartását.        $request_csaladiallapot = 'selected="selected"';    } else {        $request_csaladiallapot = '';    }    $csaladiall_nyelv = 'nev_' . $_SESSION[lang];    $csaladiallapot_combo .= '<option value="' . $next_element[id] . '" ' . $request_csaladiallapot . '>' . $next_element[$csaladiall_nyelv] . '</option>';}#jövedelmek beolvasása comboboxhoz$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_jovedelmek ORDER BY nev_hu");while ($next_element = mysql_fetch_array($result)) {    if ($_REQUEST[jovedelmek] == $next_element[id]) {//Ez végzi a kiválasztott elem megtartását.        $request_jovedelmek = 'selected="selected"';    } else {        $request_jovedelmek = '';    }    $jovedelmek_nyelv = 'nev_' . $_SESSION[lang];    $jovedelmek_combo .= '<option value="' . $next_element[id] . '" ' . $request_jovedelmek . '>' . $next_element[$jovedelmek_nyelv] . '</option>';}#életkorok beolvasása comboboxhoz$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_eletkor ORDER BY nev_hu");while ($next_element = mysql_fetch_array($result)) {    if ($_REQUEST[eletkora] == $next_element[id]) {//Ez végzi a kiválasztott elem megtartását.        $request_eletkora = 'selected="selected"';    } else {        $request_eletkora = '';    }    $eletkora_nyelv = 'nev_' . $_SESSION[lang];    $eletkora_combo .= '<option value="' . $next_element[id] . '" ' . $request_eletkora . '>' . $next_element[$eletkora_nyelv] . '</option>';}#nemek beolvasása comboboxhoz$result = mysql_query("SELECT id, nev_hu, nev_en, nev_de FROM dat_nemek ORDER BY nev_hu");while ($next_element = mysql_fetch_array($result)) {    if ($_REQUEST[neme] == $next_element[id]) {//Ez végzi a kiválasztott elem megtartását.        $request_neme = 'selected="selected"';    } else {        $request_neme = '';    }    $neme_nyelv = 'nev_' . $_SESSION[lang];    $neme_combo .= '<option value="' . $next_element[id] . '" ' . $request_neme . '>' . $next_element[$neme_nyelv] . '</option>';}//a választott nyelv szerinti kérdőív cím és leírás betöltése$resultc = mysql_query("SELECT cim_hu, cim_en, cim_de, leiras_hu, leiras_en, leiras_de, hu, en, de, fejlec_kep, css_id, zaras_hu, zaras_en, zaras_de, status, email FROM kerdoivek WHERE sorszam = '$kerdoiv_sorszam' ");$next_elementc = mysql_fetch_array($resultc);$kerdoiv_cim = $next_elementc['cim_' . $_SESSION[lang]];$kerdoiv_leiras = nl2br($next_elementc['leiras_' . $_SESSION[lang]]);$kerdoiv_fejlec_kep = $next_elementc['fejlec_kep'];$kerdoiv_zaras = $next_elementc['zaras_' . $_SESSION[lang]];$kapcs_email = $next_elementc[email];$resultx = mysql_query("SELECT email, neme, kora, orszag, varos, foglalkozas, vegzettseg, jovedelem, csaladiallapot FROM kerdoiv_szemelyesadat WHERE kerdoiv_sorszam = '$kerdoiv_sorszam'");$next_elementx = mysql_fetch_array($resultx);$kapcs_neme = $next_elementx[neme];$kapcs_kora = $next_elementx[kora];$kapcs_orszag = $next_elementx[orszag];$kapcs_varos = $next_elementx[varos];$kapcs_foglalkozas = $next_elementx[foglalkozas];$kapcs_vegzettseg = $next_elementx[vegzettseg];$kapcs_jovedelem = $next_elementx[jovedelem];$kapcs_csaladiallapot = $next_elementx[csaladiallapot];$nyelv = 0;if ($next_elementc[hu] == 1) {    $nyelv_db++;    $zaszlo_hu = '<span id="magyar_zaszlo"><img src="graphics/magyar_zaszlo.png" alt="' . $lang[magyar] . '" />' . $lang[magyar] . '</span>';}if ($next_elementc[en] == 1) {    $nyelv_db++;    $zaszlo_en = '<span id="angol_zaszlo"><img src="graphics/angol_zaszlo.png" alt="' . $lang[angol] . '" />' . $lang[angol] . '</span>';}if ($next_elementc[de] == 1) {    $nyelv_db++;    $zaszlo_de = '<span id="nemet_zaszlo"><img src="graphics/nemet_zaszlo.png" alt="' . $lang[nemet] . '" />' . $lang[nemet] . '</span>';}if ($nyelv_db > 1) {    $nyelv_blokk = '<div id="languages">                        <h3>' . $lang[nyelv_valasztas] . '</h3>                        ' . $zaszlo_en . '                        ' . $zaszlo_de . '                        ' . $zaszlo_hu . '                </div>';}if ($nyelv_db > 1) {    $control_box_distance = 'style="margin-left: 690px"';    $intro_width = 'width: 400px';} else {    $control_box_distance = 'style="margin-left: 690px"';    $intro_width = 'width: 550px';}//kérdőív másolásaif (($_REQUEST[masol]) AND ( $_SESSION[qa_user_id])) {    //Bemeneti adat int-e    if (filter_input(INPUT_GET, "kerdoiv", FILTER_VALIDATE_INT)) {        /////////////////////////        //        //          Kérdőív másolása        //                $kerdoiveredeti = mysql_fetch_row(mysql_query("SELECT * FROM `kerdoivek` WHERE `sorszam`='" . $_GET[kerdoiv] . "'"));        $ma = date("Y-m-d");                $ujkerdoivbeszuras = "INSERT INTO  `kerdoivek` VALUES (NULL ";        //-------------------Ezzel a módszerrel a dátum változó a régiét kapja ami lehet hiba!        for ($index = 1; $index < count($kerdoiveredeti); $index++) {            if ($index == 2) {                $kerdoiveredeti[$index] = $kerdoiveredeti[$index] . " másolat";            }            if ($index == 1) {                $kerdoiveredeti[$index] = $kerdoiveredeti[$index] . "_masolat";            }            if ($index == 8) {                $kerdoiveredeti[$index] ="0";            }            $ujkerdoivbeszuras = $ujkerdoivbeszuras . ", '" . $kerdoiveredeti[$index] . "'";        }        $ujkerdoivbeszuras = $ujkerdoivbeszuras . ")";        //beillesztük az új kérdőívet        mysql_query($ujkerdoivbeszuras);        //echo $ujkerdoivbeszuras."<br />";        //lekérjük az új kérdőív ID-jét ami a $ujkerdoivid[id] változóban megtalálható lesz        $ujkerdoivid = mysql_fetch_assoc(mysql_query("SELECT `sorszam` as id FROM `kerdoivek` ORDER BY `sorszam` DESC"));        /////////////////////////////////6        //        //        //        //          Kérdések másolása        //kérdések másolása        $kerdesekeredetik = mysql_query("SELECT * FROM `kerdesek` WHERE `kerdoiv_sorszam`='" . $_GET[kerdoiv] . "'");        while ($kerdesekeredeti = mysql_fetch_row($kerdesekeredetik)) {            $ujkerdesbeszuras = "INSERT INTO  `kerdesek` VALUES (NULL, '" . $ujkerdoivid[id] . "' ";            for ($index = 2; $index < count($kerdesekeredeti); $index++) {                $ujkerdesbeszuras = $ujkerdesbeszuras . ", '" . $kerdesekeredeti[$index] . "'";            }            $ujkerdesbeszuras = $ujkerdesbeszuras . ")";            //beillesztük az új kérdőívet            //echo $ujkerdesbeszuras."<br />";            mysql_query($ujkerdesbeszuras);            //a kérdés ID-je            $ujkerdesid = mysql_fetch_assoc(mysql_query("SELECT `sorszam` as id FROM `kerdesek` ORDER BY `sorszam` DESC"));           //////////////////////////            ///            //            //              Válaszok másolása            //feltöltjük a válaszadási lehetőségeket is, ez az utolsó szint            $valaszokeredetik = mysql_query("SELECT * FROM `valaszok` WHERE `kerdoiv_sorszam`='" . $_GET[kerdoiv] . "' AND `kerdes_valasz`='" . $kerdesekeredeti[0] . "'");           // echo "SELECT * FROM `valaszok` WHERE `kerdoiv_sorszam`='" . $_GET[kerdoiv] . "' AND `kerdes_valasz`='" . $kerdesekeredeti[0] . "'";            while ($valaszokeredeti = mysql_fetch_row($valaszokeredetik)) {                $ujvalaszbeszuras = "INSERT INTO  `valaszok` VALUES (NULL, '" . $ujkerdoivid[id] . "', '" . $ujkerdesid[id] . "' ";                for ($index = 3; $index < count($valaszokeredeti); $index++) {                    $ujvalaszbeszuras = $ujvalaszbeszuras . ", '" . $valaszokeredeti[$index] . "'";                }                $ujvalaszbeszuras = $ujvalaszbeszuras . ")";                //beillesztük az új kérdőívet                //echo $ujvalaszbeszuras."<br />";                mysql_query($ujvalaszbeszuras);            }        }         header("Location: index.php?p=kerdoiv&mod=1&kerdoiv=".$ujkerdoivid[id]);    } else {        //logolas hibás próbálkozás vagy törési kisérletre    }}if (($_REQUEST[mod]) AND ( $_SESSION[qa_user_id])) {    $fejlec_szerk = '<a href="?p=ujkerdoiv&amp;id=' . $kerdoiv_sorszam . '" class="modosito_gomb" title="kérdőív módosítása"></a>';    $control_box = '<div id="control_box" ' . $control_box_distance . '>                            <h3>' . $lang['vezérlőpult'] . '</h3>							<br />                            <a href="?p=ujkerdes&amp;kerdoiv=' . $kerdoiv_sorszam . '&ujkerdes=x" class="zold_gomb" style="float: left;">' . $lang['új kérdés rögzítése'] . '</a>                                                        <a href="?p=kerdoiv_adatlap&kerdoiv=' . $kerdoiv_sorszam . '" class="sarga_gomb" style="float: left; margin-bottom: 20px;">' . $lang['kérdőív adatlap'] . '</a>                                                        <a href="?p=ujkerdoiv&amp;id=' . $kerdoiv_sorszam . '" class="zold_gomb" style="float: left;">' . $lang['kérdőív módosítása'] . '</a>							<br /><br />                            <a href="?p=kerdoiveim" class="back" />' . $lang['vissza'] . '</a>                        </div>						<script type="text/javascript">control_box();</script>';}if ($kerdoiv_fejlec_kep) {    $kerdoiv_headline = '<div id="headline">                    <img src="fejlec_kepek/' . $kerdoiv_fejlec_kep . '" id="headline_img" alt="" />                   </div>';}unset($nyelv_blokk);if ($kapcs_kora == '1') {    $x_kora = '<label class="kitoltoi_adatok">' . $lang['életkor'] . ':</label>                        <select name="eletkora">                            ' . $request_eletkora_value . '                            <option value="x">---</option>                            ' . $eletkora_combo . '                        </select><br />';}if ($kapcs_neme == '1') {    $x_neme = '<label class="kitoltoi_adatok">' . $lang['neme'] . ':</label>                        <select name="neme">                            ' . $request_neme_value . '                            <option value="x">---</option>                            ' . $neme_combo . '                        </select>                        <br />';}if ($kapcs_foglalkozas == '1') {    $x_foglalkozas = '<label class="kitoltoi_adatok">' . $lang['foglalkozás'] . ':</label>                        <select name="foglalkozas">                            <option value="x">---</option>                            ' . $foglalkozas_combo . '                        </select>                        <br />';}if ($kapcs_orszag == '1') {    $x_orszag = ' <label class="kitoltoi_adatok">' . $lang['ország'] . ':</label>                        <select name="lakhely">                            <option value="x">---</option>                            ' . $orszag_combo . '                        </select>                        <br />';}if ($kapcs_vegzettseg == '1') {    $x_vegzettseg = ' <label class="kitoltoi_adatok">' . $lang['végzettség'] . ':</label>                        <select name="vegzettseg">                            <option value="x">---</option>                            ' . $vegzettseg_combo . '                        </select>                        <br />';}if ($kapcs_csaladiallapot == '1') {    $x_csaladiallapot = ' <label class="kitoltoi_adatok">' . $lang['családi állapot'] . ':</label>                        <select name="csaladiallapot">                            <option value="x">---</option>                            ' . $csaladiallapot_combo . '                        </select>                        <br />';}if ($kapcs_jovedelem == '1') {    $x_jovedelmek = ' <label class="kitoltoi_adatok">' . $lang['jövedelem'] . ':</label>                        <select name="jovedelmek">                            <option value="x">---</option>                            ' . $jovedelmek_combo . '                        </select>                        <br />';}$kerdoiv_fejlec = $kerdoiv_headline . '                  <div id="intro">                    ' . $nyelv_blokk . '                    <div id="survey_intro" style="' . $adat_off2 . '">                        <h1>' . $kerdoiv_cim . '</h1>                        ' . $fejlec_szerk . '                        <div id="survey_intro_div">                            ' . $kerdoiv_leiras . '                        </div>                        ' . $control_box . '                    </div>					                </div> 		 <div id="survey">           <form action="?" name="form_survey" id="form_survey" method="post">'        . '<input type="hidden" name="kerdoiv" id="kerdoiv" value="' . $kerdoiv_sorszam . '" />                    <input type="hidden" name="p" id="p" value="' . $_REQUEST[p] . '" />                    <div class="szemelyes" style="' . $adat_off . '">                                                ' . $x_kora . '                        ' . $x_neme . '                        ' . $x_orszag . '                        ' . $x_foglalkozas . '                        ' . $x_vegzettseg . '                        ' . $x_csaladiallapot . '                        ' . $x_jovedelmek . '                    </div>';If (!$kerdoiv_cim) {    $tartalom = '<div id="koszonjuk">Nincs ilyen kérdőív!</div>';    $adat_off = 'display: none;';    $adat_off2 = 'display: none;';}$smarty->assign('lang', $lang);
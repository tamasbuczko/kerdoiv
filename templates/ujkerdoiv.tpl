<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"><script src="http://code.jquery.com/jquery-1.9.1.js"></script><script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script><link rel="stylesheet" href="/resources/demos/style.css">{literal}<script>    $(document).ready(function() {        $("#aktivalas_datum").datepicker({changeMonth: true, changeYear: true, yearRange: '-0:+10', dateFormat: 'yy-MM-dd', firstDay: 1, dayNamesMin: ['Va', 'Hé', 'Ke', 'Sz', 'Cs', 'Pé', 'Sz'],            monthNamesShort: ['Január', 'Február', 'Március', 'Április', 'Május', 'Június', 'Július', 'Augusztus', 'Szeptember', 'Október', 'November', 'December'],            monthNames: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'], showMonthAfterYear: true, altField: '#actualDate', altFormat: 'yy-mm-dd'});    });    $("#lejarat_datum").datepicker("option", "firstDay", 1);    $(document).ready(function() {        $("#lejarat_datum").datepicker({changeMonth: true, changeYear: true, yearRange: '-0:+10', dateFormat: 'yy-MM-dd', firstDay: 1, dayNamesMin: ['Va', 'Hé', 'Ke', 'Sz', 'Cs', 'Pé', 'Sz'],            monthNamesShort: ['Január', 'Február', 'Március', 'Április', 'Május', 'Június', 'Július', 'Augusztus', 'Szeptember', 'Október', 'November', 'December'],            monthNames: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'], showMonthAfterYear: true, altField: '#actualDate', altFormat: 'yy-mm-dd'});    });    $("#lejarat_datum").datepicker("option", "firstDay", 1);    </script>{/literal}<h1>{$urlap_cim}</h1><form action="" method="post" enctype="multipart/form-data" class="ujkerdes">    <div id="control_box">        <h3>{$lang['Vezérlőpult']}</h3>        <div {$control_box_ki}>            <label>Látható nyelvek:</label>            <img src="graphics/magyar_zaszlo_k.png" id="hu" alt="magyar" onclick="nyelv_kapcs(this.id)" {$control_hu} />            <img src="graphics/angol_zaszlo_k.png" id="en" alt="angol" onclick="nyelv_kapcs(this.id)" {$control_en} />            <img src="graphics/nemet_zaszlo_k.png" id="de" alt="német" onclick="nyelv_kapcs(this.id)" {$control_de} />        </div>        <input type="submit" name="mentes" value="{$lang['Mentés']}"/>        <a href="{$vissza_link}" class="back">{$lang['vissza']}</a>    </div>    <input type="hidden" name="sorszam" value="{$id}" />    <label>Milyen nyelveken szeretnéd elkészíteni a kérdőívet?</label>    <div>            <label>angol</label><input type="checkbox" {$checked_en} name="check_en" onclick="nyelv_kapcs('en')" /><br />    </div>    <div>        <label>német</label><input type="checkbox" {$checked_de} name="check_de" onclick="nyelv_kapcs('de')" /><br />    </div>    <div>        <label>magyar</label><input type="checkbox" {$checked_hu} name="check_hu" onclick="nyelv_kapcs('hu')" /><br />    </div>    <br style="clear: both;" />    <label>Fejléckép feltöltése a kérdőívhez</label>    <div class="file_browse_wrapper_x">        <input name="fejlec_kep" type="file" size="30" title="kép feltöltése" value="ok" accept="image/*" onchange="kepfigyel('fejlec_kep_uzenet')" />    </div>    <div class="mentes_uzenet" id="fejlec_kep_uzenet">A kép feltöltéséhez mentés szükséges!</div>    {$kep_fejlec}    <br style="clear: both;" />    <label>A kérdőív címe</label>    <input type="text" name="cim_en" id="cim_en" value="{$cim_en}" placeholder="Title of the new survey" {$cim_enx}/>    <input type="text" name="cim_de" id="cim_de" value="{$cim_de}" placeholder="Titel der neuen Umfrage" {$cim_dex}/>    <input type="text" name="cim_hu" id="cim_hu" value="{$cim_hu}" placeholder="Az új kérdőív címe" onclick="del_text(this.id)" {$cim_hux}/>    <label>Leírás</label>    <textarea name="leiras_en" id="leiras_en"{$leiras_enx} placeholder="Short description of the new survey">{$leiras_en}</textarea>    <textarea name="leiras_de" id="leiras_de"{$leiras_dex} placeholder="Kurze Beschreibung der neuen Umfrage">{$leiras_de}</textarea>    <textarea name="leiras_hu" id="leiras_hu"{$leiras_hux} placeholder="Az új kérdőív rövid leírása" onclick="del_text(this.id)">{$leiras_hu}</textarea>    <label>Zárás</label>    <textarea name="zaras_en" id="zaras_en"{$zaras_enx} placeholder="The final wording of the survey">{$zaras_en}</textarea>    <textarea name="zaras_de" id="zaras_de"{$zaras_dex} placeholder="Der endgültige Wortlaut der Umfrage">{$zaras_de}</textarea>    <textarea name="zaras_hu" id="zaras_hu"{$zaras_hux} placeholder="A kérdőív záró szövege" onclick="del_text(this.id)">{$zaras_hu}</textarea>    <br style="clear:both;" />    <p id="ujkerdoiv_elvalaszto">{$lang['Az alábbi adatokat később is megadhatod vagy módosíthatod a "Kérdőív módosítása" gomra kattintva.']}</p>    <br style="clear:both;" />    <label style="width: 230px; float: left;">A kérdőív típusa</label>    <input type="radio" name="tipus" value="zart" id="tipus_zart" style="margin-top: 15px;"{if $kerdoiv_obj->zart == '1'} checked="checked"{/if} />zárt    <input type="radio" name="tipus" value="nyilt"  id="tipus_nyilt" {if (($kerdoiv_obj->zart == '0') OR ($kerdoiv_obj->zart == ''))} checked="checked"{/if} />nyílt    <br style="clear:both;" />    <span id="email_beker_blokk"{if $kerdoiv_obj->zart == '1'} style="display: none;"{/if}>        <label style="width: 230px; float: left;">Hogyan kéred a kitöltő email címét?</label>    <!--<input type="checkbox" name="emailbeker" style="margin-top: 15px;" {$checked_emailbeker} />-->        <input type="radio" name="email_tipus" value="nem" style="margin-top: 15px;"{if $kerdoiv_obj->email == '0'} checked="checked"{/if} />nem kérem        <input type="radio" name="email_tipus" value="megadhato"{if (($kerdoiv_obj->email == '1') OR ($kerdoiv_obj->email == ''))} checked="checked"{/if} />megadhatja        <input type="radio" name="email_tipus" value="kotelezo"{if $kerdoiv_obj->email == '2'} checked="checked"{/if} />kötelező megadni        <br style="clear:both;" />        <label style="width: 230px; float: left;">A kérdőív legyen nyilvános?</label>        <input type="checkbox" name="nyilvanos" style="margin-top: 15px;" {$checked_nyilvanos} />        <label class="magyarazat">A nyilvános kérdőív a főoldalon megjelenik, bárki láthatja és kitöltheti.</label>                <label class="magyarazat">Továbbá a regisztrált felhasználók a kitöltést követően megtekinthetik az eredményeket.</label>           <br style="clear:both;" />        <label style="width: 230px; float: left;">A kérdőív csak egyszer tölthető ki?</label>        <input type="checkbox" name="egyszerkitoltheto" style="margin-top: 15px;" {$checked_egyszerkitoltheto} />        <br style="clear:both;" />        </span>    <span id="zart_emailek_blokk"{if $kerdoiv_obj->zart != '1'} style="display: none;"{/if}>        <label style="width: 230px; display: block; float: left;">Email címek</label>        <textarea name="zart_emailek" id="zart_emailek"></textarea>        <br style="clear:both;" />    </span>    <label style="width: 230px; float: left;">Sorsolsz ajándékot?</label>    <input type="checkbox" name="ajandek" style="margin-top: 15px;" {$checked_ajandek} />    <br style="clear:both;" />    <label style="width: 230px; float: left;">A kérdőív tartalmazhat hirdetéseket?</label>    <input type="checkbox" name="hirdetessel" style="margin-top: 15px;" {$checked_hirdetessel}{if $kerdoiv_obj->authority == '1'} disabled="disabled"{/if} />    <label class="magyarazat">{$szotar->fordit('Ingyenes csomagban mindig megjelenik hirdetés!')}</label>    <br style="clear:both;" />    <label style="width: 230px;">Választott stílus:</label>    <div id="stilusok">        <div>            <img src="graphics/stilus_alap.jpg" alt="" />            <input type="radio" name="stilus" value="0" {$checked_stilus_alap} />        </div>        <div>            <img src="graphics/stilus_piros.jpg" alt="" />            <input type="radio" name="stilus" value="1" {$checked_stilus_1} />        </div>        <div>            <img src="graphics/stilus_zold.jpg" alt="" />            <input type="radio" name="stilus" value="2" {$checked_stilus_2} />        </div>        <div>            <img src="graphics/stilus_bordo.jpg" alt="" />            <input type="radio" name="stilus" value="3" {$checked_stilus_3} />        </div>        <div>            <img src="graphics/stilus_sarga.jpg" alt="" />            <input type="radio" name="stilus" value="4" {$checked_stilus_4} />        </div>        <div>            <img src="graphics/stilus_lila.jpg" alt="" />            <input type="radio" name="stilus" value="5" {$checked_stilus_5} />        </div>        <div>            <img src="graphics/stilus_kek.jpg" alt="" />            <input type="radio" name="stilus" value="6" {$checked_stilus_6} />        </div>    </div>    <br style="clear:both;" />    <label style="width: 230px;">A kérdőív aktiválásának dátuma</label>    <input type="text" name="aktivalas_datum" id="aktivalas_datum" value="{$aktivalas}" readonly="readonly" style="width: 90px;" />    <br style="clear:both;" />    <label style="width: 230px;">A kérdőív lejáratának dátuma</label>    <input type="text" name="lejarat_datum" id="lejarat_datum" value="{$lejarat}" readonly="readonly" style="width: 90px;" />    <br style="clear:both;" />    <label>Milyen kötelező személyes adatokat kérsz a kitöltőtől?</label>    <div id="szemelyes_admin">        <div>            <label>Neme</label>            <input type="checkbox" name="neme" {$checked_neme}/>        </div>        <div>                <label>Kora</label>            <input type="checkbox" name="kora" {$checked_kora}/>        </div>        <div>            <label>Ország</label>            <input type="checkbox" name="orszag" {$checked_orszag}/>        </div>        <div>            <label>Foglalkozása</label>            <input type="checkbox" name="foglalkozas" {$checked_foglalkozas}/>        </div>        <div>            <label>Végzettség</label>            <input type="checkbox" name="vegzettseg" {$checked_vegzettseg}/>        </div>        <div>            <label>Jövedelem</label>            <input type="checkbox" name="jovedelem" {$checked_jovedelem}/>        </div>        <div>            <label>Családi állapot</label>            <input type="checkbox" name="csaladiallapot" {$checked_csaladiallapot}/>        </div>    </div>    {if $kerdoiv_obj->keszito_id == $smarty.session.qa_user_id}          <label style="width: 230px;">Beágyazás kódja:</label>        <span style="font-size:11px;">Ezt kell beágyazni a HTML kódba.</span>        <textarea style="width:700px;" onclick="this.focus();                this.select()" ><iframe src="http://questionaction.com/index.php?p=kerdoiv&kerdoiv={$id}&i=1" frameborder="0" width="750" height="600" scrolling="auto"></iframe><p style="margin-top:0px; display: block; font-size: 12px; color: #444; font-family: 'Roboto_C', Arial; width: 80%;" >Generated by <a href="http://questionaction.com" target="_blank" >questionaction.com</a></p></textarea>        <label>Kérdőív átméretezés mértéke:</label><input type="text" name="iframe_arany" value="{$iframe_arany}" />    {/if}    {if $kerdoiv_obj->keszito_id == $smarty.session.qa_user_id}        <label style="width: 330px;">Új adminisztrátor hozzáadása a kérdőívhez</label>        <input type="text" name="uj_admin" id="lejarat_datum" value="{$uj_admin}" style="width: 190px; float: left;" />        <input type="submit" name="mentes" value="+" style="float: left; clear: none;" /><br /><br />        {if $adminok}            <label style="width: 330px;">További adminisztrátorok:</label>            {foreach from=$adminok item="sor" name="adminok"}                {$sor.email}<img src="graphics/icon_del.png" alt="" style="width: 15px; margin: 2px 0px -2px 10px;" onClick="megerosites_x('{$sor.sorszam}', 'ujadminok', '{$id}');" title="eltávolítás" /><br />            {/foreach}            <br /><br />        {/if}    {else}        <label style="width: 330px;">A kérdőív tulajdonosa: {$kerdoiv_obj->keszito_email}</label><br /><br />    {/if}    {if $kerdoiv_obj->keszito_id == $smarty.session.qa_user_id}        <div id="kerdoiv_torles" onclick="megerosites_x({$id}, 'kerdoiv_torles', {$id})">A kérdőív törlése</div>    {/if}</form>
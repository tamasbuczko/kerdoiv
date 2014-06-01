<h1>{$urlap_cim}</h1>
<form action="" method="post" enctype="multipart/form-data" class="ujkerdes">
    <div id="control_box">
        <h3>{$lang['Vezérlőpult']}</h3>
        <div {$control_box_ki}>
        <label>Látható nyelvek:</label>
        <img src="graphics/magyar_zaszlo_k.png" id="hu" alt="magyar" onclick="nyelv_kapcs(this.id)" {$control_hu} />
        <img src="graphics/angol_zaszlo_k.png" id="en" alt="angol" onclick="nyelv_kapcs(this.id)" {$control_en} />
        <img src="graphics/nemet_zaszlo_k.png" id="de" alt="német" onclick="nyelv_kapcs(this.id)" {$control_de} />
        </div>
        <input type="submit" name="mentes" value="{$lang['Mentés']}"/>
        <a href="{$vissza_link}" class="back">{$lang['vissza']}</a>
    </div>
    <input type="hidden" name="sorszam" value="{$id}" />
    
    <label>Milyen nyelveken szeretnéd elkészíteni a kérdőívet?</label>
    <div>    
    <label>angol</label><input type="checkbox" {$checked_en} name="check_en" onclick="nyelv_kapcs('en')" /><br />
    </div>
    <div>
    <label>német</label><input type="checkbox" {$checked_de} name="check_de" onclick="nyelv_kapcs('de')" /><br />
    </div>
    <div>
    <label>magyar</label><input type="checkbox" {$checked_hu} name="check_hu" onclick="nyelv_kapcs('hu')" /><br />
    </div>
    
    <br style="clear: both;" />
	<div class="file_browse_wrapper">
	  <input name="fejlec_kep" type="file" size="30" title="kép feltöltése" value="ok" accept="image/*" class="file_browse" />
	</div>
        <label>Fejléckép feltöltése a kérdőívhez</label>
        {$kep_fejlec}
        <br style="clear: both;" />
    
    <label>A kérdőív címe</label>
    <input type="text" name="cim_en" id="cim_en" value="{$cim_en}" {$cim_enx}/>
    <input type="text" name="cim_de" id="cim_de" value="{$cim_de}" {$cim_dex}/>
    <input type="text" name="cim_hu" id="cim_hu" value="{$cim_hu}" placeholder="Az új kérdőív címe" onclick="del_text(this.id)" {$cim_hux}/>
    <label>Leírás</label>
    <textarea name="leiras_en" id="leiras_en"{$leiras_enx}>{$leiras_en}</textarea>
    <textarea name="leiras_de" id="leiras_de"{$leiras_dex}>{$leiras_de}</textarea>
    <textarea name="leiras_hu" id="leiras_hu"{$leiras_hux} onclick="del_text(this.id)">{$leiras_hu}</textarea>
    <label>Zárás</label>
    <textarea name="zaras_en" id="zaras_en"{$zaras_enx}>{$zaras_en}</textarea>
    <textarea name="zaras_de" id="zaras_de"{$zaras_dex}>{$zaras_de}</textarea>
    <textarea name="zaras_hu" id="zaras_hu"{$zaras_hux} onclick="del_text(this.id)">{$zaras_hu}</textarea>
    <br style="clear:both;" />
    <label style="width: 230px; float: left;">A kérdőív eredményei nyilvánosak?</label>
    <input type="checkbox" name="nyilvanos" style="margin-top: 15px;" {$checked_nyilvanos} />
	<br style="clear:both;" />
	
	<label style="width: 230px; float: left;">A kérdőív tartalmazhat hirdetéseket?</label>
    <input type="checkbox" name="hirdetessel" style="margin-top: 15px;" {$checked_hirdetessel} />
	<br style="clear:both;" />
	
	<label style="width: 230px;">Választott stílus:</label>
	<div id="stilusok">
	  <div>
		 <img src="graphics/stilus_alap.jpg" alt="" />
		 <input type="radio" name="stilus" value="0" {$checked_stilus_alap} />
	  </div>
	  <div>
		<img src="graphics/stilus_piros.jpg" alt="" />
		<input type="radio" name="stilus" value="1" {$checked_stilus_1} />
	  </div>
	  <div>
		<img src="graphics/stilus_zold.jpg" alt="" />
		<input type="radio" name="stilus" value="2" {$checked_stilus_2} />
	  </div>
	</div>
	
	<br style="clear:both;" />
    <label style="width: 230px;">A kérdőív aktiválásának dátuma</label>
	<input type="text" name="aktivalas_datum" id="aktivalas_datum" value="{$aktivalas}" style="width: 90px;" />
	<br style="clear:both;" />
    <label style="width: 230px;">A kérdőív lejáratának dátuma</label>
	<input type="text" name="lejarat_datum" id="lejarat_datum" value="{$lejarat}" style="width: 90px;" />

    <br style="clear:both;" />
    <label>Milyen kötelező személyes adatokat kérsz a kitöltőtől?</label>
	<div id="szemelyes_admin">
	  <div>
		<label>Neme</label>
		<input type="checkbox" name="neme" {$checked_neme}/>
	  </div>
	  <div>    
		<label>Kora</label>
		<input type="checkbox" name="kora" {$checked_kora}/>
	  </div>
	  <div>
		<label>Ország</label>
		<input type="checkbox" name="orszag" {$checked_orszag}/>
	  </div>
	  <div>
		<label>Foglalkozása</label>
		<input type="checkbox" name="foglalkozas" {$checked_foglalkozas}/>
	  </div>
	  <div>
		<label>Végzettség</label>
		<input type="checkbox" name="vegzettseg" {$checked_vegzettseg}/>
	  </div>
	  <div>
		<label>Jövedelem</label>
		<input type="checkbox" name="jovedelem" {$checked_jovedelem}/>
	  </div>
	  <div>
		<label>Családi állapot</label>
		<input type="checkbox" name="csaladiallapot" {$checked_csaladiallapot}/>
	  </div>
	</div>

</form>
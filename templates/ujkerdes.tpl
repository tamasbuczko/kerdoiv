<h1>{$urlap_cim}</h1>
<form action="" method="post" enctype="multipart/form-data" class="ujkerdes" >
    <div id="control_box">
        <h3>{$lang['Vezérlőpult']}</h3>
        <div {$control_box_ki}>
        <label>{$lang['Látható nyelvek:']}</label>
        {$control_en}
        {$control_de}
        {$control_hu}
        </div>
        <input type="submit" name="pluszvalasz" value="{$lang['+1 válasz']}" title="+1 válasz hozzáadása" class="sarga_gomb">
        <input type="submit" name="mentes" value={$lang['Mentés']} title="változások rögzítése">
        
        <div id="lepteto">
            <a href="?p=ujkerdes&id={$elozo_kerdes}" /></a>
            <span>{$hanyadik_kerdes}/{$osszes_kerdes}</span>
            <a href="?p=ujkerdes&id={$kovetkezo_kerdes}" /></a>
        </div>
        <a href="?p=kerdoiv&mod=1&kerdoiv={$kerdoiv_sorszam}" class="back">{$lang['vissza']}</a>
        <br style="clear: both;" />
    </div>
    <input type="hidden" name="id" value="{$id}" />
    <input type="hidden" name="kerdoiv_sorszam" value="{$kerdoiv_sorszam}" />
    <label>Kérdés</label>

    <textarea name="kerdes_en"{$kerdes_enx} id="kerdes_en"{$kerdes_enx} class="en_k">{$kerdes_szoveg_en}</textarea>
    <textarea name="kerdes_de"{$kerdes_dex} id="kerdes_de"{$kerdes_dex} class="de_k">{$kerdes_szoveg_de}</textarea>
    <textarea name="kerdes_hu"{$kerdes_hux} id="kerdes_hu"{$kerdes_hux} class="hu_k">{$kerdes_szoveg_hu}</textarea>
        <br />
		<label>Kép feltöltése a kérdéshez</label>
	<div class="file_browse_wrapper" style="float: left !important;">
            <input name="kerdes_kep" id="kerdes_kep" type="file" size="30" title="kép feltöltése" value="ok" accept="image/*" class="file_browse" onmouseover="sugo('1', this.id)" />
	</div>
        {$kep_kerdes}
        <br style="clear: both;" />
	<label>Videó beágyazása a kérdéshez</label>
	<input type="text" name="video_kerdes" placeholder="https://www.youtube.com/..." value="{$video_kerdes}" class="video_embed" />
        <label>Típusa</label>
    <div class="info">
        <label>radio<span id="radio_s" onmouseover="sugo(2, this.id)">i</span></label>
        <input type="radio" name="tipus" value="radio" {$check_radio} />
    </div>
    <div class="info">
        <label>select<span id="select_s" onmouseover="sugo(3, this.id)">i</span></label>
        <input type="radio" name="tipus" value="select" {$check_select} />
    </div>
    <div class="info">
        <label>checkbox<span id="checkbox_s" onmouseover="sugo(4, this.id)">i</span></label>
        <input type="radio" name="tipus" value="checkbox" {$check_checkbox} />
    </div>
    <div class="info">
        <label>text<span id="text_s" onmouseover="sugo(5, this.id)">i</span></label>
        <input type="radio" name="tipus" value="text" {$check_text} />
    </div>
    <div class="info">
        <label>textarea<span id="textarea_s" onmouseover="sugo(6, this.id)">i</span></label>
        <input type="radio" name="tipus" value="textarea" {$check_textarea} />
    </div>
    <div class="info">
        <label>ranking<span id="ranking_s" onmouseover="sugo(7, this.id)">i</span></label>
        <input type="radio" name="tipus" value="ranking" {$check_ranking} />
    </div>
    <br style="clear: both;" />
    <label id="szoveg_valasz">Válaszok</label>
	
	<div id="admin_valaszok" class="gridster" style="width: 790px; border: 0px solid #aaa;">
		 {$valaszok2}
	</div>
    
</form>
<br /><br />

	  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>	  
	  <script src="gridster/dist/jquery.gridster.js" type="text/javascript" charset="utf-8"></script>
	  <script type="text/javascript" src="csempe.js"></script>

<div id="sugo_popup">
	<h3 id="np_h3">{$lang['Segítség']}</h3>
	<div id="np_p"></div>
</div>
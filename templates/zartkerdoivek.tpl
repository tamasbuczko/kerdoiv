<h2>Az értesítő email szövegének szerkesztése</h2>
<div class="emailsablon_gombok">
    {$sablongombok}
</div>
<form action="" method="post">
    <textarea name="email_szoveg" id="email_szoveg" style="width: 500px; height: 80px; float: left;">{$kerdoiv_obj->zart_email_szoveg}</textarea>
    <div id="sablon_ikonok">
        <span>cegnev</span>
        <span>kerdoiv_link</span>
        <span>kerdoiv_link</span>
        <span>kerdoiv_link</span>
        <span>kerdoiv_link</span>
        <span>kerdoiv_link</span>
        <span>kerdoiv_link</span>
        <span>kerdoiv_link</span>
        <span>kerdoiv_link</span>
        <span>kerdoiv_link</span>
    </div>
    <input type="submit" name="submit" value="mentés" style="display: block;" />
    <a href="elonezet.php?kerdoiv={$kerdoiv_obj->sorszam}" target="_blank">előnézet</a>
</form>


<script type="text/javascript" src="tinymce/tinymce_mod.js"></script>
    
<div id="PersonTableContainer" style="width: 830px; margin: 20px auto 20px auto;"></div>
<script>var kerdoiv = {$kerdoiv_obj->sorszam};</script>
<script type="text/javascript" src="jtable/dat_zartkerdoivek.js"></script>

<form action="" method="post">
    <label id="proba">Jelszó szükséges:</label><input type="checkbox" name="jelszo_generalas" {if $kerdoiv_obj->zart_jelszo == '1'}checked="checked"{/if} />
    <input type="submit" name="zart_email_kuldes" value="Kiküldés" style="display: block; margin-top: 20px;" />
</form>
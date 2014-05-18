<h1>Kérdőív adatlap</h1>

<div id="control_box">
   <h3>{$lang['Vezérlőpult']}</h3>
    <table class="adatlap_pult">
    <tr><td><img src="graphics/icon_graph.png" alt="eredmények" /></td><td><a  class="adatlap_pult" href="?p=eredmeny&kerdoiv={$kerdoiv_sorszam}" >{$lang['eredmények']}</a><br /></td></tr>
    <tr><td><img src="graphics/icon_edit.gif" alt="módosítás" /></td><td><a  class="adatlap_pult" href="?p=kerdoiv&mod=1&kerdoiv={$kerdoiv_sorszam}" >{$lang['módosítás']}</a><br /></td></tr>
    <tr><td><img src="graphics/icon_checked.png" alt="kitöltés" /></td><td><a  class="adatlap_pult" href="?p=kerdoiv&kerdoiv={$kerdoiv_sorszam}" >{$lang['kitöltés nézet']}</a></td></tr>
    </table> 
    <div id="lepteto">
            <a href="?p=kerdoiv_adatlap&kerdoiv={$elozo_kerdoiv}" /></a>
            <span>{$hanyadik_kerdoiv}/{$osszes_kerdoiv}</span>
            <a href="?p=kerdoiv_adatlap&kerdoiv={$kovetkezo_kerdoiv}" /></a>
    </div>
	<a href="?p=kerdoiveim" class="back">{$lang['vissza']}</a>
    <br style="clear: both;" />
</div>

<div id="kerdoiv_adatlap">
    <h2>{$kerdoiv_cim}</h2>
    <p>{$kerdoiv_leiras}</p>
    {$zaszlok}
    <br/><br/><br/><br/><br/><br style="clear: both;"/>
	<table>
    <tr>{$nyilvanos}</tr>
    <tr>{$kerdesek_szama}</tr>
    <tr>{$valaszadok_szama}</tr>
	<tr>{$valaszadok_szama_emailes}</tr>
    <tr>{$created_date}</tr>
    <tr>{$activated_date}</tr>
    {$expire_date}
	</table>
</div>


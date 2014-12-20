<h1>{$szotar->fordit('Kérdőív adatlap')}</h1>

<div id="control_box">
    <h3>{$szotar->fordit('Vezérlőpult')}</h3>
    <div class="adatlap_pult">
        <a href="?p=eredmeny&kerdoiv={$kerdoiv_sorszam}" alt="eredmények" >{$szotar->fordit('eredmények')}</a>
{if $kerdoiv_obj->zart == '1'}
        <a href="?p=40&kerdoiv={$kerdoiv_sorszam}" alt="zárt rendszer" >{$szotar->fordit('zárt rendszer')}</a>
{/if}
        <a href="?p=kerdoiv&mod=1&kerdoiv={$kerdoiv_sorszam}" alt="módosítás" >{$szotar->fordit('módosítás')}</a>
        {* 
        INSERT INTO  `kerdoiv`.`szotar` (
        `id` ,
        `hu` ,
        `en` ,
        `de` ,
        `ro` ,
        `megjegyzes`
        )
        VALUES (
        NULL ,  'kerdőív másolás',  'copy questionnaire',  'Kopieren Fragebogen',  '',  'kérdőíveim'
        );
        *}
        {if $kerdoiv_obj->keszito_id == $smarty.session.qa_user_id}
        <a href="?p=kerdoiv&masol=1&kerdoiv={$kerdoiv_sorszam}" alt="Kérdőív másolás" >{$szotar->fordit('kérdőív másolás')}</a>
        {/if}
        <a href="?p=kerdoiv&kerdoiv={$kerdoiv_sorszam}" alt="kitöltés" >{$szotar->fordit('kitöltés nézet')}</a>
    </div> 
    <div id="lepteto">
        <a href="?p=kerdoiv_adatlap&kerdoiv={$elozo_kerdoiv}" /></a>
        <span>{$hanyadik_kerdoiv}/{$osszes_kerdoiv}</span>
        <a href="?p=kerdoiv_adatlap&kerdoiv={$kovetkezo_kerdoiv}" /></a>
    </div>
    <a href="?p=kerdoiveim" class="back">{$szotar->fordit('vissza')}</a>
    <br style="clear: both;" />
</div>

<div id="kerdoiv_adatlap">
    <h2>{$kerdoiv_cim}</h2>
    <p>{$kerdoiv_leiras}</p>
    {$zaszlok}
    <br/><br/><br/><br/><br/><br style="clear: both;"/>
    <table class="adatlap_table">
        <tr>{$nyilvanos}</tr>
        <tr>{$kerdesek_szama}</tr>
        <tr>{$valaszadok_szama}</tr>
        <tr>{$valaszadok_szama_emailes}</tr>
        <tr>{$created_date}</tr>
        <tr>{$activated_date}</tr>
        {$expire_date}
        <tr>{$elerhetoseg}</tr>
    </table>
	<br style="clear: both;"/>
	{$forum}
</div>


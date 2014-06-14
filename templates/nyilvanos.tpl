<form name="keres" method="post" />
   <label>Keresés:</label><input name="keres" type="text" value="{$keres}" />
   <input name="submit" type="submit" value="keresés" />
{if $smarty.request.keres}
   {$talalatszam}
{/if}
</form>
<br />

{section name=obj loop=$obj_array}
    {assign var=sor value=$obj_array[obj]}
    
    <a href="?p=kerdoiv&amp;kerdoiv={$sor->sorszam}">
        {$sor->cim}
    </a>
    <div>
        {$sor->leiras}
    </div>
    <img src="fejlec_kepek/{$sor->fejlec_kep}" alt="" />
    
    
{/section}

<div class="nyilvanos_kerdoivek">
    {$nyilvanos_kerdoivek}
    <p> Bal alsó saroktól kezdve feltüntetni a létrehozó nevét és dátumot, majd a kitöltések számát és az eredményhez hozzáférők számát valamint az ajándéksorsolás a kitöltők között van vagy nincs infót. A jobb oldalon a feltöltött képekből egyet meg kell jeleníteni. </p>
</div>
<br />
{$navsav}
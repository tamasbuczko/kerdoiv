<form action="?p=nyilvanos" name="keres" method="get" />
   <label>{$lang["Keresés"]}:</label><input name="keres" type="text" value="{$keres}" />
   <input name="submit" type="submit" value="{$lang["Keresés"]}" />
   <input type="hidden" name="p" value="nyilvanos" />
{if $smarty.request.keres}
   {$talalatszam}
{/if}
</form>
<div id="nyilvanos_lista_info">
    <span>{$lang["A Nyilvános kérdőívek segítenek a piackutatásban és közvélemény kutatásban. A keresett kérdőív és eredménye követhetővé válik annak a bejelentkezett felhasználónak aki kitölti azt korrekt módon."]}</span>
</div>
<br />
<div id="nyilvanos_lista">
{section name=obj loop=$obj_array}{* ez egy komment *}
{assign var=objektum value=$obj_array[obj]}
<div style="display: block; clear: both;">
    <div id="nyilvanos_lista_kep"><img src="graphics/nincs_kep.png" alt="" /></div>    
    <div id="nyilvanos_lista_1">
    <h3><a href="?p=kerdoiv&amp;kerdoiv={$objektum->sorszam}">
        {$objektum->cim}
    </a></h3>
    <p>
        {$objektum->leiras}
    </p>    
    <table>
        <tr><th>{$lang["Létrehozó"]}: </th><th>{$lang["Dátum"]}: </th><th>{$lang["Kitöltők száma"]}: </th><th>{$lang["Követők száma"]}: </th><th></th></tr>    
        <tr><th>{$objektum->keszito}</th><th>{$objektum->aktivalas_datuma}</th><th>{$objektum->kitoltok_szama}</th><th>{$objektum->kovetok_szama}</th><th></th></tr>    
    </table>
{if $objektum->ajandek == '1'}
    <img src="graphics/ajandek_ikon.png" alt="" title='Van ajándéksorsolás'/>
{else}
    <img src="graphics/ajandek_ikon_nincs.png" alt="" title='Nincs ajándéksorsolás'/>
{/if}
    </div>
</div>
{/section}
</div>
<div class="nyilvanos_kerdoivek">
    {$nyilvanos_kerdoivek}    
</div>
<br />
{$navsav}
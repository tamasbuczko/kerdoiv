<form action="?p=ajandek" name="keres" method="get" />
   <label>{$szotar->fordit('Keresés')}:</label><input name="keres" type="text" value="{$keres}" />
   <input name="submit" type="submit" value="{$szotar->fordit('Keresés')}" /><br style="clear: both;" />
   <input type="hidden" name="p" value="nyilvanos" />
{if $smarty.request.keres}
   {$talalatszam}
{/if}
</form>
<div id="nyilvanos_lista_info">
    <span>{$szotar->fordit('A Nyilvános kérdőívek segítenek a piackutatásban és közvélemény kutatásban. A keresett kérdőív és eredménye követhetővé válik annak a bejelentkezett felhasználónak aki kitölti azt korrekt módon.')}</span>
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
        <tr><th>{$szotar->fordit('Létrehozó')}: </th><th>{$szotar->fordit('Dátum')}: </th><th>{$szotar->fordit('Kitöltők száma')}: </th><th>{$szotar->fordit('Követők száma')}: </th><th></th></tr>    
        <tr><th>{$objektum->keszito}</th><th>{$objektum->aktivalas_datuma}</th><th>{$objektum->kitoltok_szama}</th><th>{$objektum->kovetok_szama}</th><th></th></tr>    
    </table>
{if $objektum->ajandek == '1'}
    <img src="graphics/ajandek_ikon.png" alt="" title="{$szotar->fordit('Van ajándéksorsolás')}"/>
{else}
    <img src="graphics/ajandek_ikon_nincs.png" alt="" title="{$szotar->fordit('Nincs ajándéksorsolás')}"/>
{/if}
    </div>
</div>
{/section}
</div>
<br />
{$navsav}
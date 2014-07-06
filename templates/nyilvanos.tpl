<form name="keres" method="post" action="?p=nyilvanos" />
   <label>{$lang["Keresés"]}:</label><input name="keres" type="text" value="{$keres}" />
   <input name="submit" type="submit" value="{$lang["Keresés"]}" />
{if $smarty.request.keres}
   {$talalatszam}
{/if}
</form>
<br />
<div id="nyilvanos_lista">
{section name=obj loop=$obj_array}{* ez egy komment *}
{assign var=objektum value=$obj_array[obj]}
    <img src="graphics/nincs_kep.png" alt="" />    
    <div id="nyilvanos_lista_1">
    <h3><a href="?p=kerdoiv&amp;kerdoiv={$objektum->sorszam}">
        {$objektum->cim}
    </a></h3>
    <p>
        {$objektum->leiras}
    </p>    
    <span>Létrehozó:{$objektum->keszito}</span>        
    <span>Kitöltők száma: {$objektum->kitoltok_szama} </span>
    <span>Követők száma: {$objektum->kovetok_szama} </span>
    </div>
{/section}
</div>
<div class="nyilvanos_kerdoivek">
    {$nyilvanos_kerdoivek}    
</div>
<br />
{$navsav}
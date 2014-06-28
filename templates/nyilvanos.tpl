<form name="keres" method="post" />
   <label>{$lang["Keresés"]}:</label><input name="keres" type="text" value="{$keres}" />
   <input name="submit" type="submit" value="{$lang["Keresés"]}" />
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
       
    
{/section}

<div class="nyilvanos_kerdoivek">
    {$nyilvanos_kerdoivek}    
</div>
<br />
{$navsav}
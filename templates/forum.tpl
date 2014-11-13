<div class="tartalom_cikk">
{if $user->sorszam}
<form action="" method="post" class="hozzaszolas_form">
   <label>{$szotar->fordit('Új hozzászólás')}</label>
   <textarea name="uj_hozzaszolas"></textarea>
   <input type="submit" name="submit" />
</form>
{else}
   {$szotar->fordit('A hozzászóláshoz be kell jelentkezned!')}
{/if}
<br style="clear: both;" />
<h3>{$szotar->fordit('Hozzászólások')}</h3>
{if $hozzaszolasok}
{foreach from=$hozzaszolasok key=sorszam_hozzaszolas item=hozzaszolas name=outer}
<div class="forum_hozzaszol">
	<span class="nev">{$hozzaszolas.nev}</span><span class="ido">{$hozzaszolas.idopont}</span>
	<div>{$hozzaszolas.szoveg}</div>
</div>
{/foreach}
{else}
   {$szotar->fordit('Még nincsenek hozzászólások! Legyél te az első!')}
{/if}
</div>
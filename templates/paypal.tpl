{if $fizetes.status_fizetett == '0'}
<h2>{$szotar->fordit('Sikertelen fizetés')}!</h2>
{else}
<h2>{$szotar->fordit('Sikeres fizetés')}!</h2>
{/if}

{if $fizetes.csomag == '2'}{$szotar->fordit('Ezüst')}{/if}
{if $fizetes.csomag == '3'}{$szotar->fordit('Arany')}{/if}
{if $fizetes.csomag == '4'}{$szotar->fordit('Platina')}{/if}
<br />
{$szotar->fordit('Összeg')}: {$fizetes.osszeg}
<br />
{$szotar->fordit('Időszak')}: {$fizetes.idopont} - {$fizetes.lejarat}
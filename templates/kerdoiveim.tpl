<table class="kerdoiveim"{$display_none}>
    <tr><th>{$szotar->fordit('cím/adatlap')}</th><th>{$szotar->fordit('eredmények')}</th><th>{$szotar->fordit('kitöltés nézet')}</th><th>{$szotar->fordit('módosítás')}</th><th>{$szotar->fordit('aktív/ inaktív')}</th><th>{$szotar->fordit('kitöltötték')}</th>{$nyelv_fejlec}</tr>
    {$lista_kerdoiveim}
</table>
{$uzenet}
<a href="?p=ujkerdoiv" class="zold_gomb">{$szotar->fordit('Új kérdőív rögzítése')}</a>
{if $obj_array}
<table class="kerdoiveim">
    <tr>
        <th>{$szotar->fordit('cím/adatlap')}</th><th></th><th>{$szotar->fordit('eredmények')}</th><th>{$szotar->fordit('kitöltés nézet')}</th><th>{$szotar->fordit('módosítás')}</th><th>{$szotar->fordit('aktív/ inaktív')}</th><th>{$szotar->fordit('kitöltötték')}</th><th>{$szotar->fordit('nyelvek')}</th>
    </tr>
    {*$lista_kerdoiveim*}
{section name=obj loop=$obj_array}{* ez egy komment *}
{assign var=objektum value=$obj_array[obj]}
    <tr>
        <td>
{if $objektum->status_break == '1'}
            <img src="graphics/alert.png" alt="kérdőív szüneteltetve" title="kérdőív szüneteltetve" style="margin: 1px 8px -8px 0px;" />
{/if}
            <a href="?p=kerdoiv_adatlap&kerdoiv={$objektum->sorszam}">{$objektum->cim}</a>
        </td>
        <td>
{if ($objektum->keszito_id != $smarty.session.qa_user_id)}
            <img src="graphics/megosztott.png" alt="megosztott kérdőív" title="megosztott kérdőív" style="margin: 5px 0px -8px 0px;" />
{/if}
{if $objektum->ujuzenet > 0}
            <img src="graphics/level.png" alt="{$szotar->fordit('Új üzenet érkezett')}"  style="margin: 5px 0px -8px 0px; width:25px;"/>
{/if}
{if $objektum->zart == '1'}
            <a href="?p=40&kerdoiv={$objektum->sorszam}" style="width: 12px; float: right;"><img src="graphics/lock.png" alt="zárt kérdőív" title="zárt kérdőív" class="zart_ikon" /></a>
{/if}
        </td>
        <td>
            <a href="?p=kerdoiv&kerdoiv={$objektum->sorszam}&er=1">
                <img src="graphics/icon_graph.png" alt="eredmények" />
            </a>
        </td>
        <td>
            <a href="?p=kerdoiv&kerdoiv={$objektum->sorszam}">
                <img src="graphics/icon_checked.png" alt="kitöltés" />
            </a>
        </td>
        <td>
            <a href="?p=kerdoiv&amp;mod=1&amp;kerdoiv={$objektum->sorszam}">
                <img src="graphics/icon_edit.gif" alt="módosítás" />
            </a>
        </td>
        <td>
{if ($objektum->status == '1')}
            <a href="?p=7&amp;id={$objektum->sorszam}&amp;status=0">
                <img src="graphics/active.jpg" alt="kikapcsol" title="kikapcsol" />
            </a>
{else}
            <a href="?p=7&amp;id={$objektum->sorszam}&amp;status=1">
                <img src="graphics/inactive.jpg" alt="bekapcsol" title="bekapcsol" />
            </a>
{/if}
        </td>
        <td>{$objektum->valaszadok_szama}</td>
        <td class="kis_zaszlo">
{if $objektum->hu == '1'}
            <img src="graphics/magyar_zaszlo.png" alt="{$szotar->fordit('magyar')}" />
{/if}
{if $objektum->en == '1'}
            <img src="graphics/angol_zaszlo.png" alt="{$szotar->fordit('angol')}" />
{/if}
{if $objektum->de == '1'}
            <img src="graphics/nemet_zaszlo.png" alt="{$szotar->fordit('német')}" />
{/if}
        </td>
    </tr>    
{/section}
</table>
{else}
<div style="width: 100%; text-align: center; margin: 70px 0px 90px 0px;">{$szotar->fordit('Jelenleg még nincs saját kérdőíve!')}</div>
{/if}

<a href="?p=ujkerdoiv" class="zold_gomb">{$szotar->fordit('Új kérdőív rögzítése')}</a>
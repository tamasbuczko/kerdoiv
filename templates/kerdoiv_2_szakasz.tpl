{if $szuresek_lista}
   <br style="clear: both;" />
   <div class="szuresek">
	  <h4>Szűrésre jelölt válaszok:</h4>
	  {$szuresek_lista}
	  <br />
	  <a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&szurki=1&er=1">szűrés kikapcsolása</a>
   </div><br style="clear: both;" />
{/if}
{if ($kerdoiv_obj->szemelyes_adat_tipusok) AND ($smarty.request.er == 1) AND ($jogosult_eredmeny)}
<div class="doboz"
	<h4>{$szotar->fordit('Szűrés a kitöltői adatokra')}:</h4>
	<div style="width: 710px;">
{if ($kerdoiv_obj->szemelyes_adat_tipusok['neme'])}
		<label id="neme_kapcs" class="kitoltoi_adatok">{$szotar->fordit('neme')}:</label>
		<div id="neme_doboz" class="szemelyes_szures">
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['neme'] item="sor"}
			<p>{$sor.nev}</p>
			<a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k2=neme&v2={$sor.id}&er=1">
			<img src="graphics/filter.png" alt="" />
			</a>
{/foreach}
		</div>
{/if}
{if ($kerdoiv_obj->szemelyes_adat_tipusok['kora'])}
		<label id="eletkor_kapcs" class="kitoltoi_adatok">{$szotar->fordit('életkor')}:</label>
		<div id="eletkor_doboz" class="szemelyes_szures">
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['kora'] item="sor"}
			<p>{$sor.nev}</p>
			<a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k2=eletkora&v2={$sor.id}&er=1">
			<img src="graphics/filter.png" alt="" />
			</a>
{/foreach}
		</div>
{/if}
{if ($kerdoiv_obj->szemelyes_adat_tipusok['csaladiallapot'])}
		<label id="csaladiallapot_kapcs" class="kitoltoi_adatok">{$szotar->fordit('családi állapot')}:</label>
		<div id="csaladiallapot_doboz" class="szemelyes_szures">
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['csaladiallapot'] item="sor"}
			<p>{$sor.nev}</p>
			<a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k2=csaladiallapot&v2={$sor.id}&er=1">
			<img src="graphics/filter.png" alt="" />
			</a>
{/foreach}
		</div>
{/if}
{if ($kerdoiv_obj->szemelyes_adat_tipusok['foglalkozas'])}
		<label id="foglalkozas_kapcs" class="kitoltoi_adatok">{$szotar->fordit('foglalkozás')}:</label>
		<div id="foglalkozas_doboz" class="szemelyes_szures">
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['foglalkozas'] item="sor"}
			<p>{$sor.nev}</p>
			<a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k2=foglalkozas&v2={$sor.id}&er=1">
			<img src="graphics/filter.png" alt="" />
			</a>
{/foreach}
		</div>
{/if}
{if ($kerdoiv_obj->szemelyes_adat_tipusok['vegzettseg'])}
		<label id="vegzettseg_kapcs" class="kitoltoi_adatok">{$szotar->fordit('végzettség')}:</label>
		<div id="vegzettseg_doboz" class="szemelyes_szures">
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['vegzettseg'] item="sor"}
			<p>{$sor.nev}</p>
			<a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k2=vegzettseg&v2={$sor.id}&er=1">
			<img src="graphics/filter.png" alt="" />
			</a>
{/foreach}
		</div>
{/if}
{if ($kerdoiv_obj->szemelyes_adat_tipusok['jovedelem'])}
		<label id="jovedelme_kapcs" class="kitoltoi_adatok">{$szotar->fordit('jövedelem')}:</label>
		<div id="jovedelme_doboz" class="szemelyes_szures">
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['jovedelem'] item="sor"}
			<p>{$sor.nev}</p>
			<a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k2=jovedelem&v2={$sor.id}&er=1">
			<img src="graphics/filter.png" alt="" />
			</a>
{/foreach}
		</div>
{/if}
{if ($kerdoiv_obj->szemelyes_adat_tipusok['orszag'])}
		<label id="orszag_kapcs" class="kitoltoi_adatok">{$szotar->fordit('ország')}:</label>
		<div id="orszag_doboz" class="szemelyes_szures">
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['orszag'] item="sor"}
			<p>{$sor.nev}</p>
			<a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k2=lakhely&v2={$sor.id}&er=1">
			<img src="graphics/filter.png" alt="" />
			</a>
{/foreach}
		</div>
{/if}
	</div>
	<br style="clear: both;" />
</div>
{/if}
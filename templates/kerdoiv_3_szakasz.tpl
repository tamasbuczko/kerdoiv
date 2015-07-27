{if $smarty.request.er != '1'} 
<div class="szemelyes">
{if ($kerdoiv_obj->szemelyes_adat_nev == '1')}
		<label id="neve_kapcs" class="kitoltoi_adatok">{$szotar->fordit('neve')}:</label>
		<input type="text" name="neve" value="{$smarty.request.neve}" /><br />
{/if}
{if ($kerdoiv_obj->szemelyes_adat_cegnev == '1')}
		<label id="cegneve_kapcs" class="kitoltoi_adatok">{$szotar->fordit('cégneve')}:</label>
		<input type="text" name="cegneve" value="{$smarty.request.cegneve}" /><br />
{/if}
{if $kerdoiv_obj->szemelyes_adat_tipusok['neme']}
				<label class="kitoltoi_adatok">{$szotar->fordit('neme')}:</label>
				<select name="neme">
				<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['neme'] item="sor"}
				<option value="{$sor.id}"{if $smarty.request.neme == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
				</select>
				<br />
{/if}
{if $kerdoiv_obj->szemelyes_adat_tipusok['kora']}
	<label class="kitoltoi_adatok">{$szotar->fordit('életkor')}:</label>
	<select name="eletkora">
		<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['kora'] item="sor"}
		<option value="{$sor.id}"{if $smarty.request.eletkora == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
	</select>
	<br />
{/if}
{if $kerdoiv_obj->szemelyes_adat_tipusok['foglalkozas']}
	<label class="kitoltoi_adatok">{$szotar->fordit('foglalkozás')}:</label>
	<select name="foglalkozas">
		<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['foglalkozas'] item="sor"}
		<option value="{$sor.id}"{if $smarty.request.foglalkozas == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
	</select>
	<br />
{/if}
{if $kerdoiv_obj->szemelyes_adat_tipusok['orszag']}
	<label class="kitoltoi_adatok">{$szotar->fordit('ország')}:</label>
	<select name="lakhely">
		<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['orszag'] item="sor"}
		<option value="{$sor.id}"{if $smarty.request.lakhely == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
	</select>
	<br />
{/if}
{if $kerdoiv_obj->szemelyes_adat_tipusok['csaladiallapot']}
	<label class="kitoltoi_adatok">{$szotar->fordit('családi állapot')}:</label>
	<select name="csaladiallapot">
		<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['csaladiallapot'] item="sor"}
		<option value="{$sor.id}"{if $smarty.request.csaladiallapot == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
	</select>
	<br />
{/if}
{if $kerdoiv_obj->szemelyes_adat_tipusok['jovedelem']}
	<label class="kitoltoi_adatok">{$szotar->fordit('jövedelem')}:</label>
	<select name="jovedelmek">
		<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['jovedelem'] item="sor"}
		<option value="{$sor.id}"{if $smarty.request.jovedelmek == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
	</select>
	<br />
{/if}
{if $kerdoiv_obj->szemelyes_adat_tipusok['vegzettseg']}
	<label class="kitoltoi_adatok">{$szotar->fordit('végzettség')}:</label>
	<select name="vegzettseg">
		<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['vegzettseg'] item="sor"}
		<option value="{$sor.id}"{if $smarty.request.vegzettseg == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
	</select>
	<br />
{/if}
			</div>
{/if}
{if $smarty.request.er != '1'} 
<div class="szemelyes col-xs-10">
{if ($kerdoiv_obj->szemelyes_adat_nev == '1')}
		<label id="neve_kapcs" class="kitoltoi_adatok col-xs-10 col-sm-5 col-md-5 col-lg-5">{$szotar->fordit('neve')}:</label>
		<input type="text" name="neve" value="{$smarty.request.neve}" class="col-xs-10 col-sm-5 col-md-5 col-lg-5 offset" /><br />
{/if}
{if ($kerdoiv_obj->szemelyes_adat_cegnev == '1')}
		<label id="cegneve_kapcs" class="kitoltoi_adatok col-xs-10 col-sm-5 col-md-5 col-lg-5">{$szotar->fordit('cégneve')}:</label>
		<input type="text" name="cegneve" value="{$smarty.request.cegneve}" class="col-xs-10 col-sm-5 col-md-5 col-lg-5 offset" /><br />
{/if}

{if $kerdoiv_obj->szemelyes_adat_tipusok['neme']}
				<label class="kitoltoi_adatok col-xs-10 col-sm-5 col-md-5 col-lg-5">{$szotar->fordit('neme')}:</label>
				<select name="neme" class="col-xs-10 col-sm-5 col-md-5 col-lg-5 offset">
				<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['neme'] item="sor"}
				<option value="{$sor.id}"{if $smarty.request.neme == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
				</select>
				<br />
{/if}

{if $kerdoiv_obj->szemelyes_adat_tipusok['kora']}
	<label class="kitoltoi_adatok col-xs-10 col-sm-5 col-md-5 col-lg-5">{$szotar->fordit('életkor')}:</label>
	<select name="eletkora" class="col-xs-10 col-sm-5 col-md-5 col-lg-5 offset">
		<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['kora'] item="sor"}
		<option value="{$sor.id}"{if $smarty.request.eletkora == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
	</select>
	<br />
{/if}
{if $kerdoiv_obj->szemelyes_adat_tipusok['foglalkozas']}
	<label class="kitoltoi_adatok col-xs-10 col-sm-5 col-md-5 col-lg-5">{$szotar->fordit('foglalkozás')}:</label>
	<select name="foglalkozas" class="col-xs-10 col-sm-5 col-md-5 col-lg-5 offset">
		<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['foglalkozas'] item="sor"}
		<option value="{$sor.id}"{if $smarty.request.foglalkozas == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
	</select>
	<br />
{/if}
{if $kerdoiv_obj->szemelyes_adat_tipusok['orszag']}
	<label class="kitoltoi_adatok col-xs-10 col-sm-5 col-md-5 col-lg-5">{$szotar->fordit('ország')}:</label>
	<select name="lakhely" class="col-xs-10 col-sm-5 col-md-5 col-lg-5 offset">
		<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['orszag'] item="sor"}
		<option value="{$sor.id}"{if $smarty.request.lakhely == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
	</select>
	<br />
{/if}
{if $kerdoiv_obj->szemelyes_adat_tipusok['csaladiallapot']}
	<label class="kitoltoi_adatok col-xs-10 col-sm-5 col-md-5 col-lg-5">{$szotar->fordit('családi állapot')}:</label>
	<select name="csaladiallapot" class="col-xs-10 col-sm-5 col-md-5 col-lg-5 offset">
		<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['csaladiallapot'] item="sor"}
		<option value="{$sor.id}"{if $smarty.request.csaladiallapot == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
	</select>
	<br />
{/if}
{if $kerdoiv_obj->szemelyes_adat_tipusok['jovedelem']}
	<label class="kitoltoi_adatok col-xs-10 col-sm-5 col-md-5 col-lg-5">{$szotar->fordit('jövedelem')}:</label>
	<select name="jovedelmek" class="col-xs-10 col-sm-5 col-md-5 col-lg-5 offset">
		<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['jovedelem'] item="sor"}
		<option value="{$sor.id}"{if $smarty.request.jovedelmek == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
	</select>
	<br />
{/if}
{if $kerdoiv_obj->szemelyes_adat_tipusok['vegzettseg']}
	<label class="kitoltoi_adatok col-xs-10 col-sm-5 col-md-5 col-lg-5">{$szotar->fordit('végzettség')}:</label>
	<select name="vegzettseg" class="col-xs-10 col-sm-5 col-md-5 col-lg-5 offset">
		<option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['vegzettseg'] item="sor"}
		<option value="{$sor.id}"{if $smarty.request.vegzettseg == $sor.id} selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
	</select>
	<br />
{/if}
			</div>
{/if}
<br style="clear:both;" />
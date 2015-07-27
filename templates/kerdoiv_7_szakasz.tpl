{if $osszpontszam}
{$szotar->fordit('A kérdőívre kapott pontszám')}: {$osszpontszam}
{/if}
            
{if $smarty.request.mod}
			<a href="?p=ujkerdes&amp;kerdoiv={$smarty.request.kerdoiv}&ujkerdes=x" class="zold_gomb" style="float: left; clear:both;">
              {$szotar->fordit('új kérdés rögzítése')}
            </a>
{/if}
			<br />
{if ($kerdoiv_obj->zaras) AND (!$smarty.request.mod)}
{if ($smarty.request.er != '1')}
			<div id="survey_zaras" class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-centered">{$kerdoiv_obj->zaras}</div>
{/if}		
{/if}
			<div{if $smarty.request.er == '1'} style="display: none;"{/if}>
{if (($kerdoiv_obj->email == '1') OR ($kerdoiv_obj->email == '2')) AND (!$smarty.request.mod)}
                            <div class="szemelyes col-xs-10 col-sm-10 col-md-8 col-lg-8 col-centered" {if ($smarty.request.l)}style="display: none;"{/if}>
                                <label>E-mail:</label>
                                <input type="text" name="email" value="{$smarty.request.email}" /><br />
{if (($kerdoiv_obj->sorszam == '63') OR ($kerdoiv_obj->sorszam == '64') OR ($kerdoiv_obj->sorszam == '65') OR ($kerdoiv_obj->sorszam == '68') OR ($kerdoiv_obj->sorszam == '69') OR ($kerdoiv_obj->sorszam == '70') OR ($kerdoiv_obj->sorszam == '75') OR ($kerdoiv_obj->sorszam == '76') OR ($kerdoiv_obj->sorszam == '77') OR ($kerdoiv_obj->sorszam == '81') OR ($kerdoiv_obj->sorszam == '82') OR ($kerdoiv_obj->sorszam == '83'))}
								<label>Csoport neve:</label>
                                <input type="text" name="csoport_neve" value="{$smarty.request.csoport_neve}" /><br />
								<label>Iskola:</label>
                                <input type="text" name="iskola" value="{$smarty.request.iskola}" /><br />
								<label>Osztály:</label>
                                <input type="text" name="osztaly" value="{$smarty.request.osztaly}" /><br />
								<label>Csapattag 1.:</label>
                                <input type="text" name="csapattag_1" value="{$smarty.request.csapattag_1}" /><br />
								<label>Csapattag 2.:</label>
                                <input type="text" name="csapattag_2" value="{$smarty.request.csapattag_2}" /><br />
								<label>Csapattag 3.:</label>
                                <input type="text" name="csapattag_3" value="{$smarty.request.csapattag_3}" /><br />
{/if}
                            </div>
{/if}                            
<input type=hidden name="i" value="{$smarty.request.i}"/>
{if !$smarty.request.mod}
    <div id="elkuld">
        <input type="submit" name="submit" value="{$szotar->fordit('Elküldés')}"/>
    </div>
{/if}
                        </div>
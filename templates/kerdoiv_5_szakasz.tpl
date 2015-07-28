						<div class="survey_question">
							
{if $smarty.request.mod}
								<select name="kerdes_sorrend_{$sorszam_kerdes}" id="kerdes_sorrend_{$sorszam_kerdes}" onchange="kerdes_sorrend_ment(this.id);">
									{$kerdes.sorrend_x}
								</select>
{else}
								{$kerdes.kerdes_darab}.
{/if}
{if $kerdes.kerdes_sorrend}
								{$kerdes.kerdes_sorrend}
{/if}
								{$kerdes.kerdes}
							
{if (($smarty.request.mod) AND ($smarty.session.qa_user_id))}
							<div>
								<a href="#" title="kérdés törlése" onclick="megerosites_x({$sorszam_kerdes}, 'kerdes', '{$kerdoiv_obj->sorszam}');"></a>
								<a href="?p=ujkerdes&amp;id={$sorszam_kerdes}" title="kérdés módosítása"></a>
								<a href="?p=ujkerdes&amp;kerdoiv={$kerdoiv_obj->sorszam}&ujkerdes=x&kszam={$sorszam_kerdes}" title="új kérdés beszúrása"></a>
							</div>
{/if}<br style="clear: both;">
						</div><br style="clear: both;">
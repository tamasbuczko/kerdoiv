						<div class="survey_answers">
{if $kerdes.kerdes_kep}{*kérdéshez tartozó kép, videó*}
							<img src="kerdes_kepek/{$kerdes.kerdes_kep}" class="question_img col-xs-12 col-sm-12 col-md-6 col-lg-6 col-centered" alt="" />
{/if}
{if $kerdes.kerdes_video}
{if $kerdes.kerdes_video_tipus == 'youtube'}
							<iframe src="//www.youtube.com/embed/{$kerdes.kerdes_video}" class="kerdes_video" width="560" height="315" frameborder="0" allowfullscreen></iframe>
{/if}
{if $kerdes.kerdes_video_tipus == 'vimeo'}
							<iframe src="//player.vimeo.com/video/{$kerdes.kerdes_video}" class="kerdes_video" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
{/if}
							<br style="clear:both;" />
{/if}{*vége*}


{if $kerdes.kerdes_tipus == 'ranking'}
{assign var=szamlalo value=0}
{foreach from=$valasz_blokk_tomb key=sorszamx_valasz item=valaszx}

{if $valaszx.valasz_kerdese == $sorszam_kerdes}
{assign var=xxx value="radio_{$sorszam_kerdes}"}
{assign var=aaa value="{$valaszx.valasz_sorszam}"}
{if ($valaszx.valasz_fajta == 'szoveges')}
{if !$kerdes.eredmeny_doboz}
{assign var=$szamlalo value=$szamlalo++}
{if $szamlalo < 2}
						   <div class="ranking">
								<span>1</span><span>2</span><span>3</span><span>4</span><span>5</span>
							</div>
{/if}
							<label class="ranking_text col-xs-3 col-sm-4">{$valaszx.valasz_szoveg}</label>
{/if}
							<div style="float: left;" class="col-xs-7 col-sm-4">
{if !$kerdes.eredmeny_doboz}
   
								{$valaszx.valasz_ertekek}
{else}
								{$kerdes.eredmeny_doboz}{break}
{/if}
							</div>
{/if}
{if ($valaszx.valasz_fajta == 'kepes')}
{if !$kerdes.eredmeny_doboz}
							<label class="ranking_text" style="width: 570px; margin-left: 192px !important; margin-bottom: -15px;">{$valaszx.valasz_szoveg}</label>
{/if}
							<div style="float: left;">
							   
{if !$kerdes.eredmeny_doboz}
   <div class="answer_img" style="position:relative; text-align:left;">
								  <div class="answer_img_frame" style="width: 490px; margin-left: 130px;">
								 <img src="valasz_kepek/{$valaszx.valasz_kep}" style="margin-left: 50px;">
								 </div>
								<div class="ranking" style="position:absolute; top:35%; margin-left:20px;">
									<span>1</span><span>2</span><span>3</span><span>4</span><span>5</span>
								</div>
								 <div style="position:absolute; top:40%; margin-left:21px;">
								{$valaszx.valasz_ertekek}
								</div>
{else}
								{$kerdes.eredmeny_doboz}{break}
{/if}
							  </div>
							</div>
{/if}
{/if}
{/foreach}
{/if}


{if $kerdes.kerdes_tipus == 'textarea'}
{assign var=xxx value="textarea_{$sorszam_kerdes}"}
{if $smarty.request.er != 1}
							<textarea cols="1" rows="1" name="textarea_{$sorszam_kerdes}">{$smarty.request.$xxx}</textarea>
{else}
							{$kerdes.eredmeny_doboz}
{/if}
{/if}


{if $kerdes.kerdes_tipus == 'text'}
{assign var=xxx value="text_{$sorszam_kerdes}"}
{if $smarty.request.er != 1}
						    <input type="text" name="text_{$sorszam_kerdes}" value="{$smarty.request.$xxx}" />
{else}
							{$kerdes.eredmeny_doboz}
{/if}
{/if}


{if $kerdes.kerdes_tipus == 'select'}
{if $smarty.request.er != 1}
						    <select name="select_{$sorszam_kerdes}">
							  <option value="0">---</option>
{foreach from=$valasz_blokk_tomb key=sorszamx_valasz item=valaszx}
{if $valaszx.valasz_kerdese == $sorszam_kerdes}
{assign var=xxx value="select_{$sorszam_kerdes}"}
							  <option value="{$valaszx.valasz_sorszam}" {if $smarty.request.$xxx == $valaszx.valasz_sorszam}selected="selected"{/if}>{$valaszx.valasz_szoveg}</option>
{/if}
{/foreach}
						    </select>
{else}
{foreach from=$valasz_blokk_tomb key=sorszamx_valasz item=valaszx}
{if $valaszx.valasz_kerdese == $sorszam_kerdes}
{assign var=xxx value="select_{$sorszam_kerdes}"}
{assign var=aaa value="{$valaszx.valasz_sorszam}"}
						   <label>
							   {$valaszx.valasz_szoveg}
							   <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db) {if $eredmenyek_tomb.$aaa.valasz_pontszam} - {$eredmenyek_tomb.$aaa.valasz_pontszam} pont{/if}
							   <div class="filter">
								 <a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k={$sorszam_kerdes}&v={$valaszx.valasz_sorszam}&er=1">
									<img src="graphics/filter.png" alt="" />
								 </a>
							   </div>
							   <br />
							</label>
{/if}
{/foreach}  
{/if}
{/if}


{if $kerdes.kerdes_tipus == 'radio'}
{foreach from=$valasz_blokk_tomb key=sorszamx_valasz item=valaszx}
{if $valaszx.valasz_kerdese == $sorszam_kerdes}
{assign var=xxx value="radio_{$sorszam_kerdes}"}
{assign var=xxxx value="radio_{$valaszx.valasz_sorszam}_text"}
{assign var=aaa value="{$valaszx.valasz_sorszam}"}
{if $valaszx.valasz_fajta == 'szoveges'}
{if $smarty.request.er != 1}
							<input type="radio" name="radio_{$sorszam_kerdes}" {if $smarty.request.$xxx == $valaszx.valasz_sorszam}checked="checked" {/if}value="{$valaszx.valasz_sorszam}" />
{/if}
							<label>
							   {$valaszx.valasz_szoveg}
{if $valaszx.valasz_szoveg == 'egyebx'}
						    :<input type="text" name="radio_{$valaszx.valasz_sorszam}_text" value="{$smarty.request.$xxxx}" style="float: right; width: 340px;" />
{/if}
{if $smarty.request.er == 1}
							   <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db) {if $eredmenyek_tomb.$aaa.valasz_pontszam} - {$eredmenyek_tomb.$aaa.valasz_pontszam} pont{/if}
{if $eredmenyek_tomb.$aaa.helyes == 1}
						   <span>helyes válasz</span>
{/if}
							   <div class="filter">
								 <a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k={$sorszam_kerdes}&v={$valaszx.valasz_sorszam}&er=1">
									<img src="graphics/filter.png" alt="" />
								 </a>
							   </div>
							   <br />
{/if}
							</label>
{/if}
{if $valaszx.valasz_fajta == 'kepes'}
						   <div class="answer_img">
{if $smarty.request.er != 1}
						   <input type="radio" name="radio_{$sorszam_kerdes}" {if $smarty.request.$xxx == $valaszx.valasz_sorszam}checked="checked" {/if}value="{$valaszx.valasz_sorszam}" style="margin-top: 100px !important; margin-left: 20px !important;"/>
{/if}
						   <div class="answer_img_frame col-sm-4 col-xs-4">
						   <img src="valasz_kepek/{$valaszx.valasz_kep}">
						   <label>
							  {$valaszx.valasz_szoveg}
{if $smarty.request.er == 1}
							   <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db) {if $eredmenyek_tomb.$aaa.valasz_pontszam} - {$eredmenyek_tomb.$aaa.valasz_pontszam} pont{/if}
							   <div class="filter">
								 <a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k={$sorszam_kerdes}&v={$valaszx.valasz_sorszam}&er=1">
									<img src="graphics/filter.png" alt="" />
								 </a>
							   </div>
							   <br />
{/if}
						   </label>
						   </div>
						   </div>
{/if}   
{if $valaszx.valasz_fajta == 'videos'}
						   <div class="answer_img">
{if $smarty.request.er != 1}
							  <input type="radio" name="radio_{$sorszam_kerdes}" {if $smarty.request.$xxx == $valaszx.valasz_sorszam}checked="checked" {/if}value="{$valaszx.valasz_sorszam}" style="margin-top: 100px !important; margin-left: 50px !important;"/>
{/if}
							  <div class="answer_img_frame">
								 {$valaszx.valasz_video}
							  <label>
								 {$valaszx.valasz_szoveg}
{if $smarty.request.er == 1}
							   <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db) {if $eredmenyek_tomb.$aaa.valasz_pontszam} - {$eredmenyek_tomb.$aaa.valasz_pontszam} pont{/if}
							   <div class="filter">
								 <a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k={$sorszam_kerdes}&v={$valaszx.valasz_sorszam}&er=1">
									<img src="graphics/filter.png" alt="" />
								 </a>
							   </div>
							   <br />
{/if}
							  </label>
							  </div>
						   </div>
{/if}
{/if}
{/foreach}
{/if}


{if $kerdes.kerdes_tipus == 'checkbox'}
{foreach from=$valasz_blokk_tomb key=sorszamx_valasz item=valaszx}
{if $valaszx.valasz_kerdese == $sorszam_kerdes}
{assign var=xxx value="checkbox_{$valaszx.valasz_sorszam}"}
{assign var=aaa value="{$valaszx.valasz_sorszam}"}
{if $valaszx.valasz_fajta == 'szoveges'}
{if $smarty.request.er != 1}
						   <input type="checkbox" name="checkbox_{$valaszx.valasz_sorszam}" {if $smarty.request.$xxx == 'on'}checked="checked"{/if}/>
{/if}
						   <label>
							  {$valaszx.valasz_szoveg}
{if $smarty.request.er == 1}
							  <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db) {if $eredmenyek_tomb.$aaa.valasz_pontszam} - {$eredmenyek_tomb.$aaa.valasz_pontszam} pont{/if}
{if $eredmenyek_tomb.$aaa.helyes == 1}
						   <span>helyes válasz</span>
{/if}
							   <div class="filter">
								 <a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k={$sorszam_kerdes}&v={$valaszx.valasz_sorszam}&er=1">
									<img src="graphics/filter.png" alt="" />
								 </a>
							   </div>
							   <br />
{/if}
						   </label>
{/if}
{if $valaszx.valasz_fajta == 'kepes'}
						   <div class="answer_img">
{if $smarty.request.er != 1}
							  <input type="checkbox" name="checkbox_{$valaszx.valasz_sorszam}" {if $smarty.request.$xxx == 'on'}checked="checked"{/if} style="margin-top: 100px !important; margin-left: 50px !important;"/>
{/if}

							  <div class="answer_img_frame">
								 <img src="valasz_kepek/{$valaszx.valasz_kep}">
								 <label>
									{$valaszx.valasz_szoveg}
{if $smarty.request.er == 1}
							  <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db) {if $eredmenyek_tomb.$aaa.valasz_pontszam} - {$eredmenyek_tomb.$aaa.valasz_pontszam} pont{/if}
							   <div class="filter">
								 <a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k={$sorszam_kerdes}&v={$valaszx.valasz_sorszam}&er=1">
									<img src="graphics/filter.png" alt="" />
								 </a>
							   </div>
							   <br />
{/if}
								 </label>
							  </div>
						   </div>
{/if}
{if $valaszx.valasz_fajta == 'videos'}
						   <div class="answer_img">
{if $smarty.request.er != 1}
						   <input type="checkbox" name="checkbox_{$valaszx.valasz_sorszam}" {if $smarty.request.$xxx == 'on'}checked="checked"{/if} style="margin-top: 100px !important; margin-left: 50px !important;"/>
{/if}
						   <div class="answer_img_frame">
						   {$valaszx.valasz_video}
						   <label>
							  {$valaszx.valasz_szoveg}
{if $smarty.request.er == 1}
							  <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db){if $eredmenyek_tomb.$aaa.valasz_pontszam} - {$eredmenyek_tomb.$aaa.valasz_pontszam} pont{/if}
							   <div class="filter">
								 <a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&k={$sorszam_kerdes}&v={$valaszx.valasz_sorszam}&er=1">
									<img src="graphics/filter.png" alt="" />
								 </a>
							   </div>
							   <br />
{/if}
						   </label>
						   </div>
						   </div>
{/if}
{/if}
{/foreach}
{/if}
                            <br style="clear:both" />
                        </div>
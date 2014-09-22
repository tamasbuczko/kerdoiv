{if $kerdoiv_obj->fejlec_kep}
   <div id="headline">
	  <img src="fejlec_kepek/{$kerdoiv_obj->fejlec_kep}" id="headline_img" alt="" />
   </div>
{/if}
   <div id="intro">
	  <div id="survey_intro">
		 <h1>{$kerdoiv_obj->cim}</h1>
{if (($smarty.request.mod) AND ($smarty.session.qa_user_id))}
		 <a href="?p=ujkerdoiv&amp;id={$kerdoiv_obj->sorszam}" class="modosito_gomb" title="kérdőív módosítása"></a>
{/if}
		 <div id="survey_intro_div">
		 {$kerdoiv_obj->leiras}
		 </div>
{if (($smarty.request.mod) AND ($smarty.session.qa_user_id))}
		 <div id="control_box">
			<h3>{$szotar->fordit('vezérlőpult')}</h3>
			<br />
			<a href="?p=ujkerdes&amp;kerdoiv={$kerdoiv_obj->sorszam}&ujkerdes=x" class="zold_gomb" style="float: left;">{$szotar->fordit('új kérdés rögzítése')}</a>                            
			<a href="?p=kerdoiv_adatlap&kerdoiv={$kerdoiv_obj->sorszam}" class="sarga_gomb" style="float: left; margin-bottom: 20px;">{$szotar->fordit('Kérdőív adatlap')}</a>
			<a href="?p=ujkerdoiv&amp;id={$kerdoiv_obj->sorszam}" class="zold_gomb" style="float: left;">{$szotar->fordit('kérdőív módosítása')}</a>
			<br /><br />
			<a href="?p=kerdoiveim" class="back" />{$szotar->fordit('vissza')}</a>
		 </div>
		 <script type="text/javascript">control_box();</script>
{/if}
	  </div>			
   </div>
{if $szuresek_lista}
   <br style="clear: both;" />
   <div class="szuresek">
	  <h4>Szűrésre jelölt válaszok:</h4>
	  {$szuresek_lista}
	  <br />
	  <a href="?p=eredmeny&kerdoiv={$kerdoiv_obj->sorszam}&szurki=1">szűrés kikapcsolása</a>
   </div><br style="clear: both;" />
{/if}
{if ((($kerdoiv_obj->szemelyes_adat_tipusok) AND ($smarty.request.p == 'eredmeny')) OR ($smarty.request.er == 1))}
   <div class="doboz">
	  <h4>{$szotar->fordit('Szűrés a kitöltői adatokra')}:</h4>
	  <div style="width: 710px;">
		 
{if ($kerdoiv_obj->szemelyes_adat_tipusok['neme'])}
         <label id="neme_kapcs" class="kitoltoi_adatok">{$szotar->fordit('neme')}:</label>
         <div id="neme_doboz" class="szemelyes_szures">
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['neme'] item="sor"}
	 <p>{$sor.nev}</p>
            <a href="?p=eredmeny&kerdoiv={$kerdoiv_obj->sorszam}&k2=neme&v2={$sor.id}">
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
            <a href="?p=eredmeny&kerdoiv={$kerdoiv_obj->sorszam}&k2=eletkora&v2={$sor.id}">
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
            <a href="?p=eredmeny&kerdoiv={$kerdoiv_obj->sorszam}&k2=csaladiallapot&v2={$sor.id}">
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
            <a href="?p=eredmeny&kerdoiv={$kerdoiv_obj->sorszam}&k2=foglalkozas&v2={$sor.id}">
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
			<a href="?p=eredmeny&kerdoiv={$kerdoiv_obj->sorszam}&k2=vegzettseg&v2={$sor.id}">
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
            <a href="?p=eredmeny&kerdoiv={$kerdoiv_obj->sorszam}&k2=jovedelem&v2={$sor.id}">
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
            <a href="?p=eredmeny&kerdoiv={$kerdoiv_obj->sorszam}&k2=lakhely&v2={$sor.id}">
            <img src="graphics/filter.png" alt="" />
            </a>
{/foreach}	
		 </div>
{/if}
	  </div>
	  <br style="clear: both;" />
   </div>
{/if}
{if $kerdes_blokk}
   {$kerdes_blokk}
{/if}
   <div id="survey">
      <form action="?" name="form_survey" id="form_survey" method="post">
         <input type="hidden" name="kerdoiv" id="kerdoiv" value="{$smarty.request.kerdoiv}" />
         <input type="hidden" name="p" id="p" value="{$smarty.request.p}" />		 
{if ($smarty.request.p != 'eredmeny')}
{if $smarty.request.er != '1'} 
<div class="szemelyes">
{if $kerdoiv_obj->szemelyes_adat_tipusok['neme']}
    <label class="kitoltoi_adatok">{$szotar->fordit('neme')}:</label>
    <select name="neme">
        <option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['neme'] item="sor"}
        <option value="{$sor.id}" {if $smarty.request.neme == $sor.id}selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
    </select>
    <br />
{/if}

{if $kerdoiv_obj->szemelyes_adat_tipusok['kora']}
    <label class="kitoltoi_adatok">{$szotar->fordit('életkor')}:</label>
    <select name="eletkora">
        <option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['kora'] item="sor"}
        <option value="{$sor.id}" {if $smarty.request.eletkora == $sor.id}selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
    </select>
    <br />
{/if}

{if $kerdoiv_obj->szemelyes_adat_tipusok['foglalkozas']}
    <label class="kitoltoi_adatok">{$szotar->fordit('foglalkozás')}:</label>
    <select name="foglalkozas">
        <option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['foglalkozas'] item="sor"}
        <option value="{$sor.id}" {if $smarty.request.foglalkozas == $sor.id}selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
    </select>
    <br />
{/if}

{if $kerdoiv_obj->szemelyes_adat_tipusok['orszag']}
    <label class="kitoltoi_adatok">{$szotar->fordit('ország')}:</label>
    <select name="lakhely">
        <option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['orszag'] item="sor"}
        <option value="{$sor.id}" {if $smarty.request.lakhely == $sor.id}selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
    </select>
    <br />
{/if}

{if $kerdoiv_obj->szemelyes_adat_tipusok['csaladiallapot']}
    <label class="kitoltoi_adatok">{$szotar->fordit('családi állapot')}:</label>
    <select name="csaladiallapot">
        <option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['csaladiallapot'] item="sor"}
        <option value="{$sor.id}" {if $smarty.request.csaladiallapot == $sor.id}selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
    </select>
    <br />
{/if}

{if $kerdoiv_obj->szemelyes_adat_tipusok['jovedelem']}
    <label class="kitoltoi_adatok">{$szotar->fordit('jövedelem')}:</label>
    <select name="jovedelmek">
        <option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['jovedelem'] item="sor"}
        <option value="{$sor.id}" {if $smarty.request.jovedelmek == $sor.id}selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
    </select>
    <br />
{/if}

{if $kerdoiv_obj->szemelyes_adat_tipusok['vegzettseg']}
    <label class="kitoltoi_adatok">{$szotar->fordit('végzettség')}:</label>
    <select name="vegzettseg">
        <option value="x">---</option>
{foreach from=$kerdoiv_obj->szemelyes_adat_tipusok['vegzettseg'] item="sor"}
        <option value="{$sor.id}" {if $smarty.request.vegzettseg == $sor.id}selected="selected"{/if}>{$sor.nev}</option>
{/foreach}
    </select>
    <br />
{/if}
</div>
{/if}
{/if}
{if (($kerdoiv_obj->hirdetessel == '1') AND (!$smarty.request.mod)) OR ($kerdoiv_obj->reklammentes != 'on')}
{if (!$smarty.request.mod)}
   <div class="google_hirdetes">
{literal}
		<div>
		 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		 <!-- qa1 -->
		 <ins class="adsbygoogle" style="display:inline-block;width:160px;height:600px" data-ad-client="ca-pub-5390887008581273" data-ad-slot="5591790437"></ins>
		 <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
		</div>
		   
		<div>
		 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		 <!-- qa2 -->
		 <ins class="adsbygoogle" style="display:inline-block;width:160px;height:600px" data-ad-client="ca-pub-5390887008581273" data-ad-slot="6928922839"></ins>
		 <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
		</div>   
		   
		<div>
		 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		 <!-- qa3 -->
		 <ins class="adsbygoogle" style="display:inline-block;width:160px;height:600px" data-ad-client="ca-pub-5390887008581273" data-ad-slot="2359122436"></ins>
		 <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
		</div>
{/literal}
   </div>
{/if}
{/if}
        <div style="float: left; background-color: #fff;">
            <ul id="slider2">
               
{foreach from=$kerdes_blokk_tomb key=sorszam_kerdes item=kerdes name=outer}
                <li>
                    <div class="survey_block">
                        <div class="survey_question">
						   <span>
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
						   </span>
{if (($smarty.request.mod) AND ($smarty.session.qa_user_id))}
						   <div>
							  <a href="#" title="kérdés törlése" onclick="megerosites_x({$sorszam_kerdes}, 'kerdes', '{$kerdoiv_obj->sorszam}');"></a>
							  <a href="?p=ujkerdes&amp;id={$sorszam_kerdes}" title="kérdés módosítása"></a>
							  <a href="?p=ujkerdes&amp;kerdoiv={$kerdoiv_obj->sorszam}&ujkerdes=x&kszam={$sorszam_kerdes}" title="új kérdés beszúrása"></a>
						   </div>
{/if}
                        </div>
                        <div class="survey_answers">
{if $kerdes.kerdes_kep}
							<img src="kerdes_kepek/{$kerdes.kerdes_kep}" class="question_img" alt="" />
{/if}
{if $kerdes.kerdes_video}
{if $kerdes.kerdes_video_tipus == 'youtube'}
                            <iframe src="//www.youtube.com/embed/{$kerdes.kerdes_video}" class="kerdes_video" width="560" height="315" frameborder="0" allowfullscreen></iframe>
{/if}
{if $kerdes.kerdes_video_tipus == 'vimeo'}
                            <iframe src="//player.vimeo.com/video/{$kerdes.kerdes_video}" class="kerdes_video" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
{/if}
						    <br style="clear:both;" />
{/if}
{if $kerdes.kerdes_tipus == 'ranking'}
							<div class="ranking">
							  <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span>
							</div>
{foreach from=$valasz_blokk_tomb key=sorszamx_valasz item=valaszx}
{if $valaszx.valasz_kerdese == $sorszam_kerdes}
{assign var=xxx value="radio_{$sorszam_kerdes}"}
{assign var=aaa value="{$valaszx.valasz_sorszam}"}
{if $valaszx.valasz_fajta == 'szoveges'}
						   <label class="ranking_text">{$valaszx.valasz_szoveg}</label>
						   <div style="float: left;">
							  {$valaszx.valasz_ertekek}
						   </div>
{/if}
{/if}
{/foreach}
{/if}
{if $kerdes.kerdes_tipus == 'textarea'}
{assign var=xxx value="textarea_{$sorszam_kerdes}"}
						    <textarea cols="1" rows="1" name="textarea_{$sorszam_kerdes}">{$smarty.request.$xxx}</textarea>
{if $smarty.request.er == 1}
							{$eredmenyek_tomb.$aaa.valasz_szavazatszam_f}
{/if}
{/if}
{if $kerdes.kerdes_tipus == 'text'}
{assign var=xxx value="text_{$sorszam_kerdes}"}
						    <input type="text" name="text_{$sorszam_kerdes}" value="{$smarty.request.$xxx}" />
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
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db)
							   <div class="filter">
								 <a href="?p=eredmeny&kerdoiv={$kerdoiv_sorszam}&k={$sorszam_kerdes}&v={$eredmenyek_tomb.$aaa.valasz_szavazatszam}">
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
{assign var=aaa value="{$valaszx.valasz_sorszam}"}
{if $valaszx.valasz_fajta == 'szoveges'}
{if $smarty.request.er != 1}
							<input type="radio" name="radio_{$sorszam_kerdes}" {if $smarty.request.$xxx == $valaszx.valasz_sorszam}checked="checked" {/if}value="{$valaszx.valasz_sorszam}" />
{/if}
							<label>
							   {$valaszx.valasz_szoveg}
{if $smarty.request.er == 1}
							   <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db)
							   <div class="filter">
								 <a href="?p=eredmeny&kerdoiv={$kerdoiv_sorszam}&k={$sorszam_kerdes}&v={$eredmenyek_tomb.$aaa.valasz_szavazatszam}">
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
						   <input type="radio" name="radio_{$sorszam_kerdes}" {if $smarty.request.$xxx == $valaszx.valasz_sorszam}checked="checked" {/if}value="{$valaszx.valasz_sorszam}" />
{/if}
						   <div class="answer_img_frame">
						   <img src="valasz_kepek/{$valaszx.valasz_kep}">
						   <label>
							  {$valaszx.valasz_szoveg}
{if $smarty.request.er == 1}
							   <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db)
							   <div class="filter">
								 <a href="?p=eredmeny&kerdoiv={$kerdoiv_sorszam}&k={$sorszam_kerdes}&v={$eredmenyek_tomb.$aaa.valasz_szavazatszam}">
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
							  <input type="radio" name="radio_{$sorszam_kerdes}" {if $smarty.request.$xxx == $valaszx.valasz_sorszam}checked="checked" {/if}value="{$valaszx.valasz_sorszam}" />
{/if}
							  <div class="answer_img_frame">
								 {$valaszx.valasz_video}
							  <label>
								 {$valaszx.valasz_szoveg}
{if $smarty.request.er == 1}
							   <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db)
							   <div class="filter">
								 <a href="?p=eredmeny&kerdoiv={$kerdoiv_sorszam}&k={$sorszam_kerdes}&v={$eredmenyek_tomb.$aaa.valasz_szavazatszam}">
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
						   <input type="checkbox" name="checkbox_{$sorszam_valasz}" {if $smarty.request.$xxx == $valaszx.valasz_sorszam}checked="checked"{/if}/>
{/if}
						   <label>
							  {$valaszx.valasz_szoveg}
{if $smarty.request.er == 1}
							  <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db)
							   <div class="filter">
								 <a href="?p=eredmeny&kerdoiv={$kerdoiv_sorszam}&k={$sorszam_kerdes}&v={$eredmenyek_tomb.$aaa.valasz_szavazatszam}">
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
							  <input type="checkbox" name="checkbox_{$sorszam_valasz}" {if $smarty.request.$xxx == $valaszx.valasz_sorszam}checked="checked"{/if}/>
{/if}
							  <div class="answer_img_frame">
								 <img src="valasz_kepek/{$valaszx.valasz_kep}">
								 <label>
									{$valaszx.valasz_szoveg}
{if $smarty.request.er == 1}
							  <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db)
							   <div class="filter">
								 <a href="?p=eredmeny&kerdoiv={$kerdoiv_sorszam}&k={$sorszam_kerdes}&v={$eredmenyek_tomb.$aaa.valasz_szavazatszam}">
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
						   <input type="checkbox" name="checkbox_{$valaszx.valasz_sorszam}" {if $smarty.request.$xxx == 'on'}checked="checked"{/if}/>
{/if}
						   <div class="answer_img_frame">
						   {$valaszx.valasz_video}
						   <label>
							  {$valaszx.valasz_szoveg}
{if $smarty.request.er == 1}
							  <br />
							   <div class="grafv">
									   <div class="graf" style="width: {$eredmenyek_tomb.$aaa.valasz_szavazatarany}px"></div>
							   </div>({$eredmenyek_tomb.$aaa.valasz_szavazatszam} db)
							   <div class="filter">
								 <a href="?p=eredmeny&kerdoiv={$kerdoiv_sorszam}&k={$sorszam_kerdes}&v={$eredmenyek_tomb.$aaa.valasz_szavazatszam}">
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
                    </div>
                </li>
{/foreach}
            </ul>	
{if $smarty.request.mod}
			<a href="?p=ujkerdes&amp;kerdoiv={$smarty.request.kerdoiv}&ujkerdes=x" class="zold_gomb" style="float: left; clear:both;">
                            {$szotar->fordit('új kérdés rögzítése')}
                        </a>
{/if}
			<br />
{if ($kerdoiv_obj->zaras) AND (!$smarty.request.mod)}
			<div id="survey_zaras">{$kerdoiv_obj->zaras}</div>
{/if}
			<div{if $smarty.request.p == 'eredmeny'} style="display: none;"{/if}>   
{if (($kerdoiv_obj->email == '1') OR ($kerdoiv_obj->email == '2')) AND (!$smarty.request.mod)}                            
                            <div class="szemelyes">
                                <label>E-mail:</label>
                                <input type="text" name="email" value="{$smarty.request.email}" />
                            </div>
{/if}                            
                            <input type=hidden name="i" value="{$smarty.request.i}"/>
{if !$smarty.request.mod}
                            <div id="elkuld">
                                <input type="submit" name="submit" value="{$szotar->fordit('Elküldés')}"/>
                            </div>
{/if}
                        </div>
	</div>
		<input type="hidden" name="sorrendezes" id="sorrendezes" value="" />
		</form>
                </div>
<!--
<script type="text/javascript" src="slider/js/rhinoslider-1.05.min.js"></script>
<script type="text/javascript" src="slider/js/mousewheel.js"></script>
<script type="text/javascript" src="slider/js/easing.js"></script>
<script type="text/javascript" src="slider/parameters2.js"></script>
-->                
<br style="clear: both;"/>
<a class="a2a_dd" href="http://www.addtoany.com/share_save?linkurl=www.questionaction.com/?p=kerdoiv&kerdoiv={$smarty.request.kerdoiv};linkname=QuestionAction.com">
   <img src="http://static.addtoany.com/buttons/share_save_171_16.png" width="171" height="16" border="0" alt="Share"/>
</a>
{literal}
<script type="text/javascript">
   var a2a_config = a2a_config || {};
   a2a_config.linkname = "Questionaction.com";
   a2a_config.prioritize = ["facebook", "google_plus", "twitter", "linkedin", "reddit", "tumblr", "orkut"];
{/literal}
   a2a_config.linkurl = "www.Questionaction.com/?p=kerdoiv&kerdoiv={$smarty.request.kerdoiv}";
   a2a_config.num_services = 6;
</script>
<script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
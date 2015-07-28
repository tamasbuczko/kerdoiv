{if $smarty.request.i == '1' AND $smarty.request.ok == '1'}
{*<p>{$szotar->fordit('Köszönjük, hogy kitöltötte a kérdőívet')}</p>*}
{/if}

{if $kerdoiv_obj->fejlec_kep}
   <div id="headline">
	  <img src="fejlec_kepek/{$kerdoiv_obj->fejlec_kep}" id="headline_img" alt="" />
   </div>
{else}
   <div id="headline2">
	  <img src="graphics/ures_fejlec.png" id="headline_img" alt="" />
   </div>
{/if}
   
	  <div id="survey_intro" class="row-fluid offset">
{if (($kerdoiv_obj->sorszam == '63') OR ($kerdoiv_obj->sorszam == '64') OR ($kerdoiv_obj->sorszam == '65') OR ($kerdoiv_obj->sorszam == '68') OR ($kerdoiv_obj->sorszam == '69') OR ($kerdoiv_obj->sorszam == '70') OR ($kerdoiv_obj->sorszam == '75') OR ($kerdoiv_obj->sorszam == '76') OR ($kerdoiv_obj->sorszam == '77') OR ($kerdoiv_obj->sorszam == '81') OR ($kerdoiv_obj->sorszam == '82') OR ($kerdoiv_obj->sorszam == '83'))}
{else}
		 <h1>{$kerdoiv_obj->cim}</h1>
{if (($smarty.request.mod) AND ($smarty.session.qa_user_id))}
		 <a href="?p=ujkerdoiv&amp;id={$kerdoiv_obj->sorszam}" class="modosito_gomb" title="kérdőív módosítása"></a>
{/if}
		 <div id="survey_intro_div" class="row-fluid">
		 {$kerdoiv_obj->leiras}
		 </div>
{/if}
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
   
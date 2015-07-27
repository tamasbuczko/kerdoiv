{include file="kerdoiv_1_szakasz.tpl"} {*fejléc és vezérlődoboz*}
{include file="kerdoiv_2_szakasz.tpl"} {*szűrési lehetőségek*}

{if (($kerdoiv_obj->sorszam == '63') OR ($kerdoiv_obj->sorszam == '64') OR ($kerdoiv_obj->sorszam == '65') OR ($kerdoiv_obj->sorszam == '68') OR ($kerdoiv_obj->sorszam == '69') OR ($kerdoiv_obj->sorszam == '70') OR ($kerdoiv_obj->sorszam == '75') OR ($kerdoiv_obj->sorszam == '76') OR ($kerdoiv_obj->sorszam == '77') OR ($kerdoiv_obj->sorszam == '81') OR ($kerdoiv_obj->sorszam == '82') OR ($kerdoiv_obj->sorszam == '83'))}
   <div id="survey" style="margin-top: -20px;">
{else}
	  <div id="survey">
{/if}
	  <form action="?" name="form_survey" id="form_survey" method="post">
		 <input type="hidden" name="kerdoiv" id="kerdoiv" value="{$smarty.request.kerdoiv}" />
		 <input type="hidden" name="p" id="p" value="{$smarty.request.p}" />		 

{include file="kerdoiv_3_szakasz.tpl"} {*kötelezően megadandó adatok*}
{include file="kerdoiv_4_szakasz.tpl"} {*google hirdetések*}

		 <div style="float: left; background-color: #fff; width: 90%;">
			<ul id="slider2">
{foreach from=$kerdes_blokk_tomb key=sorszam_kerdes item=kerdes name=outer}
				  <li>
					 <div class="survey_block">
{include file="kerdoiv_5_szakasz.tpl"} {*kérdés blokk*}
{include file="kerdoiv_6_szakasz.tpl"} {*válasz blokk*}
					 </div>
				  </li>
{/foreach}
            </ul>
{include file="kerdoiv_7_szakasz.tpl"} {*kérdőív vége*}
		 </div>
		 <input type="hidden" name="sorrendezes" id="sorrendezes" value="" />
		 <input type="hidden" name="l" value="{$smarty.request.l}" />
	  </form>
   </div>
{include file="kerdoiv_8_szakasz.tpl"} {*kérdőív végi scriptek*}	
{$kerdoiv_fejlec}
		 <div id="survey">
           <form action="?" name="form_survey" id="form_survey" method="post">
                <input type="hidden" name="kerdoiv" id="kerdoiv" value="{$smarty.request.kerdoiv}" />
                    <input type="hidden" name="p" id="p" value="{$smarty.request.p}" />
                    {$szemelyes_adatok}
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
               
               {foreach from=$kerdes_blokk_tomb key=sorszam_kerdes item=kerdes}
                <li>
                    <div class="survey_block">
                        <div class="survey_question">
                        <span>
                            {$kerdes.kerdes_sorrend} {$kerdes.kerdes}
                        </span>
{if (($smarty.request.mod) AND ($smarty.session.qa_user_id))}
                            <div>
				<a href="#" title="kérdés törlése" onclick="megerosites_x({$sorszam_kerdes}, 'kerdes', '{$kerdoiv_obj->sorszam}')" ></a>
				<a href="?p=ujkerdes&amp;id={$sorszam_kerdes}" title="kérdés módosítása"></a>
				<a href="?p=ujkerdes&amp;kerdoiv={$kerdoiv_obj->sorszam}&ujkerdes=x&kszam={$sorszam_kerdes}" title="új kérdés beszúrása"></a>
                            </div>
{/if}
                        </div>
                        <div class="survey_answers">
                            {$kerdes.kerdes_kep}
                            {$kerdes.kerdes_video}
                            {$kerdes.valaszok}
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
{$kerdoiv_headline}
   <div id="intro">
	  <div id="survey_intro">
		 <h1>{$kerdoiv_obj->cim}</h1>
		 {$fejlec_szerk}
		 <div id="survey_intro_div">
		 {$kerdoiv_obj->leiras}
		 </div>
		 {$control_box}
	  </div>			
   </div>
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
{if $smarty.request.mod}
							  <select name="kerdes_sorrend_{$sorszam_kerdes}" id="kerdes_sorrend_{$sorszam_kerdes}" onchange="kerdes_sorrend_ment(this.id)">
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
							  <a href="#" title="kérdés törlése" onclick="megerosites_x({$sorszam_kerdes}, 'kerdes', '{$kerdoiv_obj->sorszam}')" ></a>
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
                            {$kerdes.valaszok}
{/if}
{if $kerdes.kerdes_tipus == 'textarea'}
						    <textarea cols="1" rows="1" name="textarea_{$sorszam_kerdes}">{$kerdes.valaszok}</textarea>
{/if}
{if $kerdes.kerdes_tipus == 'text'}
						    <input type="text" name="text_{$sorszam_kerdes}" value="{$kerdes.valaszok}" />
                            
{/if}
{if $kerdes.kerdes_tipus == 'select'}
						    <select name="select_{$sorszam_kerdes}">
							  <option value="0">---</option>
							  {$kerdes.valaszok}
						    </select>
{/if}
{if $kerdes.kerdes_tipus == 'radio'}
                            {$kerdes.valaszok}
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
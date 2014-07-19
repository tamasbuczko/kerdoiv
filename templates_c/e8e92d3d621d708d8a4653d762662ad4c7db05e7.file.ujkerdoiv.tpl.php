<?php /* Smarty version Smarty-3.1.14, created on 2014-07-19 08:30:58
         compiled from "templates\ujkerdoiv.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2478553ca2cc287bce1-22431356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8e92d3d621d708d8a4653d762662ad4c7db05e7' => 
    array (
      0 => 'templates\\ujkerdoiv.tpl',
      1 => 1405758093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2478553ca2cc287bce1-22431356',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'urlap_cim' => 0,
    'lang' => 0,
    'control_box_ki' => 0,
    'control_hu' => 0,
    'control_en' => 0,
    'control_de' => 0,
    'vissza_link' => 0,
    'id' => 0,
    'checked_en' => 0,
    'checked_de' => 0,
    'checked_hu' => 0,
    'kep_fejlec' => 0,
    'cim_en' => 0,
    'cim_enx' => 0,
    'cim_de' => 0,
    'cim_dex' => 0,
    'cim_hu' => 0,
    'cim_hux' => 0,
    'leiras_enx' => 0,
    'leiras_en' => 0,
    'leiras_dex' => 0,
    'leiras_de' => 0,
    'leiras_hux' => 0,
    'leiras_hu' => 0,
    'zaras_enx' => 0,
    'zaras_en' => 0,
    'zaras_dex' => 0,
    'zaras_de' => 0,
    'zaras_hux' => 0,
    'zaras_hu' => 0,
    'kerdoiv_obj' => 0,
    'checked_emailbeker' => 0,
    'checked_nyilvanos' => 0,
    'checked_ajandek' => 0,
    'checked_hirdetessel' => 0,
    'checked_stilus_alap' => 0,
    'checked_stilus_1' => 0,
    'checked_stilus_2' => 0,
    'checked_stilus_3' => 0,
    'checked_stilus_4' => 0,
    'checked_stilus_5' => 0,
    'checked_stilus_6' => 0,
    'aktivalas' => 0,
    'lejarat' => 0,
    'checked_neme' => 0,
    'checked_kora' => 0,
    'checked_orszag' => 0,
    'checked_foglalkozas' => 0,
    'checked_vegzettseg' => 0,
    'checked_jovedelem' => 0,
    'checked_csaladiallapot' => 0,
    'uj_admin' => 0,
    'adminok' => 0,
    'sor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ca2cc2bc7948_70469341',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ca2cc2bc7948_70469341')) {function content_53ca2cc2bc7948_70469341($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['urlap_cim']->value;?>
</h1><form action="" method="post" enctype="multipart/form-data" class="ujkerdes">    <div id="control_box">        <h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Vezérlőpult'];?>
</h3>        <div <?php echo $_smarty_tpl->tpl_vars['control_box_ki']->value;?>
>        <label>Látható nyelvek:</label>        <img src="graphics/magyar_zaszlo_k.png" id="hu" alt="magyar" onclick="nyelv_kapcs(this.id)" <?php echo $_smarty_tpl->tpl_vars['control_hu']->value;?>
 />        <img src="graphics/angol_zaszlo_k.png" id="en" alt="angol" onclick="nyelv_kapcs(this.id)" <?php echo $_smarty_tpl->tpl_vars['control_en']->value;?>
 />        <img src="graphics/nemet_zaszlo_k.png" id="de" alt="német" onclick="nyelv_kapcs(this.id)" <?php echo $_smarty_tpl->tpl_vars['control_de']->value;?>
 />        </div>        <input type="submit" name="mentes" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Mentés'];?>
"/>        <a href="<?php echo $_smarty_tpl->tpl_vars['vissza_link']->value;?>
" class="back"><?php echo $_smarty_tpl->tpl_vars['lang']->value['vissza'];?>
</a>    </div>    <input type="hidden" name="sorszam" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />        <label>Milyen nyelveken szeretnéd elkészíteni a kérdőívet?</label>    <div>        <label>angol</label><input type="checkbox" <?php echo $_smarty_tpl->tpl_vars['checked_en']->value;?>
 name="check_en" onclick="nyelv_kapcs('en')" /><br />    </div>    <div>    <label>német</label><input type="checkbox" <?php echo $_smarty_tpl->tpl_vars['checked_de']->value;?>
 name="check_de" onclick="nyelv_kapcs('de')" /><br />    </div>    <div>    <label>magyar</label><input type="checkbox" <?php echo $_smarty_tpl->tpl_vars['checked_hu']->value;?>
 name="check_hu" onclick="nyelv_kapcs('hu')" /><br />    </div>        <br style="clear: both;" /><label>Fejléckép feltöltése a kérdőívhez</label>	<div class="file_browse_wrapper_x">	  <input name="fejlec_kep" type="file" size="30" title="kép feltöltése" value="ok" accept="image/*" onchange="kepfigyel('fejlec_kep_uzenet')" />	</div>        <div class="mentes_uzenet" id="fejlec_kep_uzenet">A kép feltöltéséhez mentés szükséges!</div>                <?php echo $_smarty_tpl->tpl_vars['kep_fejlec']->value;?>
        <br style="clear: both;" />        <label>A kérdőív címe</label>    <input type="text" name="cim_en" id="cim_en" value="<?php echo $_smarty_tpl->tpl_vars['cim_en']->value;?>
" placeholder="Title of the new survey" <?php echo $_smarty_tpl->tpl_vars['cim_enx']->value;?>
/>    <input type="text" name="cim_de" id="cim_de" value="<?php echo $_smarty_tpl->tpl_vars['cim_de']->value;?>
" placeholder="Titel der neuen Umfrage" <?php echo $_smarty_tpl->tpl_vars['cim_dex']->value;?>
/>    <input type="text" name="cim_hu" id="cim_hu" value="<?php echo $_smarty_tpl->tpl_vars['cim_hu']->value;?>
" placeholder="Az új kérdőív címe" onclick="del_text(this.id)" <?php echo $_smarty_tpl->tpl_vars['cim_hux']->value;?>
/>    <label>Leírás</label>    <textarea name="leiras_en" id="leiras_en"<?php echo $_smarty_tpl->tpl_vars['leiras_enx']->value;?>
 placeholder="Short description of the new survey"><?php echo $_smarty_tpl->tpl_vars['leiras_en']->value;?>
</textarea>    <textarea name="leiras_de" id="leiras_de"<?php echo $_smarty_tpl->tpl_vars['leiras_dex']->value;?>
 placeholder="Kurze Beschreibung der neuen Umfrage"><?php echo $_smarty_tpl->tpl_vars['leiras_de']->value;?>
</textarea>    <textarea name="leiras_hu" id="leiras_hu"<?php echo $_smarty_tpl->tpl_vars['leiras_hux']->value;?>
 placeholder="Az új kérdőív rövid leírása" onclick="del_text(this.id)"><?php echo $_smarty_tpl->tpl_vars['leiras_hu']->value;?>
</textarea>    <label>Zárás</label>    <textarea name="zaras_en" id="zaras_en"<?php echo $_smarty_tpl->tpl_vars['zaras_enx']->value;?>
 placeholder="The final wording of the survey"><?php echo $_smarty_tpl->tpl_vars['zaras_en']->value;?>
</textarea>    <textarea name="zaras_de" id="zaras_de"<?php echo $_smarty_tpl->tpl_vars['zaras_dex']->value;?>
 placeholder="Der endgültige Wortlaut der Umfrage"><?php echo $_smarty_tpl->tpl_vars['zaras_de']->value;?>
</textarea>    <textarea name="zaras_hu" id="zaras_hu"<?php echo $_smarty_tpl->tpl_vars['zaras_hux']->value;?>
 placeholder="A kérdőív záró szövege" onclick="del_text(this.id)"><?php echo $_smarty_tpl->tpl_vars['zaras_hu']->value;?>
</textarea>    <br style="clear:both;" />    <p id="ujkerdoiv_elvalaszto"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Az alábbi adatokat később is megadhatod vagy módosíthatod a "Kérdőív módosítása" gomra kattintva.'];?>
</p>	<br style="clear:both;" />    <label style="width: 230px; float: left;">A kérdőív típusa</label>	<input type="radio" name="tipus" value="zart" id="tipus_zart" style="margin-top: 15px;"<?php if ($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->zart=='1'){?> checked="checked"<?php }?> />zárt	<input type="radio" name="tipus" value="nyilt"  id="tipus_nyilt" <?php if ($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->zart=='0'){?> checked="checked"<?php }?> />nyílt		<br style="clear:both;" />        <span id="email_beker_blokk"<?php if ($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->zart=='1'){?> style="display: none;"<?php }?>>	<label style="width: 230px; float: left;">Hogyan kéred a kitöltő email címét?</label>    <!--<input type="checkbox" name="emailbeker" style="margin-top: 15px;" <?php echo $_smarty_tpl->tpl_vars['checked_emailbeker']->value;?>
 />-->	<input type="radio" name="email_tipus" value="nem" style="margin-top: 15px;"<?php if ($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->email=='0'){?> checked="checked"<?php }?> />nem kérem	<input type="radio" name="email_tipus" value="megadhato"<?php if ($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->email=='1'){?> checked="checked"<?php }?> />megadhatja	<input type="radio" name="email_tipus" value="kotelezo"<?php if ($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->email=='2'){?> checked="checked"<?php }?> />kötelező megadni	<br style="clear:both;" />                <label style="width: 230px; float: left;">A kérdőív legyen nyilvános?</label>        <input type="checkbox" name="nyilvanos" style="margin-top: 15px;" <?php echo $_smarty_tpl->tpl_vars['checked_nyilvanos']->value;?>
 />         <label class="magyarazat">A nyilvános kérdőív a főoldalon megjelenik, bárki láthatja és kitöltheti.</label>	<label class="magyarazat">Továbbá a regisztrált felhasználók a kitöltést követően megtekinthetik az eredményeket.</label>        <br style="clear:both;" />        </span>         <span id="zart_emailek_blokk"<?php if ($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->zart!='1'){?> style="display: none;"<?php }?>>             <label style="width: 230px; display: block; float: left;">Email címek</label>             <textarea name="zart_emailek" id="zart_emailek"></textarea>             <br style="clear:both;" />         </span>            <label style="width: 230px; float: left;">Sorsolsz ajándékot?</label>        <input type="checkbox" name="ajandek" style="margin-top: 15px;" <?php echo $_smarty_tpl->tpl_vars['checked_ajandek']->value;?>
 />	<br style="clear:both;" />    <label style="width: 230px; float: left;">A kérdőív tartalmazhat hirdetéseket?</label>    <input type="checkbox" name="hirdetessel" style="margin-top: 15px;" <?php echo $_smarty_tpl->tpl_vars['checked_hirdetessel']->value;?>
 />	<br style="clear:both;" />		<label style="width: 230px;">Választott stílus:</label>	<div id="stilusok">	  <div>		 <img src="graphics/stilus_alap.jpg" alt="" />		 <input type="radio" name="stilus" value="0" <?php echo $_smarty_tpl->tpl_vars['checked_stilus_alap']->value;?>
 />	  </div>	  <div>		<img src="graphics/stilus_piros.jpg" alt="" />		<input type="radio" name="stilus" value="1" <?php echo $_smarty_tpl->tpl_vars['checked_stilus_1']->value;?>
 />	  </div>	  <div>		<img src="graphics/stilus_zold.jpg" alt="" />		<input type="radio" name="stilus" value="2" <?php echo $_smarty_tpl->tpl_vars['checked_stilus_2']->value;?>
 />	  </div>			  <div>		<img src="graphics/stilus_bordo.jpg" alt="" />		<input type="radio" name="stilus" value="3" <?php echo $_smarty_tpl->tpl_vars['checked_stilus_3']->value;?>
 />	  </div>			  <div>		<img src="graphics/stilus_sarga.jpg" alt="" />		<input type="radio" name="stilus" value="4" <?php echo $_smarty_tpl->tpl_vars['checked_stilus_4']->value;?>
 />	  </div>			  <div>		<img src="graphics/stilus_lila.jpg" alt="" />		<input type="radio" name="stilus" value="5" <?php echo $_smarty_tpl->tpl_vars['checked_stilus_5']->value;?>
 />	  </div>			  <div>		<img src="graphics/stilus_kek.jpg" alt="" />		<input type="radio" name="stilus" value="6" <?php echo $_smarty_tpl->tpl_vars['checked_stilus_6']->value;?>
 />	  </div>	</div>		<br style="clear:both;" />    <label style="width: 230px;">A kérdőív aktiválásának dátuma</label>	<input type="text" name="aktivalas_datum" id="aktivalas_datum" value="<?php echo $_smarty_tpl->tpl_vars['aktivalas']->value;?>
" style="width: 90px;" />	<br style="clear:both;" />    <label style="width: 230px;">A kérdőív lejáratának dátuma</label>	<input type="text" name="lejarat_datum" id="lejarat_datum" value="<?php echo $_smarty_tpl->tpl_vars['lejarat']->value;?>
" style="width: 90px;" />    <br style="clear:both;" />    <label>Milyen kötelező személyes adatokat kérsz a kitöltőtől?</label>	<div id="szemelyes_admin">	  <div>		<label>Neme</label>		<input type="checkbox" name="neme" <?php echo $_smarty_tpl->tpl_vars['checked_neme']->value;?>
/>	  </div>	  <div>    		<label>Kora</label>		<input type="checkbox" name="kora" <?php echo $_smarty_tpl->tpl_vars['checked_kora']->value;?>
/>	  </div>	  <div>		<label>Ország</label>		<input type="checkbox" name="orszag" <?php echo $_smarty_tpl->tpl_vars['checked_orszag']->value;?>
/>	  </div>	  <div>		<label>Foglalkozása</label>		<input type="checkbox" name="foglalkozas" <?php echo $_smarty_tpl->tpl_vars['checked_foglalkozas']->value;?>
/>	  </div>	  <div>		<label>Végzettség</label>		<input type="checkbox" name="vegzettseg" <?php echo $_smarty_tpl->tpl_vars['checked_vegzettseg']->value;?>
/>	  </div>	  <div>		<label>Jövedelem</label>		<input type="checkbox" name="jovedelem" <?php echo $_smarty_tpl->tpl_vars['checked_jovedelem']->value;?>
/>	  </div>	  <div>		<label>Családi állapot</label>		<input type="checkbox" name="csaladiallapot" <?php echo $_smarty_tpl->tpl_vars['checked_csaladiallapot']->value;?>
/>	  </div>	</div><?php if ($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->keszito_id==$_SESSION['qa_user_id']){?>	<label style="width: 330px;">Új adminisztrátor hozzáadása a kérdőívhez</label>	<input type="text" name="uj_admin" id="lejarat_datum" value="<?php echo $_smarty_tpl->tpl_vars['uj_admin']->value;?>
" style="width: 190px; float: left;" />	<input type="submit" name="mentes" value="+" style="float: left; clear: none;" /><br /><br /><?php if ($_smarty_tpl->tpl_vars['adminok']->value){?>	<label style="width: 330px;">További adminisztrátorok:</label>	<?php  $_smarty_tpl->tpl_vars["sor"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["sor"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['adminok']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["sor"]->key => $_smarty_tpl->tpl_vars["sor"]->value){
$_smarty_tpl->tpl_vars["sor"]->_loop = true;
?>	   <?php echo $_smarty_tpl->tpl_vars['sor']->value['email'];?>
<img src="graphics/icon_del.png" alt="" style="width: 15px; margin: 2px 0px -2px 10px;" onClick="megerosites_x('<?php echo $_smarty_tpl->tpl_vars['sor']->value['sorszam'];?>
', 'ujadminok', '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');" title="eltávolítás" /><br />	<?php } ?>	<br /><br /><?php }?><?php }else{ ?>        <label style="width: 330px;">A kérdőív tulajdonosa: <?php echo $_smarty_tpl->tpl_vars['kerdoiv_obj']->value->keszito_email;?>
</label><br /><br /><?php }?><?php if ($_smarty_tpl->tpl_vars['kerdoiv_obj']->value->keszito_id==$_SESSION['qa_user_id']){?>   <div id="kerdoiv_torles" onclick="megerosites_x(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, 'kerdoiv_torles', <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
)">A kérdőív törlése</div><?php }?></form><?php }} ?>
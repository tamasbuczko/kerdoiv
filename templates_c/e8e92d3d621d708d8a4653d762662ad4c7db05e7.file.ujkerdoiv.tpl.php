<?php /* Smarty version Smarty-3.1.14, created on 2014-05-19 21:23:09
         compiled from "templates\ujkerdoiv.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15232537a573bcc04d7-04197359%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8e92d3d621d708d8a4653d762662ad4c7db05e7' => 
    array (
      0 => 'templates\\ujkerdoiv.tpl',
      1 => 1400527387,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15232537a573bcc04d7-04197359',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_537a573c070907_57437161',
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
    'checked_nyilvanos' => 0,
    'checked_stilus_alap' => 0,
    'checked_stilus_1' => 0,
    'checked_stilus_2' => 0,
    'aktivalas' => 0,
    'lejarat' => 0,
    'checked_neme' => 0,
    'checked_kora' => 0,
    'checked_orszag' => 0,
    'checked_foglalkozas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537a573c070907_57437161')) {function content_537a573c070907_57437161($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['urlap_cim']->value;?>
</h1>
<form action="" method="post" enctype="multipart/form-data" class="ujkerdes">
    <div id="control_box">
        <h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Vezérlőpult'];?>
</h3>
        <div <?php echo $_smarty_tpl->tpl_vars['control_box_ki']->value;?>
>
        <label>Látható nyelvek:</label>
        <img src="graphics/magyar_zaszlo_k.png" id="hu" alt="magyar" onclick="nyelv_kapcs(this.id)" <?php echo $_smarty_tpl->tpl_vars['control_hu']->value;?>
 />
        <img src="graphics/angol_zaszlo_k.png" id="en" alt="angol" onclick="nyelv_kapcs(this.id)" <?php echo $_smarty_tpl->tpl_vars['control_en']->value;?>
 />
        <img src="graphics/nemet_zaszlo_k.png" id="de" alt="német" onclick="nyelv_kapcs(this.id)" <?php echo $_smarty_tpl->tpl_vars['control_de']->value;?>
 />
        </div>
        <input type="submit" name="mentes" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Mentés'];?>
"/>
        <a href="<?php echo $_smarty_tpl->tpl_vars['vissza_link']->value;?>
" class="back"><?php echo $_smarty_tpl->tpl_vars['lang']->value['vissza'];?>
</a>
    </div>
    <input type="hidden" name="sorszam" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
    
    <label>Milyen nyelveken szeretnéd elkészíteni a kérdőívet?</label>
    <div>    
    <label>angol</label><input type="checkbox" <?php echo $_smarty_tpl->tpl_vars['checked_en']->value;?>
 name="check_en" onclick="nyelv_kapcs('en')" /><br />
    </div>
    <div>
    <label>német</label><input type="checkbox" <?php echo $_smarty_tpl->tpl_vars['checked_de']->value;?>
 name="check_de" onclick="nyelv_kapcs('de')" /><br />
    </div>
    <div>
    <label>magyar</label><input type="checkbox" <?php echo $_smarty_tpl->tpl_vars['checked_hu']->value;?>
 name="check_hu" onclick="nyelv_kapcs('hu')" /><br />
    </div>
    
    <br style="clear: both;" />
	<div class="file_browse_wrapper">
	  <input name="fejlec_kep" type="file" size="30" title="kép feltöltése" value="ok" accept="image/*" class="file_browse" />
	</div>
        <label>Fejléckép feltöltése a kérdőívhez</label>
        <?php echo $_smarty_tpl->tpl_vars['kep_fejlec']->value;?>

        <br style="clear: both;" />
    
    <label>A kérdőív címe</label>
    <input type="text" name="cim_en" id="cim_en" value="<?php echo $_smarty_tpl->tpl_vars['cim_en']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['cim_enx']->value;?>
/>
    <input type="text" name="cim_de" id="cim_de" value="<?php echo $_smarty_tpl->tpl_vars['cim_de']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['cim_dex']->value;?>
/>
    <input type="text" name="cim_hu" id="cim_hu" value="<?php echo $_smarty_tpl->tpl_vars['cim_hu']->value;?>
" placeholder="Az új kérdőív címe" onclick="del_text(this.id)" <?php echo $_smarty_tpl->tpl_vars['cim_hux']->value;?>
/>
    <label>Leírás</label>
    <textarea name="leiras_en" id="leiras_en"<?php echo $_smarty_tpl->tpl_vars['leiras_enx']->value;?>
><?php echo $_smarty_tpl->tpl_vars['leiras_en']->value;?>
</textarea>
    <textarea name="leiras_de" id="leiras_de"<?php echo $_smarty_tpl->tpl_vars['leiras_dex']->value;?>
><?php echo $_smarty_tpl->tpl_vars['leiras_de']->value;?>
</textarea>
    <textarea name="leiras_hu" id="leiras_hu"<?php echo $_smarty_tpl->tpl_vars['leiras_hux']->value;?>
 onclick="del_text(this.id)"><?php echo $_smarty_tpl->tpl_vars['leiras_hu']->value;?>
</textarea>
    <label>Zárás</label>
    <textarea name="zaras_en" id="zaras_en"<?php echo $_smarty_tpl->tpl_vars['zaras_enx']->value;?>
><?php echo $_smarty_tpl->tpl_vars['zaras_en']->value;?>
</textarea>
    <textarea name="zaras_de" id="zaras_de"<?php echo $_smarty_tpl->tpl_vars['zaras_dex']->value;?>
><?php echo $_smarty_tpl->tpl_vars['zaras_de']->value;?>
</textarea>
    <textarea name="zaras_hu" id="zaras_hu"<?php echo $_smarty_tpl->tpl_vars['zaras_hux']->value;?>
 onclick="del_text(this.id)"><?php echo $_smarty_tpl->tpl_vars['zaras_hu']->value;?>
</textarea>
    <br style="clear:both;" />
    <label style="width: 230px; float: left;">A kérdőív eredményei nyilvánosak?</label>
    <input type="checkbox" name="nyilvanos" style="margin-top: 15px;" <?php echo $_smarty_tpl->tpl_vars['checked_nyilvanos']->value;?>
 />
	<br style="clear:both;" />
	
	<label style="width: 230px;">Választott stílus:</label>
	<div id="stilusok">
	  <div>
		 <img src="graphics/stilus_alap.jpg" alt="" />
		 <input type="radio" name="stilus" value="0" <?php echo $_smarty_tpl->tpl_vars['checked_stilus_alap']->value;?>
 />
	  </div>
	  <div>
		<img src="graphics/stilus_piros.jpg" alt="" />
		<input type="radio" name="stilus" value="1" <?php echo $_smarty_tpl->tpl_vars['checked_stilus_1']->value;?>
 />
	  </div>
	  <div>
		<img src="graphics/stilus_zold.jpg" alt="" />
		<input type="radio" name="stilus" value="2" <?php echo $_smarty_tpl->tpl_vars['checked_stilus_2']->value;?>
 />
	  </div>
	</div>
	
	<br style="clear:both;" />
    <label style="width: 230px;">A kérdőív aktiválásának dátuma</label>
	<input type="text" name="aktivalas_datum" id="aktivalas_datum" value="<?php echo $_smarty_tpl->tpl_vars['aktivalas']->value;?>
" style="width: 90px;" />
	<br style="clear:both;" />
    <label style="width: 230px;">A kérdőív lejáratának dátuma</label>
	<input type="text" name="lejarat_datum" id="lejarat_datum" value="<?php echo $_smarty_tpl->tpl_vars['lejarat']->value;?>
" style="width: 90px;" />

    <br style="clear:both;" />
    <label>Milyen kötelező személyes adatokat kérsz a kitöltőtől?</label>
    <div>
    <label>Neme</label><input type="checkbox" name="neme" <?php echo $_smarty_tpl->tpl_vars['checked_neme']->value;?>
/><br />
    </div>
	<div>    
    <label>Kora</label><input type="checkbox" name="kora" <?php echo $_smarty_tpl->tpl_vars['checked_kora']->value;?>
/><br />
    </div>
	<div>
    <label>Ország</label><input type="checkbox" name="orszag" <?php echo $_smarty_tpl->tpl_vars['checked_orszag']->value;?>
/><br />
    </div>
	<div>
    <label>Foglalkozása</label><input type="checkbox" name="foglalkozas" <?php echo $_smarty_tpl->tpl_vars['checked_foglalkozas']->value;?>
/>
    </div>

</form><?php }} ?>
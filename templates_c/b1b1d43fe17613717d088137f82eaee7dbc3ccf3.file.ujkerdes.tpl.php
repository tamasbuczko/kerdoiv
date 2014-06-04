<?php /* Smarty version Smarty-3.1.14, created on 2014-06-03 21:09:40
         compiled from "templates\ujkerdes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:258845374fc2b1eabd2-48848554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1b1d43fe17613717d088137f82eaee7dbc3ccf3' => 
    array (
      0 => 'templates\\ujkerdes.tpl',
      1 => 1401734964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '258845374fc2b1eabd2-48848554',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5374fc2bae4277_54985124',
  'variables' => 
  array (
    'urlap_cim' => 0,
    'lang' => 0,
    'control_box_ki' => 0,
    'control_en' => 0,
    'control_de' => 0,
    'control_hu' => 0,
    'elozo_kerdes' => 0,
    'hanyadik_kerdes' => 0,
    'osszes_kerdes' => 0,
    'kovetkezo_kerdes' => 0,
    'kerdoiv_sorszam' => 0,
    'id' => 0,
    'kerdes_enx' => 0,
    'kerdes_szoveg_en' => 0,
    'kerdes_dex' => 0,
    'kerdes_szoveg_de' => 0,
    'kerdes_hux' => 0,
    'kerdes_szoveg_hu' => 0,
    'kep_kerdes' => 0,
    'video_kerdes' => 0,
    'check_radio' => 0,
    'check_select' => 0,
    'check_checkbox' => 0,
    'check_text' => 0,
    'check_textarea' => 0,
    'check_ranking' => 0,
    'valaszok2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5374fc2bae4277_54985124')) {function content_5374fc2bae4277_54985124($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['urlap_cim']->value;?>
</h1>
<form action="" method="post" enctype="multipart/form-data" class="ujkerdes" >
    <div id="control_box">
        <h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Vezérlőpult'];?>
</h3>
        <div <?php echo $_smarty_tpl->tpl_vars['control_box_ki']->value;?>
>
        <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Látható nyelvek:'];?>
</label>
        <?php echo $_smarty_tpl->tpl_vars['control_en']->value;?>

        <?php echo $_smarty_tpl->tpl_vars['control_de']->value;?>

        <?php echo $_smarty_tpl->tpl_vars['control_hu']->value;?>

        </div>
        <input type="submit" name="pluszvalasz" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['+1 válasz'];?>
" title="+1 válasz hozzáadása" class="sarga_gomb">
        <input type="submit" name="mentes" value=<?php echo $_smarty_tpl->tpl_vars['lang']->value['Mentés'];?>
 title="változások rögzítése">
        
        <div id="lepteto">
            <a href="?p=ujkerdes&id=<?php echo $_smarty_tpl->tpl_vars['elozo_kerdes']->value;?>
" /></a>
            <span><?php echo $_smarty_tpl->tpl_vars['hanyadik_kerdes']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['osszes_kerdes']->value;?>
</span>
            <a href="?p=ujkerdes&id=<?php echo $_smarty_tpl->tpl_vars['kovetkezo_kerdes']->value;?>
" /></a>
        </div>
        <a href="?p=kerdoiv&mod=1&kerdoiv=<?php echo $_smarty_tpl->tpl_vars['kerdoiv_sorszam']->value;?>
" class="back"><?php echo $_smarty_tpl->tpl_vars['lang']->value['vissza'];?>
</a>
        <br style="clear: both;" />
    </div>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
    <input type="hidden" name="kerdoiv_sorszam" value="<?php echo $_smarty_tpl->tpl_vars['kerdoiv_sorszam']->value;?>
" />
    <label>Kérdés</label>

    <textarea name="kerdes_en"<?php echo $_smarty_tpl->tpl_vars['kerdes_enx']->value;?>
 id="kerdes_en"<?php echo $_smarty_tpl->tpl_vars['kerdes_enx']->value;?>
 class="en_k"><?php echo $_smarty_tpl->tpl_vars['kerdes_szoveg_en']->value;?>
</textarea>
    <textarea name="kerdes_de"<?php echo $_smarty_tpl->tpl_vars['kerdes_dex']->value;?>
 id="kerdes_de"<?php echo $_smarty_tpl->tpl_vars['kerdes_dex']->value;?>
 class="de_k"><?php echo $_smarty_tpl->tpl_vars['kerdes_szoveg_de']->value;?>
</textarea>
    <textarea name="kerdes_hu"<?php echo $_smarty_tpl->tpl_vars['kerdes_hux']->value;?>
 id="kerdes_hu"<?php echo $_smarty_tpl->tpl_vars['kerdes_hux']->value;?>
 class="hu_k"><?php echo $_smarty_tpl->tpl_vars['kerdes_szoveg_hu']->value;?>
</textarea>
        <br />
	<div class="file_browse_wrapper">
	  <input name="kerdes_kep" type="file" size="30" title="kép feltöltése" value="ok" accept="image/*" class="file_browse" />
	</div>
        <label>Kép feltöltése a kérdéshez</label>
        <?php echo $_smarty_tpl->tpl_vars['kep_kerdes']->value;?>

        <br style="clear: both;" />
	<label>Videó beágyazása a kérdéshez</label>
	<input type="text" name="video_kerdes" value="<?php echo $_smarty_tpl->tpl_vars['video_kerdes']->value;?>
" class="video_embed" />
    <label>Típusa</label>
    <div id="info">
        <label title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['A kitöltő csak egy választ jelölhet be.'];?>
">radio<span>i</span></label>
        <input type="radio" name="tipus" value="radio" <?php echo $_smarty_tpl->tpl_vars['check_radio']->value;?>
 />
    </div>
    <div id="info">
        <label title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Kitöltéskor egy legördülő listából lehet egyet kiválasztani.'];?>
">select<span>i</span></label>
        <input type="radio" name="tipus" value="select" <?php echo $_smarty_tpl->tpl_vars['check_select']->value;?>
 />
    </div>
    <div id="info">
        <label title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Kitöltéskor bármennyi válasz bejelölhető.'];?>
">checkbox<span>i</span></label>
        <input type="radio" name="tipus" value="checkbox" <?php echo $_smarty_tpl->tpl_vars['check_checkbox']->value;?>
 />
    </div>
    <div id="info">
        <label title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Egy szavas vagy rövid mondatos választ kérhetünk.'];?>
">text<span>i</span></label>
        <input type="radio" name="tipus" value="text" <?php echo $_smarty_tpl->tpl_vars['check_text']->value;?>
 />
    </div>
    <div id="info">
        <label title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Hosszabb terjedelmű válasz kérésére használható.'];?>
">textarea<span>i</span></label>
        <input type="radio" name="tipus" value="textarea" <?php echo $_smarty_tpl->tpl_vars['check_textarea']->value;?>
 />
    </div>
    <div id="info">
        <label Title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Egy vagy több válaszlehetőséget értékelhetünk 1-től 5-ig terjedő skálán.'];?>
">ranking<span>i</span></label>
        <input type="radio" name="tipus" value="ranking" <?php echo $_smarty_tpl->tpl_vars['check_ranking']->value;?>
 />
    </div>
    <br style="clear: both;" />
    <label>Válaszok</label>
	
	<div id="admin_valaszok" class="gridster" style="width: 790px; border: 0px solid #aaa;">
		 <?php echo $_smarty_tpl->tpl_vars['valaszok2']->value;?>

	</div>
    
</form>
<br /><br />

	  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>	  
	  <script src="gridster/dist/jquery.gridster.js" type="text/javascript" charset="utf-8"></script>
	  <script type="text/javascript" src="csempe.js"></script>

<?php }} ?>
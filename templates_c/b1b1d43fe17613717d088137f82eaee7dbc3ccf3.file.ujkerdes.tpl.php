<?php /* Smarty version Smarty-3.1.14, created on 2014-07-19 09:03:50
         compiled from "templates\ujkerdes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:346153ca347605fd65-00345004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1b1d43fe17613717d088137f82eaee7dbc3ccf3' => 
    array (
      0 => 'templates\\ujkerdes.tpl',
      1 => 1405758093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '346153ca347605fd65-00345004',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ca3476207ac0_97072262',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ca3476207ac0_97072262')) {function content_53ca3476207ac0_97072262($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['urlap_cim']->value;?>
</h1><form action="" method="post" enctype="multipart/form-data" class="ujkerdes" >    <div id="control_box">        <h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Vezérlőpult'];?>
</h3>        <div <?php echo $_smarty_tpl->tpl_vars['control_box_ki']->value;?>
>        <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Látható nyelvek:'];?>
</label>        <?php echo $_smarty_tpl->tpl_vars['control_en']->value;?>
        <?php echo $_smarty_tpl->tpl_vars['control_de']->value;?>
        <?php echo $_smarty_tpl->tpl_vars['control_hu']->value;?>
        </div>        <a href="#" class="zold_gomb" style="float: left;" onclick="uj_kerdes()"><?php echo $_smarty_tpl->tpl_vars['lang']->value['új kérdés rögzítése'];?>
</a>                <input type="submit" name="pluszvalasz" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['+1 válasz'];?>
" title="+1 válasz hozzáadása" class="sarga_gomb">        <input type="submit" name="mentes" id="mentes" value=<?php echo $_smarty_tpl->tpl_vars['lang']->value['Mentés'];?>
 title="változások rögzítése">                <div id="lepteto">            <a href="?p=ujkerdes&id=<?php echo $_smarty_tpl->tpl_vars['elozo_kerdes']->value;?>
" /></a>            <span><?php echo $_smarty_tpl->tpl_vars['hanyadik_kerdes']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['osszes_kerdes']->value;?>
</span>            <a href="?p=ujkerdes&id=<?php echo $_smarty_tpl->tpl_vars['kovetkezo_kerdes']->value;?>
" /></a>        </div>        <a href="?p=kerdoiv&mod=1&kerdoiv=<?php echo $_smarty_tpl->tpl_vars['kerdoiv_sorszam']->value;?>
" class="back"><?php echo $_smarty_tpl->tpl_vars['lang']->value['vissza'];?>
</a>        <br style="clear: both;" />    </div>    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />    <input type="hidden" name="kerdoiv_sorszam" value="<?php echo $_smarty_tpl->tpl_vars['kerdoiv_sorszam']->value;?>
" />    <label>Kérdés</label>    <input type="hidden" name="ujkerdesxxx" id="ujkerdesxxx" value="" />    <textarea name="kerdes_en"<?php echo $_smarty_tpl->tpl_vars['kerdes_enx']->value;?>
 id="kerdes_en"<?php echo $_smarty_tpl->tpl_vars['kerdes_enx']->value;?>
 placeholder="" class="en_k"><?php echo $_smarty_tpl->tpl_vars['kerdes_szoveg_en']->value;?>
</textarea>    <textarea name="kerdes_de"<?php echo $_smarty_tpl->tpl_vars['kerdes_dex']->value;?>
 id="kerdes_de"<?php echo $_smarty_tpl->tpl_vars['kerdes_dex']->value;?>
 placeholder="" class="de_k"><?php echo $_smarty_tpl->tpl_vars['kerdes_szoveg_de']->value;?>
</textarea>    <textarea name="kerdes_hu"<?php echo $_smarty_tpl->tpl_vars['kerdes_hux']->value;?>
 id="kerdes_hu"<?php echo $_smarty_tpl->tpl_vars['kerdes_hux']->value;?>
 placeholder="Kérdés" class="hu_k"><?php echo $_smarty_tpl->tpl_vars['kerdes_szoveg_hu']->value;?>
</textarea>        <br style="clear: both;" />		<label>Kép feltöltése a kérdéshez</label>	<div class="file_browse_wrapper_x">            <input name="kerdes_kep" id="kerdes_kep" type="file" size="30" title="kép feltöltése" value="ok" accept="image/*" onchange="kepfigyel('kerdes_kep_uzenet')" onmouseover="sugo('1', this.id)" />	</div>        <div class="mentes_uzenet" id="kerdes_kep_uzenet">A kép feltöltéséhez mentés szükséges!</div>        <?php echo $_smarty_tpl->tpl_vars['kep_kerdes']->value;?>
        <br style="clear: both;" />	<label>Videó beágyazása a kérdéshez</label>	<input type="text" name="video_kerdes" placeholder="https://www.youtube.com/..." value="<?php echo $_smarty_tpl->tpl_vars['video_kerdes']->value;?>
" class="video_embed" />        <label>Típusa</label>    <div class="info">        <label>radio<span id="radio_s" onmouseover="sugo(2, this.id)">i</span></label>        <input type="radio" name="tipus" value="radio" <?php echo $_smarty_tpl->tpl_vars['check_radio']->value;?>
 />    </div>    <div class="info">        <label>select<span id="select_s" onmouseover="sugo(3, this.id)">i</span></label>        <input type="radio" name="tipus" value="select" <?php echo $_smarty_tpl->tpl_vars['check_select']->value;?>
 />    </div>    <div class="info">        <label>checkbox<span id="checkbox_s" onmouseover="sugo(4, this.id)">i</span></label>        <input type="radio" name="tipus" value="checkbox" <?php echo $_smarty_tpl->tpl_vars['check_checkbox']->value;?>
 />    </div>    <div class="info">        <label>text<span id="text_s" onmouseover="sugo(5, this.id)">i</span></label>        <input type="radio" name="tipus" value="text" <?php echo $_smarty_tpl->tpl_vars['check_text']->value;?>
 />    </div>    <div class="info">        <label>textarea<span id="textarea_s" onmouseover="sugo(6, this.id)">i</span></label>        <input type="radio" name="tipus" value="textarea" <?php echo $_smarty_tpl->tpl_vars['check_textarea']->value;?>
 />    </div>    <div class="info">        <label>ranking<span id="ranking_s" onmouseover="sugo(7, this.id)">i</span></label>        <input type="radio" name="tipus" value="ranking" <?php echo $_smarty_tpl->tpl_vars['check_ranking']->value;?>
 />    </div>    <br style="clear: both;" />    <label id="szoveg_valasz">Válaszok</label>		<div id="admin_valaszok" class="gridster" style="width: 790px; border: 0px solid #aaa;">		 <?php echo $_smarty_tpl->tpl_vars['valaszok2']->value;?>
                 	</div>    </form><br /><br />	  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>	  	  <script src="gridster/dist/jquery.gridster.js" type="text/javascript" charset="utf-8"></script>	  <script type="text/javascript" src="csempe.js"></script><div id="sugo_popup">	<h3 id="np_h3"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Segítség'];?>
</h3>	<div id="np_p"></div></div><?php }} ?>
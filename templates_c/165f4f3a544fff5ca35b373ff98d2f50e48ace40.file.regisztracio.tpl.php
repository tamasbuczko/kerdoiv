<?php /* Smarty version Smarty-3.1.14, created on 2014-05-29 22:23:09
         compiled from "templates\regisztracio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170785384f0c4322843-25186817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '165f4f3a544fff5ca35b373ff98d2f50e48ace40' => 
    array (
      0 => 'templates\\regisztracio.tpl',
      1 => 1401394907,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170785384f0c4322843-25186817',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5384f0c44e0679_95551282',
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5384f0c44e0679_95551282')) {function content_5384f0c44e0679_95551282($_smarty_tpl) {?><!--<img src="graphics/QA_logo.png" alt="questionaction" id="csomagajanlatok" />-->
<form action="" name="register" method="post" class="login">
    <h2><?php echo $_smarty_tpl->tpl_vars['lang']->value['regisztráció'];?>
</h2>
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['azonosító'];?>
:</label><input type="text" name="reg_azonosito" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['e-mail'];?>
:</label><input type="text" name="email" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['jelszó'];?>
:</label><input type="password" name="jelszo" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['jelszó mégegyszer'];?>
:</label><input type="password" name="jelszo2" value="" />
    
    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['választható csomagok'];?>
:</label>
    <div>
        <input type="radio" name="csomag" value="3" checked="checked" /><label><?php echo $_smarty_tpl->tpl_vars['lang']->value['ingyenes'];?>
</label>
    </div>
    <div>
        <input type="radio" name="csomag" value="4" /><label><?php echo $_smarty_tpl->tpl_vars['lang']->value['ezüst csomag'];?>
</label>
    </div>
    <div>
        <input type="radio" name="csomag" value="5" /><label><?php echo $_smarty_tpl->tpl_vars['lang']->value['arany csomag'];?>
</label>
    </div>
    <input name="send" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['regisztráció'];?>
" />
</form>

<table class="csomagok">
    <tr><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['csomagok'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['ingyenes'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['ezüst'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['lang']->value['arany'];?>
</th></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Havidíj'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['ingyenes'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['2.000 Ft'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['6.000 Ft'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Kedvezményes éves díj'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['ingyenes'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['20.000 Ft'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['60.000 Ft'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Nyílt körű és nyilvános kérdőívek'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Személyes kérdőívek'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Kérdőívek maximális száma'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['korlátlan'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['korlátlan'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['korlátlan'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Futó kérdőívek maximális száma'];?>
</td><td><?php echo 1;?>
</td><td><?php echo 50;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['korlátlan'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Kérdések maximális száma'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['korlátlan'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['korlátlan'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['korlátlan'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Kitöltők száma'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['korlátlan'];?>
</td><td><?php echo 1000;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['korlátlan'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Reklámok kikapcsolása'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Kérdés típusok száma'];?>
</td><td><?php echo 10;?>
</td><td>10+</td><td>10+</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Kérdésekhez kép feltöltés'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Kérdésekhez videó beágyazás'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Válaszokhoz kép feltöltés'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Válaszokhoz videó beágyazás'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Lapozható kérdőív'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Kötelező kérdések kiválasztása'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Beépített kiértékelés'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Professzionális beépített szűrő'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['PDF formátumú kiértékelés letöltés'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Adatok exportálása excel fájlba'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Használható stílusok száma'];?>
</td><td>7</td><td>21</td><td>21+</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Stílus elrendezések száma'];?>
</td><td>1</td><td>3</td><td>3+</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Fejléc kép feltöltése'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Logo elrejtése'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Kérdőív beágyazása weboldalba'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['nincs'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Többnyelvű kérdőív készítése'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['van'];?>
</td></tr>
</table><?php }} ?>
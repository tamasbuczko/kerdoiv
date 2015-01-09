<?php /* Smarty version Smarty-3.1.14, created on 2015-01-09 16:32:07
         compiled from "templates\csomag_leiras.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1548954afdf5358d757-03656990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01ee5e480f551b6c354c1531651e0c3025a1d9ba' => 
    array (
      0 => 'templates\\csomag_leiras.tpl',
      1 => 1420817524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1548954afdf5358d757-03656990',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54afdf536be290_05249597',
  'variables' => 
  array (
    'szotar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54afdf536be290_05249597')) {function content_54afdf536be290_05249597($_smarty_tpl) {?><!--<img src="graphics/QA_logo.png" alt="questionaction" id="csomagajanlatok" />-->

<div class="csomag_dobozok">
    
<?php if ($_REQUEST['package']==1){?>    
    <div id="free" >        
        <h1><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Ingyenes csomag');?>
</h1>
        <h3><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('0 Ft / Hónap ');?>
</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Diákoknak, magánszemélyeknek és vállalkozást tervezőknek.');?>
</p>
        <p><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Ingyenes, kötöttségek nélkül kipróbálható.');?>
 </p>
    </div>
<?php }?>
<?php if ($_REQUEST['package']==2){?> 
    <div id="silver" >
        <h1><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Ezüst csomag');?>
</h1>
        <h3><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' 2.000 Ft / Hónap');?>
</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Magánszemélyek, oktatók és vállalkozók számára ajánljuk.');?>
</p>
        <p><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('  Kérdőívek készítésére, kiértékelésére szakdolgozatokhoz, közvélemény és piackutatáshoz.');?>
</p>
    </div>
<?php }?>
<?php if ($_REQUEST['package']==3){?> 
    <div id="gold" >
        <h1><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Arany csomag');?>
</h1>
        <h3><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('6.000 Ft / Hónap ');?>
</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Vállalkozások, cégek számára ajánljuk. ');?>
</p>
        <p> <?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Ideális összeállítás a cégek számára, akik egy helyen szeretnék tudni vevői, beszállítói felméréseit és értékelésüket.');?>
</p>
    </div>    
<?php }?>
<?php if ($_REQUEST['package']==4){?> 
    <div id="platinum" >
        <h1><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Platina csomag');?>
</h1>
        <h3><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' 36.000 Ft / Hónap');?>
</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Cégek és nagyvállalatok számára ajánljuk, akik csak a megbízást szeretnék kiadni.');?>
</p>
        <p> <?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(' Egyedi igények kielégítése, folyamatos támogatás és kapcsolattartás. Megbízásra minden részletet mi biztosítunk, dolgozunk ki.');?>
</p>
    </div>
<?php }?>    


<form action="" name="register" method="post" class="login" style="background-color: rgba(234, 234, 232, 0.7); margin-right: 20px;">
    <h2><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('regisztráció');?>
</h2>
    <label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('azonosító');?>
:</label><input type="text" name="reg_azonosito" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('e-mail');?>
:</label><input type="text" name="email" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('jelszó');?>
:</label><input type="password" name="jelszo" value="" />
    <label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('jelszó mégegyszer');?>
:</label><input type="password" name="jelszo2" value="" />
    
    <label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('választható csomagok');?>
:</label>
    <div>
        <input type="radio" name="csomag" value="1" checked="checked" /><label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('ingyenes');?>
</label>
    </div>
    <div>
        <input type="radio" name="csomag" value="2" /><label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('ezüst csomag');?>
</label>
    </div>
    <div>
        <input type="radio" name="csomag" value="3" /><label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('arany csomag');?>
</label>
    </div>
     <div>
        <input type="radio" name="csomag" value="4" /><label><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('platina csomag');?>
</label>
    </div>
    <input name="send" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('regisztráció');?>
" style="margin-top: 5px; width: 300px;"/> 
</form>
</div>

<div>
    <p>Ide írjuk le a részletes bemutatását az adott csomagnak. Ide érkeznek majd a kiküldött e-mail-ből a látogatók!</p>    
</div>    
    
<?php if ($_REQUEST['package']==1){?>
    <div class="kiemelt" style="width: 163px; left: 213px; background-color: #8CFA80; border-bottom: 2px solid #009222;"></div>
<?php }?>      
<?php if ($_REQUEST['package']==2){?>
    <div class="kiemelt" style="width: 161px; left: 378px; background-color: rgba(208, 229, 245, 1); border-bottom: 2px solid #A1C3DB;"></div>
<?php }?>     
<?php if ($_REQUEST['package']==3){?>
    <div class="kiemelt"></div>
<?php }?>  
<?php if ($_REQUEST['package']==4){?>
    <div class="kiemelt" style="width: 147px; left: 689px; background-color: #999; border-bottom: 2px solid #777777;"></div>
<?php }?>    

<table class="csomagok">
    <tr><th><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('csomagok');?>
</th><th><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('ingyenes');?>
</th><th><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('ezüst');?>
</th><th><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('arany');?>
</th><th><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('platina');?>
</th></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Havidíj');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('ingyenes');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('2.000 Ft');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('6.000 Ft');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('36.000 Ft');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Kedvezményes éves díj');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('ingyenes');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('20.000 Ft');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('60.000 Ft');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('360.000 Ft');?>
</td></tr>
    
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Kinek ajánljuk?');?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Diákoknak, magánszemélyeknek és vállalkozást tervezőknek.');?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Magánszemélyek, oktatók és vállalkozók számára ajánljuk.');?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Vállalkozások, cégek számára ajánljuk.');?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Cégek és nagyvállalatok számára ajánljuk, akik csak a megbízást szeretnék kiadni.');?>
</td>
    </tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Mire jó?');?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('ingyenes');?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Kérdőívek készítésére, kiértékelésére szakdolgozatokhoz, közvélemény és piackutatáshoz.');?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Ideális összeállítás a cégek számára, akik egy helyen szeretnék tudni vevői, beszállítói felméréseit és értékelésüket.');?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Egyedi igények kielégítése, folyamatos támogatás és kapcsolattartás. Megbízásra minden részletet mi biztosítunk, dolgozunk ki.');?>
</td>
    </tr>    
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Nyílt körű és publikus kérdőívek');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Személyes kérdőívek');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('nincs');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Kérdőívek maximális száma');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('korlátlan');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('korlátlan');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('korlátlan');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('korlátlan');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Futó kérdőívek maximális száma');?>
</td><td><?php echo 1;?>
</td><td><?php echo 50;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('korlátlan');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('korlátlan');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Kérdések maximális száma');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('korlátlan');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('korlátlan');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('korlátlan');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('korlátlan');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Kitöltők száma');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit(500);?>
</td><td><?php echo 1000;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('korlátlan');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('korlátlan');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Reklámok kikapcsolása');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('nincs');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Kérdés típusok száma');?>
</td><td><?php echo 10;?>
</td><td>10+</td><td>10+</td><td>10+</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Kérdésekhez kép feltöltés');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('nincs');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Kérdésekhez videó beágyazás');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Válaszokhoz kép feltöltés');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('nincs');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Válaszokhoz videó beágyazás');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
    <!--<tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Lapozható kérdőív');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>-->
    <!--<tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Kötelező kérdések kiválasztása');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('nincs');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>-->
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Beépített kiértékelés');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Professzionális beépített szűrő');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('nincs');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
    <!--<tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('PDF formátumú kiértékelés letöltés');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>-->
    <!--<tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Adatok exportálása excel fájlba');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('nincs');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>-->
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Használható stílusok száma');?>
</td><td>7</td><td>21</td><td>21+</td><td>21+</td></tr>
    <!--<tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Stílus elrendezések száma');?>
</td><td>1</td><td>3</td><td>3+</td><td>3+</td></tr>-->
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Fejléc kép feltöltése');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Logo elrejtése');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('nincs');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('nincs');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Kérdőív beágyazása weboldalba');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('nincs');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('nincs');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('Többnyelvű kérdőív készítése');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td><td><?php echo $_smarty_tpl->tpl_vars['szotar']->value->fordit('van');?>
</td></tr>
</table><?php }} ?>
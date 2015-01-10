

<!--<img src="graphics/QA_logo.png" alt="questionaction" id="csomagajanlatok" />-->

<div class="csomag_dobozok">
    <div id="ajax_doboz">
        
{include file='templates/ajax_csomagdobozok.tpl'}
        
    </div>

<form action="" name="register" method="post" class="login" style="background-color: rgba(234, 234, 232, 0.7); margin-right: 20px;">
   <h2>{$szotar->fordit('Csomag váltás')}</h2>
   <br style="clear: both;" />
   <label>{$szotar->fordit('Csomag lejárati határideje')}:</label><input type="text" name="lejarat" readonly="readonly" value="{$szotar->fordit('korlátlan')}" />
   <br style="clear: both;" />
   <br style="clear: both;" />    
   <label>{$szotar->fordit('Jelenlegi csomag')}:</label><br style="clear: both;" />          
    <div>
        <input type="radio" name="csomag_mod" value="1" {if $user->jog == '1'}checked="checked"{/if} onclick="ajax_csomagvalto(1)"><label>{$szotar->fordit('ingyenes')}</label>
    </div>
    <div>
        <input type="radio" name="csomag_mod" value="2" {if $user->jog == '2'}checked="checked"{/if} onclick="ajax_csomagvalto(2)"><label>{$szotar->fordit('ezüst csomag')}</label>
    </div>
    <div>
        <input type="radio" name="csomag_mod" value="3" {if $user->jog == '3'}checked="checked"{/if} onclick="ajax_csomagvalto(3)"><label>{$szotar->fordit('arany csomag')}</label>
    </div>
    <div>
        <input type="radio" name="csomag_mod" value="4" {if $user->jog == '4'}checked="checked"{/if} onclick="ajax_csomagvalto(4)"><label>{$szotar->fordit('platina csomag')}</label>
    </div>
    <input type="submit" name="submit_reg" value="{$szotar->fordit('Elküldés')}"/>
</form>
</div>

<div id="ajax_doboz2">
{include 'templates/ajax_csomagdobozok2.tpl'}
</div>

<table class="csomagok">
    <tr><th>{$szotar->fordit('csomagok')}</th><th>{$szotar->fordit('ingyenes')}</th><th>{$szotar->fordit('ezüst')}</th><th>{$szotar->fordit('arany')}</th><th>{$szotar->fordit('platina')}</th></tr>
    <tr><td>{$szotar->fordit('Havidíj')}</td><td>{$szotar->fordit('ingyenes')}</td><td>{$szotar->fordit('2.000 Ft')}</td><td>{$szotar->fordit('6.000 Ft')}</td><td>{$szotar->fordit('36.000 Ft')}</td></tr>
    <tr><td>{$szotar->fordit('Kedvezményes éves díj')}</td><td>{$szotar->fordit('ingyenes')}</td><td>{$szotar->fordit('20.000 Ft')}</td><td>{$szotar->fordit('60.000 Ft')}</td><td>{$szotar->fordit('360.000 Ft')}</td></tr>
    
    <tr><td>{$szotar->fordit('Kinek ajánljuk?')}</td>
        <td>{$szotar->fordit('Diákoknak, magánszemélyeknek és vállalkozást tervezőknek.')}</td>
        <td>{$szotar->fordit('Magánszemélyek, oktatók és vállalkozók számára ajánljuk.')}</td>
        <td>{$szotar->fordit('Vállalkozások, cégek számára ajánljuk.')}</td>
        <td>{$szotar->fordit('Cégek és nagyvállalatok számára ajánljuk, akik csak a megbízást szeretnék kiadni.')}</td>
    </tr>
    <tr><td>{$szotar->fordit('Mire jó?')}</td>
        <td>{$szotar->fordit('ingyenes')}</td>
        <td>{$szotar->fordit('Kérdőívek készítésére, kiértékelésére szakdolgozatokhoz, közvélemény és piackutatáshoz.')}</td>
        <td>{$szotar->fordit('Ideális összeállítás a cégek számára, akik egy helyen szeretnék tudni vevői, beszállítói felméréseit és értékelésüket.')}</td>
        <td>{$szotar->fordit('Egyedi igények kielégítése, folyamatos támogatás és kapcsolattartás. Megbízásra minden részletet mi biztosítunk, dolgozunk ki.')}</td>
    </tr>    
    <tr><td>{$szotar->fordit('Nyílt körű és publikus kérdőívek')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Személyes kérdőívek')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Kérdőívek maximális száma')}</td><td>{$szotar->fordit('korlátlan')}</td><td>{$szotar->fordit('korlátlan')}</td><td>{$szotar->fordit('korlátlan')}</td><td>{$szotar->fordit('korlátlan')}</td></tr>
    <tr><td>{$szotar->fordit('Futó kérdőívek maximális száma')}</td><td>{1}</td><td>{50}</td><td>{$szotar->fordit('korlátlan')}</td><td>{$szotar->fordit('korlátlan')}</td></tr>
    <tr><td>{$szotar->fordit('Kérdések maximális száma')}</td><td>{$szotar->fordit('korlátlan')}</td><td>{$szotar->fordit('korlátlan')}</td><td>{$szotar->fordit('korlátlan')}</td><td>{$szotar->fordit('korlátlan')}</td></tr>
    <tr><td>{$szotar->fordit('Kitöltők száma')}</td><td>{$szotar->fordit(500)}</td><td>{1000}</td><td>{$szotar->fordit('korlátlan')}</td><td>{$szotar->fordit('korlátlan')}</td></tr>
    <tr><td>{$szotar->fordit('Reklámok kikapcsolása')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Kérdés típusok száma')}</td><td>{10}</td><td>10+</td><td>10+</td><td>10+</td></tr>
    <tr><td>{$szotar->fordit('Kérdésekhez kép feltöltés')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Kérdésekhez videó beágyazás')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Válaszokhoz kép feltöltés')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Válaszokhoz videó beágyazás')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <!--<tr><td>{$szotar->fordit('Lapozható kérdőív')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>-->
    <!--<tr><td>{$szotar->fordit('Kötelező kérdések kiválasztása')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>-->
    <tr><td>{$szotar->fordit('Beépített kiértékelés')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Professzionális beépített szűrő')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <!--<tr><td>{$szotar->fordit('PDF formátumú kiértékelés letöltés')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>-->
    <!--<tr><td>{$szotar->fordit('Adatok exportálása excel fájlba')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>-->
    <tr><td>{$szotar->fordit('Használható stílusok száma')}</td><td>7</td><td>21</td><td>21+</td><td>21+</td></tr>
    <!--<tr><td>{$szotar->fordit('Stílus elrendezések száma')}</td><td>1</td><td>3</td><td>3+</td><td>3+</td></tr>-->
    <tr><td>{$szotar->fordit('Fejléc kép feltöltése')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Logo elrejtése')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Kérdőív beágyazása weboldalba')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Többnyelvű kérdőív készítése')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
</table>
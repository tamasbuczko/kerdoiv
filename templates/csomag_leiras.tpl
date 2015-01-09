<!--<img src="graphics/QA_logo.png" alt="questionaction" id="csomagajanlatok" />-->

<div class="csomag_dobozok">
    
{if $smarty.request.package == 1}    
    <div id="free" >        
        <h1>{$szotar->fordit('Ingyenes csomag')}</h1>
        <h3>{$szotar->fordit('0 Ft / Hónap ')}</h3>
        <p>{$szotar->fordit(' Diákoknak, magánszemélyeknek és vállalkozást tervezőknek.')}</p>
        <p>{$szotar->fordit(' Ingyenes, kötöttségek nélkül kipróbálható.')} </p>
    </div>
{/if}
{if $smarty.request.package == 2} 
    <div id="silver" >
        <h1>{$szotar->fordit(' Ezüst csomag')}</h1>
        <h3>{$szotar->fordit(' 2.000 Ft / Hónap')}</h3>
        <p>{$szotar->fordit(' Magánszemélyek, oktatók és vállalkozók számára ajánljuk.')}</p>
        <p>{$szotar->fordit('  Kérdőívek készítésére, kiértékelésére szakdolgozatokhoz, közvélemény és piackutatáshoz.')}</p>
    </div>
{/if}
{if $smarty.request.package == 3} 
    <div id="gold" >
        <h1>{$szotar->fordit(' Arany csomag')}</h1>
        <h3>{$szotar->fordit('6.000 Ft / Hónap ')}</h3>
        <p>{$szotar->fordit('Vállalkozások, cégek számára ajánljuk. ')}</p>
        <p> {$szotar->fordit(' Ideális összeállítás a cégek számára, akik egy helyen szeretnék tudni vevői, beszállítói felméréseit és értékelésüket.')}</p>
    </div>    
{/if}
{if $smarty.request.package == 4} 
    <div id="platinum" >
        <h1>{$szotar->fordit(' Platina csomag')}</h1>
        <h3>{$szotar->fordit(' 36.000 Ft / Hónap')}</h3>
        <p>{$szotar->fordit(' Cégek és nagyvállalatok számára ajánljuk, akik csak a megbízást szeretnék kiadni.')}</p>
        <p> {$szotar->fordit(' Egyedi igények kielégítése, folyamatos támogatás és kapcsolattartás. Megbízásra minden részletet mi biztosítunk, dolgozunk ki.')}</p>
    </div>
{/if}    


<form action="" name="register" method="post" class="login" style="background-color: rgba(234, 234, 232, 0.7); margin-right: 20px;">
    <h2>{$szotar->fordit('regisztráció')}</h2>
    <label>{$szotar->fordit('azonosító')}:</label><input type="text" name="reg_azonosito" value="" />
    <label>{$szotar->fordit('e-mail')}:</label><input type="text" name="email" value="" />
    <label>{$szotar->fordit('jelszó')}:</label><input type="password" name="jelszo" value="" />
    <label>{$szotar->fordit('jelszó mégegyszer')}:</label><input type="password" name="jelszo2" value="" />
    
    <label>{$szotar->fordit('választható csomagok')}:</label>
    <div>
        <input type="radio" name="csomag" value="1" checked="checked" /><label>{$szotar->fordit('ingyenes')}</label>
    </div>
    <div>
        <input type="radio" name="csomag" value="2" /><label>{$szotar->fordit('ezüst csomag')}</label>
    </div>
    <div>
        <input type="radio" name="csomag" value="3" /><label>{$szotar->fordit('arany csomag')}</label>
    </div>
     <div>
        <input type="radio" name="csomag" value="4" /><label>{$szotar->fordit('platina csomag')}</label>
    </div>
    <input name="send" type="submit" value="{$szotar->fordit('regisztráció')}" style="margin-top: 5px; width: 300px;"/> 
</form>
</div>

<div>
    <p>Ide írjuk le a részletes bemutatását az adott csomagnak. Ide érkeznek majd a kiküldött e-mail-ből a látogatók!</p>    
</div>    
    
{if $smarty.request.package == 1}
    <div class="kiemelt" style="width: 163px; left: 213px; background-color: #8CFA80; border-bottom: 2px solid #009222;"></div>
{/if}      
{if $smarty.request.package == 2}
    <div class="kiemelt" style="width: 161px; left: 378px; background-color: rgba(208, 229, 245, 1); border-bottom: 2px solid #A1C3DB;"></div>
{/if}     
{if $smarty.request.package == 3}
    <div class="kiemelt"></div>
{/if}  
{if $smarty.request.package == 4}
    <div class="kiemelt" style="width: 147px; left: 689px; background-color: #999; border-bottom: 2px solid #777777;"></div>
{/if}    

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
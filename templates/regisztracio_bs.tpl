<!--<img src="graphics/QA_logo.png" alt="questionaction" id="csomagajanlatok" />-->

<div class="csomag_dobozok">
    
    <a href="?p=41&package=1" id="free" class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
        <img src="graphics/click.png" alt="" />
        <h2>{$szotar->fordit('Ingyenes csomag')}</h2>
        <h3>{$szotar->fordit('0 Ft / Hónap ')}</h3>
        <p>{$szotar->fordit(' Diákoknak, magánszemélyeknek és vállalkozást tervezőknek.')}</p>
        <p>{$szotar->fordit(' Ingyenes, kötöttségek nélkül kipróbálható.')} </p>
    </a>
    <a href="?p=41&package=2" id="silver" class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
        <img src="graphics/click.png" alt="" />
        <h2>{$szotar->fordit(' Ezüst csomag')}</h2>
        <h3>{$szotar->fordit(' 2.000 Ft / Hónap')}</h3>
        <p>{$szotar->fordit(' Magánszemélyek, oktatók és vállalkozók számára ajánljuk.')}</p>
        <p>{$szotar->fordit('  Kérdőívek készítésére, kiértékelésére szakdolgozatokhoz, közvélemény és piackutatáshoz.')}</p>
    </a>
    <a href="?p=41&package=3" id="gold" class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
        <img src="graphics/click.png" alt="" />
        <h2>{$szotar->fordit(' Arany csomag')}</h2>
        <h3>{$szotar->fordit('6.000 Ft / Hónap ')}</h3>
        <p>{$szotar->fordit('Vállalkozások, cégek számára ajánljuk. ')}</p>
        <p> {$szotar->fordit(' Ideális összeállítás a cégek számára, akik egy helyen szeretnék tudni vevői, beszállítói felméréseit és értékelésüket.')}</p>
    </a>
    <a href="?p=41&package=4" id="platinum" class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
        <img src="graphics/click.png" alt="" />
        <h2>{$szotar->fordit(' Platina csomag')}</h2>
        <h3>{$szotar->fordit(' 36.000 Ft / Hónap')}</h3>
        <p>{$szotar->fordit(' Cégek és nagyvállalatok számára ajánljuk, akik csak a megbízást szeretnék kiadni.')}</p>
        <p> {$szotar->fordit(' Egyedi igények kielégítése, folyamatos támogatás és kapcsolattartás. Megbízásra minden részletet mi biztosítunk, dolgozunk ki.')}</p>
    </a>
    
</div>
	<br style="clear: both;" />
    
    

<!--<div class="kiemelt">{$szotar->fordit('Legnépszerűbb')}</div>-->
<!--
<form action="" name="register" method="post" class="login">
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
    <input name="send" type="submit" value="{$szotar->fordit('regisztráció')}" /> 
</form>
-->
<table class="csomagok table">
    <tr>
	   <th>{$szotar->fordit('csomagok')}</th>
	   <th>{$szotar->fordit('ingyenes')}</th>
	   <th>{$szotar->fordit('ezüst')}</th>
	   <th>{$szotar->fordit('arany')}<br />({$szotar->fordit('Legnépszerűbb')})</th>
	   <th>{$szotar->fordit('platina')}</th>
	</tr>
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
    <!--<tr style="cursor:pointer;"><td>{$szotar->fordit('regisztráció / Előfizetés')}</td><td><span  id="gomb_ingyen_reg">{$szotar->fordit('Regisztrálok')}<span></td><td><span id="gomb_ezust_reg">{$szotar->fordit('Előfizetek')}</span></td><td><span id="gomb_arany_reg">{$szotar->fordit('Előfizetek')}</span></td><td><span id="gomb_platina_reg">{$szotar->fordit('Előfizetek')}</span></td></tr>
    -->
    <tr>
        <td colspan="5" style="padding: 0px; border: 0px;">
        <form action="" name="register" method="post" class="login" id="reg_doboz_sor" style="display: none;">
    <h2>{$szotar->fordit('regisztráció')}</h2>
    <label>{$szotar->fordit('azonosító')}:</label><input type="text" name="reg_azonosito" value="" />
    <label>{$szotar->fordit('e-mail')}:</label><input type="text" name="email" value="" />
    <label>{$szotar->fordit('jelszó')}:</label><input type="password" name="jelszo" value="" />
    <label>{$szotar->fordit('jelszó mégegyszer')}:</label><input type="password" name="jelszo2" value="" />
    
    <label>{$szotar->fordit('választható csomagok')}:</label>
    <div>
        <input type="radio" name="csomag" id="csomag_1" value="1" checked="checked" /><label>{$szotar->fordit('ingyenes')}</label>
    </div>
    <div>
        <input type="radio" name="csomag" id="csomag_2" value="2" /><label>{$szotar->fordit('ezüst csomag')}</label>
    </div>
    <div>
        <input type="radio" name="csomag" id="csomag_3" value="3" /><label>{$szotar->fordit('arany csomag')}</label>
    </div>
    <input name="send" type="submit" value="{$szotar->fordit('regisztráció')}" /> 
</form>
        </td>
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
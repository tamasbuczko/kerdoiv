<!--<img src="graphics/QA_logo.png" alt="questionaction" id="csomagajanlatok" />-->
<label style="margin-left: 5px;">{$szotar->fordit('A tesztidőszak alatt regisztrálók számára, minden csomag ingyenes, decemberig.')}</label>

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

<table class="csomagok">
    <tr><th>{$szotar->fordit('csomagok')}</th><th>{$szotar->fordit('ingyenes')}</th><th>{$szotar->fordit('ezüst')}</th><th>{$szotar->fordit('arany')}</th></tr>
    <tr><td>{$szotar->fordit('Havidíj')}</td><td>{$szotar->fordit('ingyenes')}</td><td>{$szotar->fordit('2.000 Ft')}</td><td>{$szotar->fordit('6.000 Ft')}</td></tr>
    <tr><td>{$szotar->fordit('Kedvezményes éves díj')}</td><td>{$szotar->fordit('ingyenes')}</td><td>{$szotar->fordit('20.000 Ft')}</td><td>{$szotar->fordit('60.000 Ft')}</td></tr>
    <tr><td>{$szotar->fordit('Nyílt körű és publikus kérdőívek')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Személyes kérdőívek')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Kérdőívek maximális száma')}</td><td>{$szotar->fordit('korlátlan')}</td><td>{$szotar->fordit('korlátlan')}</td><td>{$szotar->fordit('korlátlan')}</td></tr>
    <tr><td>{$szotar->fordit('Futó kérdőívek maximális száma')}</td><td>{1}</td><td>{50}</td><td>{$szotar->fordit('korlátlan')}</td></tr>
    <tr><td>{$szotar->fordit('Kérdések maximális száma')}</td><td>{$szotar->fordit('korlátlan')}</td><td>{$szotar->fordit('korlátlan')}</td><td>{$szotar->fordit('korlátlan')}</td></tr>
    <tr><td>{$szotar->fordit('Kitöltők száma')}</td><td>{$szotar->fordit('korlátlan')}</td><td>{1000}</td><td>{$szotar->fordit('korlátlan')}</td></tr>
    <tr><td>{$szotar->fordit('Reklámok kikapcsolása')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Kérdés típusok száma')}</td><td>{10}</td><td>10+</td><td>10+</td></tr>
    <tr><td>{$szotar->fordit('Kérdésekhez kép feltöltés')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Kérdésekhez videó beágyazás')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Válaszokhoz kép feltöltés')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Válaszokhoz videó beágyazás')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Lapozható kérdőív')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Kötelező kérdések kiválasztása')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Beépített kiértékelés')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Professzionális beépített szűrő')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('PDF formátumú kiértékelés letöltés')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Adatok exportálása excel fájlba')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Használható stílusok száma')}</td><td>7</td><td>21</td><td>21+</td></tr>
    <tr><td>{$szotar->fordit('Stílus elrendezések száma')}</td><td>1</td><td>3</td><td>3+</td></tr>
    <tr><td>{$szotar->fordit('Fejléc kép feltöltése')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Logo elrejtése')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Kérdőív beágyazása weboldalba')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('nincs')}</td><td>{$szotar->fordit('van')}</td></tr>
    <tr><td>{$szotar->fordit('Többnyelvű kérdőív készítése')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td><td>{$szotar->fordit('van')}</td></tr>
</table>
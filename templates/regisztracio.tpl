<!--<img src="graphics/QA_logo.png" alt="questionaction" id="csomagajanlatok" />-->
<form action="" name="register" method="post" class="login">
    <h2>{$lang['regisztráció']}</h2>
    <label>{$lang['azonosító']}:</label><input type="text" name="reg_azonosito" value="" />
    <label>{$lang['e-mail']}:</label><input type="text" name="email" value="" />
    <label>{$lang['jelszó']}:</label><input type="password" name="jelszo" value="" />
    <label>{$lang['jelszó mégegyszer']}:</label><input type="password" name="jelszo2" value="" />
    
    <label>{$lang['választható csomagok']}:</label>
    <div>
        <input type="radio" name="csomag" value="3" checked="checked" /><label>{$lang['ingyenes']}</label>
    </div>
    <div>
        <input type="radio" name="csomag" value="4" /><label>{$lang['ezüst csomag']}</label>
    </div>
    <div>
        <input type="radio" name="csomag" value="5" /><label>{$lang['arany csomag']}</label>
    </div>
    <input name="send" type="submit" value="{$lang['regisztráció']}" /> 
</form>

<table class="csomagok">
    <tr><th>{$lang['csomagok']}</th><th>{$lang['ingyenes']}</th><th>{$lang['ezüst']}</th><th>{$lang['arany']}</th></tr>
    <tr><td>{$lang['Havidíj']}</td><td>{$lang['ingyenes']}</td><td>{$lang['2.000 Ft']}</td><td>{$lang['6.000 Ft']}</td></tr>
    <tr><td>{$lang['Kedvezményes éves díj']}</td><td>{$lang['ingyenes']}</td><td>{$lang['20.000 Ft']}</td><td>{$lang['60.000 Ft']}</td></tr>
    <tr><td>{$lang['Nyílt körű és nyilvános kérdőívek']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Személyes kérdőívek']}</td><td>{$lang['nincs']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Kérdőívek maximális száma']}</td><td>{$lang['korlátlan']}</td><td>{$lang['korlátlan']}</td><td>{$lang['korlátlan']}</td></tr>
    <tr><td>{$lang['Futó kérdőívek maximális száma']}</td><td>{1}</td><td>{50}</td><td>{$lang['korlátlan']}</td></tr>
    <tr><td>{$lang['Kérdések maximális száma']}</td><td>{$lang['korlátlan']}</td><td>{$lang['korlátlan']}</td><td>{$lang['korlátlan']}</td></tr>
    <tr><td>{$lang['Kitöltők száma']}</td><td>{$lang['korlátlan']}</td><td>{1000}</td><td>{$lang['korlátlan']}</td></tr>
    <tr><td>{$lang['Reklámok kikapcsolása']}</td><td>{$lang['nincs']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Kérdés típusok száma']}</td><td>{10}</td><td>10+</td><td>10+</td></tr>
    <tr><td>{$lang['Kérdésekhez kép feltöltés']}</td><td>{$lang['nincs']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Kérdésekhez videó beágyazás']}</td><td>{$lang['nincs']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Válaszokhoz kép feltöltés']}</td><td>{$lang['nincs']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Válaszokhoz videó beágyazás']}</td><td>{$lang['nincs']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Lapozható kérdőív']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Kötelező kérdések kiválasztása']}</td><td>{$lang['nincs']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Beépített kiértékelés']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Professzionális beépített szűrő']}</td><td>{$lang['nincs']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['PDF formátumú kiértékelés letöltés']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Adatok exportálása excel fájlba']}</td><td>{$lang['nincs']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Használható stílusok száma']}</td><td>7</td><td>21</td><td>21+</td></tr>
    <tr><td>{$lang['Stílus elrendezések száma']}</td><td>1</td><td>3</td><td>3+</td></tr>
    <tr><td>{$lang['Fejléc kép feltöltése']}</td><td>{$lang['nincs']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Logo elrejtése']}</td><td>{$lang['nincs']}</td><td>{$lang['nincs']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Kérdőív beágyazása weboldalba']}</td><td>{$lang['nincs']}</td><td>{$lang['nincs']}</td><td>{$lang['van']}</td></tr>
    <tr><td>{$lang['Többnyelvű kérdőív készítése']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td><td>{$lang['van']}</td></tr>
</table>
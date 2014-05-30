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
</table>
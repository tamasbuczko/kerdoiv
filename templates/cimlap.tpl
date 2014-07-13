<div id="nyilvanos_kerdoivek">
   <div>
    <h2>{$lang['uj_nyilvanos_kerdoivek']}</h2>
    {$nyilvanos_kerdoivek}

   </div>
	<a href="?p=nyilvanos" class="nyilvanos_link">{$lang['További nyilvános kérdőívek']}...</a>
</div>

<form action="index.php" name="login" method="post" class="login">
  <h2>{$lang['bejelentkezés']}</h2>
  <label>{$lang['azonosító']}:</label><input type="text" name="azonosito" value="" />
  <label>{$lang['jelszó']}:</label><input type="password" name="jelszo" value="" />
  <input name="send" type="submit" value="{$lang['bejelentkezés']}" />
  <a href="?p=regisztracio">{$lang['regisztráció']}</a>
  <a href="?p=elfelejtett">{$lang['Elfelejtett jelszó']}...</a>
</form>
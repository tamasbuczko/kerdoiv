<div id="nyilvanos_kerdoivek">
   <div>
    <h2>{$lang['uj_nyilvanos_kerdoivek']}</h2>
    {$nyilvanos_kerdoivek}

   </div>
	<a href="?p=nyilvanos" class="nyilvanos_link">További nyilvános kérdőívek...</a>
</div>

<form action="" name="login" method="post" class="login">
  <h2>{$lang['bejelentkezes']}</h2>
  <label>{$lang['azonosito']}:</label><input type="text" name="azonosito" value="" />
  <label>{$lang['jelszo']}:</label><input type="password" name="jelszo" value="" />
  <input name="send" type="submit" value="{$lang['bejelentkezes']}" />
  <a href="?p=regisztracio">{$lang['regisztracio']}</a>
</form>
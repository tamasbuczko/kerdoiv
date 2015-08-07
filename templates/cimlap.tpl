<div id="nyilvanos_kerdoivek">
   <div>                  
    <h2>{$szotar->fordit('Legfrissebb publikus kérdőívek')}</h2>
    <p>Ha kitöltöd a publikus kérdőíveket belépve, akkor megnézheted az eredményeket!</p>
    {$nyilvanos_kerdoivek}
   </div>
	<a href="?p=nyilvanos" class="nyilvanos_link">{$szotar->fordit('További publikus kérdőívek')}...</a>
	<a href="?p=ajandek" class="banner_ajandek">{$szotar->fordit('Kérdőívek ajándéksorsolással')}<img src="graphics/ajandek_ikon_k.png" alt="" /></a>
</div>


<form action="index.php" name="login" method="post" class="login">
  <h2>{$szotar->fordit('bejelentkezés')}</h2>
  <label>{$szotar->fordit('azonosító')}:</label><input type="text" name="azonosito" value="" />
  <label>{$szotar->fordit('jelszó')}:</label><input type="password" name="jelszo" value="" />
  <input name="send" type="submit" value="{$szotar->fordit('bejelentkezés')}" />
  <a href="?p=regisztracio">{$szotar->fordit('regisztráció')}</a>
  <a href="?p=elfelejtett">{$szotar->fordit('Elfelejtett jelszó')}...</a>
</form>
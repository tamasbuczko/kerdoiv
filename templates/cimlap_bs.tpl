<div id="nyilvanos_kerdoivek" class="col-xs-9 col-sm-9 col-md-5 col-lg-5">
   <div>                  
    <h2>{$szotar->fordit('Legfrissebb publikus kérdőívek')}</h2>
    <p class="hidden-xs hidden-sm">Ha kitöltöd a publikus kérdőíveket belépve, akkor megnézheted az eredményeket!</p>
    {$nyilvanos_kerdoivek}
   </div>
	<a href="?p=nyilvanos" class="nyilvanos_link">{$szotar->fordit('További publikus kérdőívek')}...</a>
	<a href="?p=ajandek" class="banner_ajandek col-xs-12 col-sm-12 col-md-6 col-lg-6">{$szotar->fordit('Kérdőívek ajándéksorsolással')}<img src="graphics/ajandek_ikon_k.png" alt="" /></a>
</div>


<form action="index.php" name="login" method="post" class="login col-xs-9 col-sm-9 col-md-4 col-lg-4">
  <h2>{$szotar->fordit('bejelentkezés')}</h2>
  <label>{$szotar->fordit('azonosító')}:</label><input type="text" name="azonosito" value="" />
  <label>{$szotar->fordit('jelszó')}:</label><input type="password" name="jelszo" value="" />
  <input name="send" type="submit" value="{$szotar->fordit('bejelentkezés')}" />
  <a href="?p=regisztracio">{$szotar->fordit('regisztráció')}</a>
  <a href="?p=elfelejtett">{$szotar->fordit('Elfelejtett jelszó')}...</a>
</form>
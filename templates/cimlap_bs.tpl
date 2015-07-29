
<div id="nyilvanos_kerdoivek" class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
        
    <h2>{$szotar->fordit('Legfrissebb publikus kérdőívek')}</h2>
    <p class="hidden-xs hidden-sm">Ha kitöltöd a publikus kérdőíveket belépve, akkor megnézheted az eredményeket!</p>
    {$nyilvanos_kerdoivek}
   
   <br style="clear: both;"/>
	<a href="?p=nyilvanos" class="nyilvanos_link col-xs-10 col-sm-10 col-md-10 col-lg-12 col-centered">{$szotar->fordit('További publikus kérdőívek')}...</a>
	<a href="?p=ajandek" class="banner_ajandek col-xs-10 col-sm-10 col-md-10 col-lg-12 col-centered">{$szotar->fordit('Kérdőívek ajándéksorsolással')}<img src="graphics/ajandek_ikon_k.png" alt="" /></a>
</div>


<form action="index.php" name="login" method="post" class="login col-xs-9 col-sm-9 col-md-5 col-lg-5">
  <h2>{$szotar->fordit('bejelentkezés')}</h2>
  <label>{$szotar->fordit('azonosító')}:</label><input type="text" name="azonosito" value="" />
  <label>{$szotar->fordit('jelszó')}:</label><input type="password" name="jelszo" value="" />
  <input name="send" type="submit" value="{$szotar->fordit('bejelentkezés')}" />
  <a href="?p=regisztracio">{$szotar->fordit('regisztráció')}</a>
  <br style="clear: both;"/>
  <a href="?p=elfelejtett">{$szotar->fordit('Elfelejtett jelszó')}...</a>
</form>

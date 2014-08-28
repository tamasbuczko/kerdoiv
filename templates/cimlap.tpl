<div id="nyilvanos_kerdoivek">
   <div>                  
    <img src="graphics/ajandek_ikon.png" alt="" style="width:30px; float: right; margin:0px 0px 0px 0px;" title="{$szotar->fordit('Van ajándéksorsolás')}"/>

    <h2>{$szotar->fordit('Legfrissebb publikus kérdőívek')}</h2>
    <a href="?p=ajandek" class="nyilvanos_link" style="margin-top:-15px;">
        {$szotar->fordit('Kérdőívek ajándéksorsolással')}</a>
    {$nyilvanos_kerdoivek}
   </div>
	<a href="?p=nyilvanos" class="nyilvanos_link">{$szotar->fordit('További publikus kérdőívek')}...</a>
</div>

<form action="index.php" name="login" method="post" class="login">
  <h2>{$szotar->fordit('bejelentkezés')}</h2>
  <label>{$szotar->fordit('azonosító')}:</label><input type="text" name="azonosito" value="" />
  <label>{$szotar->fordit('jelszó')}:</label><input type="password" name="jelszo" value="" />
  <input name="send" type="submit" value="{$szotar->fordit('bejelentkezés')}" />
  <a href="?p=regisztracio">{$szotar->fordit('regisztráció')}</a>
  <a href="?p=elfelejtett">{$szotar->fordit('Elfelejtett jelszó')}...</a>
</form>
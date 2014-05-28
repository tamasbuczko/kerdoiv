<form method="get" action="" class="profil_form">
   <label>Azonosító:</label><input type="text" name="azonosito" value="{$user->nev}" />
   <label>E-mail cím:</label><input type="text" name="email" value="{$user->email}" />
   <label>Új jelszó:</label><input type="password" name="jelszo1" value="" />
   <label>Új jelszó megerősítése:</label><input type="password" name="jelszo2" value="" />
   <br style="clear: both;" /><br style="clear: both;" />
   <label>Jelenlegi csomag:</label><br style="clear: both;" />
   <label>Ingyenes</label><input type="radio" name="csomag" value="1" {if $user->jog == '1'}checked="checked"{/if}>
   <label>Ezüst</label><input type="radio" name="csomag" value="2" {if $user->jog == '2'}checked="checked"{/if}>
   <label>Arany</label><input type="radio" name="csomag" value="3" {if $user->jog == '3'}checked="checked"{/if}>
   <br style="clear: both;" />
   <br style="clear: both;" />
   <label>Csomag lejárati határideje:</label><input type="text" name="lejarat" value="korlátlan" />
   <br style="clear: both;" />
   <br style="clear: both;" />
   <input type="submit" name="submit" />
</form>
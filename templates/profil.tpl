<form action="" name="profil" method="post" class="profil_form">
   <label>{$szotar->fordit('Azonosító')}:</label><input type="text" name="azonosito_mod" value="{$user->nev}" />
   <label>{$szotar->fordit('E-mail cím')}:</label><input type="text" name="email_mod" value="{$user->email}" />
   <label>{$szotar->fordit('Régi jelszó')}:</label><input type="password" name="jelszo_regi" value="" />
   <label>{$szotar->fordit('Új jelszó')}:</label><input type="password" name="jelszo1_mod" value="" />
   <label>{$szotar->fordit('Új jelszó megerősítése')}:</label><input type="password" name="jelszo2_mod" value="" />
   <br style="clear: both;" />{$uzenet}<br style="clear: both;" />
   <label>{$szotar->fordit('Jelenlegi csomag')}:</label><br style="clear: both;" />
   <label>{$szotar->fordit('Ingyenes')}</label><input type="radio" name="csomag_mod" value="1" {if $user->jog == '1'}checked="checked"{/if}>
   <label>{$szotar->fordit('Ezüst')}</label><input type="radio" name="csomag_mod" value="2" {if $user->jog == '2'}checked="checked"{/if}>
   <label>{$szotar->fordit('Arany')}</label><input type="radio" name="csomag_mod" value="3" {if $user->jog == '3'}checked="checked"{/if}>
   <br style="clear: both;" />
   <br style="clear: both;" />
   <label>{$szotar->fordit('Csomag lejárati határideje')}:</label><input type="text" name="lejarat" readonly="readonly" value="korlátlan" />
   <br style="clear: both;" />
   <br style="clear: both;" />
   <input type="submit" name="submit" />
</form>
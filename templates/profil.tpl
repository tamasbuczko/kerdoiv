<form action="" name="profil" method="post" class="profil_form">
   <label>{$szotar->fordit('Azonosító')}:</label><input type="text" name="azonosito_mod" value="{$user->nev}" />
   <label>{$szotar->fordit('E-mail cím')}:</label><input type="text" name="email_mod" value="{$user->email}" />
   <label>{$szotar->fordit('Régi jelszó')}:</label><input type="password" name="jelszo_regi" value="" />
   <label>{$szotar->fordit('Új jelszó')}:</label><input type="password" name="jelszo1_mod" value="" />
   <label>{$szotar->fordit('Új jelszó megerősítése')}:</label><input type="password" name="jelszo2_mod" value="" />
   <br style="clear: both;" />{$uzenet}<br style="clear: both;" />
   <label>{$szotar->fordit('Jelenlegi csomag')}:</label><br style="clear: both;" />
   <label>{$szotar->fordit('Ingyenes')}</label><input type="radio" name="csomag_mod" value="1" {if $user->jog == '1'}checked="checked"{/if} />
   <label>{$szotar->fordit('Ezüst')}</label><input type="radio" name="csomag_mod" value="2" {if $user->jog == '2'}checked="checked"{/if} />
   <label>{$szotar->fordit('Arany')}</label><input type="radio" name="csomag_mod" value="3" {if $user->jog == '3'}checked="checked"{/if} />
   <label>{$szotar->fordit('Platina')}</label><input type="radio" name="csomag_mod" value="4" {if $user->jog == '4'}checked="checked"{/if} />
   <br style="clear: both;" />
   <br style="clear: both;" />
   <label>{$szotar->fordit('Csomag lejárati határideje')}:</label><input type="text" name="lejarat" readonly="readonly" value="korlátlan" />
   <br style="clear: both;" />
   <br style="clear: both;" />
   <label>{$szotar->fordit('Számlázási adatok')}:</label><br style="clear: both;" />
   <label>{$szotar->fordit('Cégnév')}:</label><input type="text" name="cegnev_mod" value="{$user->cegnev}" />
   <label>{$szotar->fordit('Cím')}:</label><input type="text" name="cegcim_mod" value="{$user->cegcim}" />
   <br style="clear: both;" />
   <br style="clear: both;" />
   <input type="submit" name="submit_profil" />
</form>
<div style="float: left;">
    <table style="border: 1px solid #aaa;">
        <tr><th>időszak</th><th>csomag</th><th>díj</th><th>állapot</th></tr>
{foreach from=$fizetesek item="sor" name="fizetesek"}
        <tr>
            <td>{$sor.idopont} - {$sor.lejarat}</td>
            <td>csomag</td><td>{$sor.osszeg}</td>
            <td>
{if $sor.status_fizetett == '1'}
                fizetve
{/if}
{if $sor.status_fizetett == '0'}

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="UVWY57GYV3HCL">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>

    
{/if}
            </td>
        </tr>
{/foreach}
    </table>
</div>
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
   <div class="egyeb_adatok">
       <label style="width:365px;" onclick="divdisp_onxx('egyebadat')">{$szotar->fordit('Egyéb adatok (pl. számlázáshoz, zárt rendszerhez)')}:</label><br/>
   </div>
   <div class="lenyilo_adatok" id="egyebadat" style="display: none;">
   <label>{$szotar->fordit('Név')}:</label><br style="clear: both;" /><input type="text" name="nev_mod" value="{$user->kapcsnev}"/>
   <label>{$szotar->fordit('Cégnév')}:</label><input type="text" name="cegnev_mod" value="{$user->cegnev}"/>
   <label>{$szotar->fordit('Cím')}:</label><input type="text" name="cegcim_mod" value="{$user->cegcim}"/>
   <label>{$szotar->fordit('Telefon')}:</label><input type="text" name="telefon_mod" value="{$user->telefon}"/>
   <label>{$szotar->fordit('E-mail')}:</label><input type="text" name="cegemail_mod" value="{$user->cegemail}"/>
   </div>
   <br style="clear: both;" />
   <br style="clear: both;" />
   <input type="submit" name="submit_profil" value="Mentés"/>
</form>
 
{if $sorszam > 1}   
<div class = "fizetesek">
    <table>
        <tr><th></th><th>időszak</th><th>csomag</th><th>díj</th><th>állapot</th></tr>
{foreach from=$fizetesek item="sor" name="fizetesek"}
        <tr>
            <td>{$sor.sorszam}.</td>
            <td>{$sor.idopont} - {$sor.lejarat}</td>
{if $sor.csomag == 1}
            <td>{$szotar->fordit('Ingyenes')}</td>
{/if}    
{if $sor.csomag == 2}
            <td>{$szotar->fordit('Ezüst')}</td>
{/if}  
{if $sor.csomag == 3}
            <td>{$szotar->fordit('Arany')}</td>
{/if}  
{if $sor.csomag == 4}
            <td>{$szotar->fordit('Platina')}</td>
{/if}              
            <td>{$sor.osszeg}</td>
            <td>
{if $sor.status_fizetett == '1'}
                fizetve
{/if}
{if $sor.status_fizetett == '0'}

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="position: relative; top: 2px; left: 2px;">
        <input type="hidden" name="cmd" value="_s-xclick">
        
        <input type="hidden" name="hosted_button_id" value="UVWY57GYV3HCL">
        
        <input type="hidden" name="item_name" value="{$sor.csomag}">
        <input type="hidden" name="item_number" value="{$sor.id}">
        <input type="hidden" name="amount" value="{$sor.osszeg}">
        
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>

    
{/if}
            </td>
        </tr>
{/foreach}
    </table>
</div>
{/if}
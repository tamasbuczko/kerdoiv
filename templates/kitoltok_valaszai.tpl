<form method="post" action="" style="margin-bottom:20px;">
<label>Kérdőíveim:</label><br />
    <select name="kerdoiv_szam" class="search" style="width:400px; margin-left:1px !important; font-size:12px; height: 29px; padding-top: 2px;">
    <option value="">{$kerdoiv_obj->cim}</option>
{foreach from=$kerdoiv_tomb key="kerdoiv_szam" item="kerdoiv_cim"}
    <option value="{$kerdoiv_szam}">{$kerdoiv_cim}</option>
{/foreach}
    </select> 
    <input type="submit" name="masol" value="Kitöltők másolása a választott kérdőív zárt rendszerébe" style="margin-left: 5px; width: 350px; height: 29px;">
</form>
{$kitolto_lista}
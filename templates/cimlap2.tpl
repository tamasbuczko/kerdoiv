<div id="nyilvanos_kerdoivek">
   <div>
    <h2>{$lang['uj_nyilvanos_kerdoivek']}</h2>
    {$nyilvanos_kerdoivek}
   </div>
	<a href="?p=nyilvanos" class="nyilvanos_link">{$szotar->fordit('További publikus kérdőívek')}...</a>
	
</div>
<div id="nyilvanos_kerdoivek" style="border: none; padding-left: 20px; width: 380px; border-left: 3px solid #ececec;" >
   <div>
    <h2>{$szotar->fordit('Követett publikus kérdőívek')}</h2>
    {$kitoltott_kerdoivek}
   </div>
	<a href="?p=kovetett" class="nyilvanos_link">{$lang['További követett kérdőívek']}...</a>
</div>
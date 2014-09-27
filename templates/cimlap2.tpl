<div id="nyilvanos_kerdoivek">
   <div>                  
    <h2>{$szotar->fordit('Legfrissebb publikus kérdőívek')}</h2>
    {$nyilvanos_kerdoivek}
   </div>
	<a href="?p=nyilvanos" class="nyilvanos_link">{$szotar->fordit('További publikus kérdőívek')}...</a>
	<a href="?p=ajandek" class="banner_ajandek">{$szotar->fordit('Kérdőívek ajándéksorsolással')}<img src="graphics/ajandek_ikon_k.png" alt="" /></a>
	
</div>
<div id="nyilvanos_kerdoivek" style="border: none; padding-left: 20px; width: 380px;" >
   <div>
    <h2>{$szotar->fordit('Követett publikus kérdőívek')}</h2>
    {$kitoltott_kerdoivek}
   </div>
	<a href="?p=kovetett" class="nyilvanos_link">{$szotar->fordit('További követett kérdőívek')}...</a>
</div>
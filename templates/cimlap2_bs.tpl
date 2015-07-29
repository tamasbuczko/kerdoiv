<div id="nyilvanos_kerdoivek" class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
    <h2>{$szotar->fordit('Legfrissebb publikus kérdőívek')}</h2>
    {$nyilvanos_kerdoivek}
	<a href="?p=nyilvanos" class="nyilvanos_link col-xs-5 col-sm-5 col-md-5 col-lg-5">{$szotar->fordit('További publikus kérdőívek')}...</a>
	<a href="?p=ajandek" class="banner_ajandek">{$szotar->fordit('Kérdőívek ajándéksorsolással')}<img src="graphics/ajandek_ikon_k.png" alt="" /></a>
</div>
<div id="nyilvanos_kerdoivek" style="" class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
   <div>
    <h2>{$szotar->fordit('Követett publikus kérdőívek')}</h2>
    {$kitoltott_kerdoivek}
   </div>
	<a href="?p=kovetett" class="nyilvanos_link col-xs-5 col-sm-5 col-md-5 col-lg-5">{$szotar->fordit('További követett kérdőívek')}...</a>
</div>
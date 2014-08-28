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
<div id="nyilvanos_kerdoivek" style="border: none; padding-left: 20px; width: 380px; border-left: 3px solid #ececec;" >
   <div>
    <h2>{$szotar->fordit('Követett publikus kérdőívek')}</h2>
    {$kitoltott_kerdoivek}
   </div>
	<a href="?p=kovetett" class="nyilvanos_link">{$szotar->fordit('További követett kérdőívek')}...</a>
</div>
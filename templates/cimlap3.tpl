
<p style='margin:80px 0px 20px 0px; text-align: center;' >{$szotar->fordit('Köszönjük, hogy kitöltötte a kérdőívet! ')}</p>

<p style='margin:10px 0px 20px 0px; text-align: center; color: blue;' >{$kerdoiv_obj->cim}</p>
<a href="?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}&er=1&kitolto={$smarty.request.ksor}" style='margin:10px auto 20px auto; display: block; text-align: center; color: blue;' >Eredményem megtekintése</a>

<p style='margin:10px 0px 10px 0px; text-align: center;' >{$szotar->fordit('Kérjük, ossza meg ismerőseivel az alábbi gomb segítségével:')}</p>


<div style="text-align: center; width: 850px;" class="fb-share-button" data-href="http://www.questionaction.com/?p=kerdoiv&kerdoiv={$kerdoiv_obj->sorszam}"
     data-layout="button"></div>
     
     
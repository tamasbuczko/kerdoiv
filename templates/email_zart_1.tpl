Tisztelt {$felhasznalo}!<br /><br />
<p>A (kiküldő cég) nevében felkérem, hogy az Önök ({$cegnev}) számára összeállított felmérő lapot, legyenek szívesek kitölteni az online felületen!</p>
<p>A felmérés címe:<br />'.$kerdoiv_obj->cim.'</p>
			   <p style="color: #3c1d11; font-weight: bold;">
			   Az alábbi egyedi linken található a felmérés:<br />
			   <a href="http://questionaction.com/index.php?p=kerdoiv&kerdoiv='.$kerdoivszam.'&link='.$uj_link.'">http://questionaction.com/index.php?p=kerdoiv&kerdoiv='.$kerdoivszam.'&link='.$uj_link.'</a>
			   </p>
              <p style="color: #3c1d11; font-weight: bold; margin-bottom: 2px;">Jelszó:</p>
              '.$uj_jelszo.'
			   <p style="color: #3c1d11;font-weight: bold;">
				  Kérem, hogy a kitöltést a következő dátumig legyen szíves elvégezni:<br />
				  '.$kerdoiv_obj->lejarat_datuma.'
			   </p>
			   <p style="color: #3c1d11;">
				  '.$kerdoiv_obj->zart_email_szoveg.'
			   </p>
              <br style="clear: both;" />
<p>
Köszönettel:<br />
{$kerdoiv_obj->keszito}<br />
{$kerdoiv_obj->email}<br />
			  (kiküldő cégneve)<br />
</p>

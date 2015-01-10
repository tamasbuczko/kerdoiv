{if $smarty.request.package == 1 OR $user->jog == '1'}    
    <div id="free" >        
        <h1>{$szotar->fordit('Ingyenes csomag')}</h1>
        <h3>{$szotar->fordit('0 Ft / Hónap ')}</h3>
        <p>{$szotar->fordit(' Diákoknak, magánszemélyeknek és vállalkozást tervezőknek.')}</p>
        <p>{$szotar->fordit(' Ingyenes, kötöttségek nélkül kipróbálható.')} </p>
    </div>
{/if}
{if $smarty.request.package == 2 OR $user->jog == '2'} 
    <div id="silver" >
        <h1>{$szotar->fordit(' Ezüst csomag')}</h1>
        <h3>{$szotar->fordit(' 2.000 Ft / Hónap')}</h3>
        <p>{$szotar->fordit(' Magánszemélyek, oktatók és vállalkozók számára ajánljuk.')}</p>
        <p>{$szotar->fordit('  Kérdőívek készítésére, kiértékelésére szakdolgozatokhoz, közvélemény és piackutatáshoz.')}</p>
    </div>
{/if}
{if $smarty.request.package == 3 OR $user->jog == '3'} 
    <div id="gold" >
        <h1>{$szotar->fordit(' Arany csomag')}</h1>
        <h3>{$szotar->fordit('6.000 Ft / Hónap ')}</h3>
        <p>{$szotar->fordit('Vállalkozások, cégek számára ajánljuk. ')}</p>
        <p> {$szotar->fordit(' Ideális összeállítás a cégek számára, akik egy helyen szeretnék tudni vevői, beszállítói felméréseit és értékelésüket.')}</p>
    </div>    
{/if}
{if $smarty.request.package == 4 OR $user->jog == '4'} 
    <div id="platinum" >
        <h1>{$szotar->fordit(' Platina csomag')}</h1>
        <h3>{$szotar->fordit(' 36.000 Ft / Hónap')}</h3>
        <p>{$szotar->fordit(' Cégek és nagyvállalatok számára ajánljuk, akik csak a megbízást szeretnék kiadni.')}</p>
        <p> {$szotar->fordit(' Egyedi igények kielégítése, folyamatos támogatás és kapcsolattartás. Megbízásra minden részletet mi biztosítunk, dolgozunk ki.')}</p>
    </div>
{/if}    
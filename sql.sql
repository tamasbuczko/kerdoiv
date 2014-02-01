--Milyen válaszok, és hány darab érkezett az 1. kérdésre?  (view-el)
SELECT kerdes, kerdes_hu, valasz_hu, COUNT(*)
FROM `teszt_view`
WHERE kerdes = 1
GROUP BY valasz_hu;

--Milyen válaszok, és hány darab érkezett az 1. kérdésre?   (join-nal)
SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, COUNT(*)
FROM valaszadasok AS va
LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
WHERE k.sorszam = 1
GROUP BY valasz_hu
ORDER BY k.sorszam

--Milyen válaszok, és hány darab érkezett az 1. kérdésre nõktõl?   (join-nal)
SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, COUNT(*)
FROM valaszadasok AS va
LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
LEFT JOIN kitoltok AS ki ON va.kitolto_sorszam = ki.sorszam
WHERE k.sorszam = 1 AND ki.neme = 'nõ'
GROUP BY valasz_hu
ORDER BY k.sorszam

--Hány férfi választotta a 4. kérdésnél a "Turkálót"?   (join-nal)
SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, COUNT(*)
FROM valaszadasok AS va
LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
LEFT JOIN kitoltok AS ki ON va.kitolto_sorszam = ki.sorszam
WHERE k.sorszam = 4 AND ki.neme = 'férfi' AND v.valasz_hu = 'Turkáló'
GROUP BY valasz_hu
ORDER BY k.sorszam

--Milyen válaszok érkeztek nem szerint a 4. kérdésre?   (join-nal)
SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, ki.neme, COUNT(*)
FROM valaszadasok AS va
LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
LEFT JOIN kitoltok AS ki ON va.kitolto_sorszam = ki.sorszam
WHERE k.sorszam = 4
GROUP BY valasz_hu, ki.neme
ORDER BY v.valasz_hu, ki.neme

--A férfiak korcsoport szerint miket válaszolnak a 4. kérdésre?   (join-nal)
SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, ki.eletkora, COUNT(*)
FROM valaszadasok AS va
LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
LEFT JOIN kitoltok AS ki ON va.kitolto_sorszam = ki.sorszam
WHERE k.sorszam = 3 AND ki.neme='férfi'
GROUP BY valasz_hu, ki.eletkora
ORDER BY v.valasz_hu, ki.eletkora

--Milyen osztályzatok érkeztek a 14 kérdésre (a több osztályzat kapott érték kerül elõbbre)
SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, va.ertek, COUNT(*)
FROM valaszadasok AS va
LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
LEFT JOIN kitoltok AS ki ON va.kitolto_sorszam = ki.sorszam
WHERE k.sorszam = 14
GROUP BY valasz_hu, va.ertek
ORDER BY v.valasz_hu, COUNT(*) DESC
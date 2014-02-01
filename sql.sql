--Milyen v�laszok, �s h�ny darab �rkezett az 1. k�rd�sre?  (view-el)
SELECT kerdes, kerdes_hu, valasz_hu, COUNT(*)
FROM `teszt_view`
WHERE kerdes = 1
GROUP BY valasz_hu;

--Milyen v�laszok, �s h�ny darab �rkezett az 1. k�rd�sre?   (join-nal)
SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, COUNT(*)
FROM valaszadasok AS va
LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
WHERE k.sorszam = 1
GROUP BY valasz_hu
ORDER BY k.sorszam

--Milyen v�laszok, �s h�ny darab �rkezett az 1. k�rd�sre n�kt�l?   (join-nal)
SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, COUNT(*)
FROM valaszadasok AS va
LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
LEFT JOIN kitoltok AS ki ON va.kitolto_sorszam = ki.sorszam
WHERE k.sorszam = 1 AND ki.neme = 'n�'
GROUP BY valasz_hu
ORDER BY k.sorszam

--H�ny f�rfi v�lasztotta a 4. k�rd�sn�l a "Turk�l�t"?   (join-nal)
SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, COUNT(*)
FROM valaszadasok AS va
LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
LEFT JOIN kitoltok AS ki ON va.kitolto_sorszam = ki.sorszam
WHERE k.sorszam = 4 AND ki.neme = 'f�rfi' AND v.valasz_hu = 'Turk�l�'
GROUP BY valasz_hu
ORDER BY k.sorszam

--Milyen v�laszok �rkeztek nem szerint a 4. k�rd�sre?   (join-nal)
SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, ki.neme, COUNT(*)
FROM valaszadasok AS va
LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
LEFT JOIN kitoltok AS ki ON va.kitolto_sorszam = ki.sorszam
WHERE k.sorszam = 4
GROUP BY valasz_hu, ki.neme
ORDER BY v.valasz_hu, ki.neme

--A f�rfiak korcsoport szerint miket v�laszolnak a 4. k�rd�sre?   (join-nal)
SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, ki.eletkora, COUNT(*)
FROM valaszadasok AS va
LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
LEFT JOIN kitoltok AS ki ON va.kitolto_sorszam = ki.sorszam
WHERE k.sorszam = 3 AND ki.neme='f�rfi'
GROUP BY valasz_hu, ki.eletkora
ORDER BY v.valasz_hu, ki.eletkora

--Milyen oszt�lyzatok �rkeztek a 14 k�rd�sre (a t�bb oszt�lyzat kapott �rt�k ker�l el�bbre)
SELECT k.sorszam, k.kerdes_hu, v.valasz_hu, va.ertek, COUNT(*)
FROM valaszadasok AS va
LEFT JOIN valaszok AS v ON va.valasz_sorszam = v.sorszam
LEFT JOIN kerdesek AS k ON va.kerdes_sorszam = k.sorszam
LEFT JOIN kitoltok AS ki ON va.kitolto_sorszam = ki.sorszam
WHERE k.sorszam = 14
GROUP BY valasz_hu, va.ertek
ORDER BY v.valasz_hu, COUNT(*) DESC
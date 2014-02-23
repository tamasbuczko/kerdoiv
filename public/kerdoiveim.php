<?php


$result = mysql_query ("SELECT sorszam, cim_hu, cim_en, cim_de FROM kerdoivek WHERE status = '1' AND user_id = '$_SESSION[qa_user_id]' ");
while ($next_element = mysql_fetch_array($result)){
    $nyelv = 'cim_'.$_SESSION[lang];
    $cim = $next_element[$nyelv];
    $lista_kerdoiveim .= '<tr><td>'.$cim.'</td><td><a href="?p=eredmeny&kerdoiv='.$next_element[sorszam].'">x</a></td><td><a href="?p=kerdoiv&kerdoiv='.$next_element[sorszam].'">x</a></td><td><a href="?p=kerdoiv&amp;mod=1&amp;kerdoiv='.$next_element[sorszam].'">x</a></td><td>x</td><td>fő</td></tr>';
}


$oldal = new html_blokk;

$array = array( 'lista_kerdoiveim'       => $lista_kerdoiveim,
                'figy_uzenet'   => $figy_uzenet);

$oldal->load_template_file("templates/kerdoiveim.html",$array);

$tartalom = $oldal->html_code;
?>
<?php
// or make up your own for plain text message
// Generate a boundary string that is unique
#$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";


//file to attach
#$fileatt2 = '/home/inkoz/domains/ingatlanhirbank.hu/graphics/pd_logo_hu.png';//put the relative path to the file here on your server
$fileatt2 = 'graphics/logo_email.jpg';//put the relative path to the file here on your server
$fileatt = 'graphics/logo_email.jpg';//put the relative path to the file here on your server
$fileatt_name2 = 'logo_email.jpg';//just the name of the file here
$fileatt_name = 'logo_email.jpg';//just the name of the file here
$fileatt_type2 = filetype($fileatt2);
$fileatt_type = filetype($fileatt);
$file2 = fopen($fileatt2,'rb');
$file = fopen($fileatt,'rb');
$data2 = fread($file2,filesize($fileatt2));
$data = fread($file,filesize($fileatt));
fclose($file2);
fclose($file);
$data2 = chunk_split(base64_encode($data2));
$data = chunk_split(base64_encode($data));

$headers = "From: hegesztesportal.hu <info@hegesztesportal.hu>";


 // Add the headers for a file attachment
$headers .= "\nMIME-Version: 1.0\n" .
"Content-Type: multipart/related;\n" .
" boundary=\"{$mime_boundary}\"";

$message = "\n\n--{$mime_boundary}\n" .
"Content-Type: text/html; charset=\"iso-8859-2\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" .
$html."\r\n";

// Add file attachment to the message
$message .= "\n\n--{$mime_boundary}\n" .
"Content-Type: image/jpg;" . // {$fileatt_type}
" name=\"{$fileatt_name2}\"\n" .
"Content-Disposition: inline;" .
" filename=\"{$fileatt_name2}\"\n" .
"Content-Transfer-Encoding: base64\n" .
"Content-ID: <123456789>\n\n" .
$data2 . "\n\n" .
//"\n--{$mime_boundary}\n" .
//"Content-Type: image/jpg;" . // {$fileatt_type}
//" name=\"{$fileatt_name}\"\n" .
//"Content-Disposition: inline;" .
//" filename=\"{$fileatt_name}\"\n" .
//"Content-Transfer-Encoding: base64\n" .
//"Content-ID: <akarmi>\n\n" .
$data . "\n\n" .
"\n--{$mime_boundary}--\n"; // a -- zárja le, az utolsó csatolmány után kell csak

?>
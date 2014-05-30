<?php
#$PayPalMode         = 'live'; // sandbox or live
$PayPalMode         = 'sandbox'; // sandbox or live
#$PayPalApiUsername  = 'info_api1.inkozrt.hu'; //PayPal API Username
$PayPalApiUsername  = 'info_api1.citypixel.hu'; //PayPal API Username
#$PayPalApiPassword  = 'Z4SNAV5WQS2WSZAH'; //Paypal API password
$PayPalApiPassword  = '1400354771'; //Paypal API password
#$PayPalApiSignature     = 'ADJKsOXQ9-ViAm6kJTsBx7.TNPffAK6QuduhZGQmtULd3f0rpwu2fy1R'; //Paypal API Signature
$PayPalApiSignature     = 'AZPXQPz0alBOx6Ps7R7irvjP6KQ9AnppFx31ttR19mvPkt4ikrWtqpPo'; //Paypal API Signature
$PayPalCurrencyCode     = 'HUF'; //Paypal Currency Code
$PayPalReturnURL    = 'http://citypixel.hu/paypal_teszt/?pay=1'; //Point to process.php page
$PayPalCancelURL    = 'http://citypixel.hu/paypal_teszt/?cancel=1'; //Cancel URL if user clicks cancel
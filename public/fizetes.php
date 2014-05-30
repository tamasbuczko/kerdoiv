<?php
include_once("paypal/config.php");

if ($_REQUEST[pay]){
	if (!$_REQUEST[token]){
		$result = mysql_query("SELECT id, name, description, price FROM csomagok WHERE id = $_REQUEST[termek]");
		$a = mysql_fetch_array($result);
	}
	
	if ($a){
	  $ItemName 		= $a["name"]; //Item Name
	  $ItemPrice 		= $a["price"]; //Item Price
	  $ItemNumber 	= $a["id"]; //Item Number
	  $ItemDesc 		= $a["description"]; //Item Number, ide tehetj�k a v�s�rolt csomag azonos�t�j�t
	  $ItemQty 		= $_REQUEST["itemQty"]; // Item Quantity
	} else {
	  $ItemName 		= 'ezüst csomag'; //Item Name
	  $ItemPrice 		= '4000'; //Item Price
	  $ItemNumber 	= '2'; //Item Number
	  $ItemDesc 		= 'ezüst csomag'; //Item Number, ide tehetj�k a v�s�rolt csomag azonos�t�j�t
	  $ItemQty 		= '1'; // Item Quantity
	}
	
	include_once("paypal/process.php");
}

if ($_REQUEST[cancel]){
	include_once("paypal/cancel.php");
}

$smarty->assign('lang', $lang);
$smarty->assign('user', $user);
$tartalom = $smarty->fetch('templates/fizetes.tpl');
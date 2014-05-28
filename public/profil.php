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

if (!$_REQUEST[cancel]){

$fizetes_form = '
   <br /><br />
<form method="post" action="?p=profil&pay=1">
	 <select name="termek">
		<option value="2">ezüst</option>
		<option value="3">arany</option>
	 </select>
	 
    Mennyiség :
	 <select name="itemQty">
		 <option value="1">1 hónap</option>
		 <option value="2">2 hónap</option>
		 <option value="3">3 hónap</option>
	 </select> 
    <input class="dw_button" type="submit" name="submitbutt" value="Fizetés" />
</form>';
}

$smarty->assign('lang', $lang);
$smarty->assign('user', $user);
$tartalom = $smarty->fetch('templates/profil.tpl').$fizetes_form;


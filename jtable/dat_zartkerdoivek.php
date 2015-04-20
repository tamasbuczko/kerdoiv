<?php
//néhány rendszerállandó beállítása
require_once('../parameters.php');

//osztályok betöltése az objektumokhoz
require_once('../class/class.php');

//funkciók betöltése
require_once('../functions.php');

$adatkapcsolat = new data_connect;  //példányosítjuk az objektumot
$adatkapcsolat->connect(); 

try
{

    $data_table = $_GET["data_table"];
	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database
            $result = mysql_query("SELECT * FROM $data_table WHERE kerdoiv = $_GET[kerdoiv];");
            
//		$result = mysql_query("SELECT DISTINCT ze.id, k.sorszam AS sorszam, ze.nev, ze.cegnev, ze.email, ze.link, ze.status,
//                           ze.jelszo, ze.kerdoiv FROM zart_emailek AS ze
//			   INNER JOIN valaszadasok AS va ON ze.kerdoiv = va.kerdoiv_sorszam
//                           LEFT JOIN kitoltok AS k ON ze.email = k.email
//			   WHERE ze.kerdoiv = $_GET[kerdoiv]");
		
//                $result = mysql_query("SELECT DISTINCT va.kitolto_sorszam AS sorszam, k.email, ze.id, ze.nev,
//                           ze.cegnev, ze.email, ze.link, ze.status, ze.jelszo, ze.kerdoiv
//                       FROM valaszadasok AS va
//                       LEFT JOIN kitoltok AS k ON va.kitolto_sorszam = k.sorszam
//                       LEFT JOIN zart_emailek AS ze ON ze.kerdoiv = va.kerdoiv_sorszam
//                       WHERE va.kerdoiv_sorszam = $_GET[kerdoiv];");
                
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
                   $osszpontszam = pontszam($_GET[kerdoiv], $row[kitolto_sorszam]);
                   $pontkategoria = pontkategoria($_GET[kerdoiv], $osszpontszam);
                   
                   $row[osszpontszam] = $osszpontszam;
                   $row[pontkategoria] = $pontkategoria;
                   
		   $rows[] = $row;
                   
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		$result = mysql_query("INSERT INTO $data_table (nev, cegnev, email, link, status, jelszo, kerdoiv, szov_ertekeles) VALUES
                        ('" . $_POST["nev"] . "', '" . $_POST["cegnev"] . "', '" . $_POST["email"] . "', '" . $_POST["link"] . "', '" . $_POST["status"] . "', '" . $_POST["jelszo"] . "', '".$_GET[kerdoiv]."', '".$_GET[szov_ertekeles]."');");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM $data_table WHERE id = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);
        
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
        
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
        
		$result = mysql_query("UPDATE $data_table SET nev = '" . $_POST["nev"] . "', cegnev = '" . $_POST["cegnev"] . "', email = '" . $_POST["email"] . "', link = '" . $_POST["link"] . "', status = '" . $_POST["status"] . "', jelszo = '" . $_POST["jelszo"] . "', szov_ertekeles = '" . $_POST["szov_ertekeles"] . "' WHERE id = '" . $_POST["id"] . "';");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM $data_table WHERE id = " . $_POST["id"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
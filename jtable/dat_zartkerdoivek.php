<?php

try
{
	//Open database connection
	$domain = $_SERVER['HTTP_HOST'];
	if ($domain == 'localhost'){
      $con = mysql_connect("localhost","root","");
      mysql_select_db("kerdoiv", $con);}
    else{
      $con = mysql_connect("localhost","hegeszte_kerdoiv","ho1z60");
      mysql_select_db("hegeszte_qa", $con);
    }
    
    mysql_set_charset("utf8",$con);
    $data_table = $_GET["data_table"];
	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database
		$result = mysql_query("SELECT * FROM $data_table WHERE kerdoiv = $_GET[kerdoiv];");
		
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
           
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
		$result = mysql_query("INSERT INTO $data_table (nev, cegnev, email, link, status, jelszo, kerdoiv) VALUES
                        ('" . $_POST["nev"] . "', '" . $_POST["cegnev"] . "', '" . $_POST["email"] . "', '" . $_POST["link"] . "', '" . $_POST["status"] . "', '" . $_POST["jelszo"] . "', '".$_GET[kerdoiv]."');");
		
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
        
		$result = mysql_query("UPDATE $data_table SET nev = '" . $_POST["nev"] . "', cegnev = '" . $_POST["cegnev"] . "', email = '" . $_POST["email"] . "', link = '" . $_POST["link"] . "', status = '" . $_POST["status"] . "', jelszo = '" . $_POST["jelszo"] . "' WHERE id = '" . $_POST["id"] . "';");

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
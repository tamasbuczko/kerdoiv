<?php

class data_connect{ //ez egy osztály, csak terv
	public $domain;    

	function connect(){
		$domain = $_SERVER['HTTP_HOST'];
		if ($domain == 'localhost'){
			$kapcsolat = mysql_connect("localhost", LOCALHOST_DB_USER, LOCALHOST_DB_PASSWORD);
			$adatbazis = mysql_select_db(LOCALHOST_DB_NAME);}
		else {
			$kapcsolat = mysql_connect("localhost", DOMAIN_DB_USER, DOMAIN_DB_PASSWORD);
			$adatbazis = mysql_select_db(DOMAIN_DB_NAME);
		}

		if (!$kapcsolat) { die('Hiba a MySQL szerverhez kapcsolódás közben: ' . mysql_error());}

		$ekezet = mysql_set_charset("utf8",$kapcsolat);

	}
}

class html_blokk{
	public $html_code;
	
	function load_template_file($fajlnev,$tomb) {
 
		if(file_exists($fajlnev) > 0) {
			$temp = fopen($fajlnev,"r");
			$tartalom = fread($temp, filesize($fajlnev));
			fclose($temp);
	 
			$tartalom = preg_replace("/{(.*?)}/si","{\$tomb[\\1]}",$tartalom);
	 
			eval("\$tartalom = \"" . addslashes($tartalom) . "\";");
			$tartalom = str_replace("\'", "'", $tartalom);
			$this->html_code = $tartalom . "\n";
		}
 
	}
}

class kerdes{
   public $sorszam;
   public $kerdes;
   public $tipus;
   public $leiras;
   var $valaszok = array();
}

?>
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

		if ($_REQUEST[db_save]){
			backup_tables();
		 }

		 if ($_REQUEST[db_load]){
			sql_import("db-backup.sql");
		 }
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

class menu_cikkek {
	public $html_code;
	
	function mysql_read($nyelv){
		if (($nyelv == '') OR ($nyelv == 'hu')){
			$nyelvszures = "nyelv = 'hu'";}
		else {
			$nyelvszures = "nyelv = '".$nyelv."'";
		}
		
		$result = mysql_query("SELECT cikkszam, menunev, jog FROM szoveg WHERE ".$nyelvszures." AND archiv = 0 AND menunev != '' ORDER BY sorrend");	
		while ($next_element = mysql_fetch_array($result)){
			$cikkszam = $next_element['cikkszam'];
			$menunev = $next_element['menunev'];
                        
                        if ($next_element['jog'] == '1'){
                            $menu_cikkek .= '<a href="?p='.$cikkszam.'">'.$menunev.'</a>';
                        } else {
                            if ($_SESSION["qa_user_id"]){
                                $menu_cikkek .= '<a href="?p='.$cikkszam.'">'.$menunev.'</a>';
                            }
                        }
			
		}
		
		$this->html_code = $menu_cikkek;
	}
}

class cikkszoveg {
	public $html_code;
	public $cim;
        public $php_file;
	
	function mysql_read($cikksorszam, $nyelv){
		if (($nyelv == '') OR ($nyelv == 'hu')){
			$nyelvszures = "AND nyelv = 'hu'";}
		else {
			$nyelvszures = "AND nyelv = '".$nyelv."'";
		}
                
                if (is_numeric($cikksorszam) == TRUE){ 
                    $r = mysql_query("SELECT tartalom, cim, archiv, php_file FROM szoveg WHERE cikkszam =" . $cikksorszam . " ".$nyelvszures."");	
                } else {
                    $r = mysql_query("SELECT tartalom, cim, archiv, php_file FROM szoveg WHERE hivatkozas ='" . $cikksorszam . "' ".$nyelvszures."");	
                }
                
		
		$a = mysql_fetch_row($r);
		
		$cikkszoveg = $a[0];
		$cikkcim = $a[1];
		$cikkarchiv = $a[2];
                $this->php_file = $a[3];
		
		//ha keresés eredménye a cikk, akkor a keresett szöveget megjelöli
		if ($_REQUEST[s]){
			$cikkszoveg = str_replace ($_REQUEST[s],'<span class="keres_span">'.$_REQUEST[s].'</span>',$cikkszoveg);
		}
		
		if ($cikkarchiv == 1){
			$this->html_code= '
			<h2 class="lapcim">Hiba történt!</h2>
			<div class="szovegblokk">
				A keresett oldal nem található!
			</div>';
		} else {
			$this->cim= $cikkcim;
                        
                        if ($this->php_file == 'cimlap.php'){
                        $this->html_code= '
			<h1 class="lapcim">'.$cikkcim.'</h1>
			<div class="szovegblokk_alul">
			' . $cikkszoveg. '
			</div>'; 
                        } else {
			$this->html_code= '
			<h1 class="lapcim">'.$cikkcim.'</h1>
			<div class="szovegblokk">
			' . $cikkszoveg. '
			</div>';
                        }
                        
                        
		}
	}
}

class user{
	public $sorszam;
	public $nev;
	public $jog;
	public $email;
	public $csoport;
	public $belephiba;
	public $html_code;

	function login(){
		$jel = mysql_real_escape_string($_REQUEST['jelszo']);
		$azon = mysql_real_escape_string($_REQUEST['azonosito']);
		if (!$_REQUEST['azonosito']){$azon = $_SESSION["sessfelhasznaloazonosito"];}
		$jel = md5($jel);

		If ($_REQUEST['logout'] == 1) {
			unset($_SESSION["sessfelhasznalo"]);
			unset($_SESSION["qa_user_id"]);
                        unset($_SESSION["qa_user_authority"]);
			unset($_SESSION["sessfelhasznaloazonosito"]);
			unset($_SESSION["sessfelhasznalojog"]);
		}

		If ($_REQUEST['azonosito'] != "") {
			$result = mysql_query("SELECT id, nick, password, authority, email FROM users WHERE nick = '$azon' AND password = '$jel'");	
			$s = mysql_fetch_row($result);
			$mostlep == 1;
		} else {
		   if ($_SESSION[sessfelhasznalosorszam]){
			$result = mysql_query("SELECT id, nick, password, authority, email FROM users WHERE id = '$_SESSION[sessfelhasznalosorszam]'");	
			$s = mysql_fetch_row($result);
		   }
		}
			if ($s[2] != ""){
				$this->sorszam = $s[0];
				$this->nev = $s[1];
				$this->jog = $s[3];
				$this->email = $s[4];
				$_SESSION["sessfelhasznalo"] = $s[1];
				$_SESSION["qa_user_id"] = $s[0];
				$_SESSION["sessfelhasznaloazonosito"] = $s[1];
				$_SESSION["sessfelhasznalojog"] = $s[3];
                                $_SESSION["qa_user_authority"] = $s[3];
				$_SESSION["sessfelhasznaloemail"] = $s[4];
				if ($mostlep){
				  $loging_db = new log_db;
				  $loging_db->write($_SESSION["qa_user_id"], 'Bejelentkez�s');
				}
			} else {
               If ($_REQUEST['azonosito'] != "") {
				$_SESSION[messagetodiv] = '<p>Figyelem!</p><ul><li>Rossz felhasználónév, vagy jelszó!</li></ul>';
               }
			}

	}
}

class log_db {
	public function write($user, $message) {
        $idopont = date("Y-m-d H:i:s");
        $sql2 = "INSERT INTO log (idopont, user, uri, message, host, user_agent, ip)
            VALUES ('$idopont', '$user', '$_SERVER[REQUEST_URI]', '$message', '$_SERVER[REMOTE_HOST]', '$_SERVER[HTTP_USER_AGENT]', '$_SERVER[REMOTE_ADDR]')";
            mysql_query($sql2);
	}
}
?>
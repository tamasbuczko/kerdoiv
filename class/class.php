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

		if ($_REQUEST[db_save_xxx]){
                    if (!$_REQUEST[table]){
                        $tables = '*';
                    } else {
                        $tables = $_REQUEST[table];
                    }
                    
			backup_tables($tables);
		 }

		 if ($_REQUEST[db_load_xxx]){
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
                            if (($_SESSION["qa_user_id"]) AND ($_SESSION["qa_user_authority"] > 0) ){
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
                        unset($_SESSION[pub]);
                        header("Location: index.php");
		}

		If ($_REQUEST['azonosito'] != "") {
			$result = mysql_query("SELECT id, nick, password, authority, email FROM users WHERE nick = '$azon' AND password = '$jel'");	
			$s = mysql_fetch_row($result);
			$mostlep == 1;
		} else {
		   if ($_SESSION[qa_user_id]){
			$result = mysql_query("SELECT id, nick, password, authority, email FROM users WHERE id = '$_SESSION[qa_user_id]'");	
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
				  $loging_db->write($_SESSION["qa_user_id"], 'Bejelentkezés');
				}
			} else {
               If ($_REQUEST['azonosito'] != "") {
				$_SESSION[messagetodiv] = '<p>Figyelem!</p><ul><li>Rossz felhasználónév, vagy jelszó!</li></ul>';
               }
			}

	}
}

class user_admin{
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
			$result = mysql_query("SELECT sorszam, azonosito, jelszo, jog FROM regisztralt WHERE azonosito = '$azon' AND jelszo = '$jel'");	
			$s = mysql_fetch_row($result);
			$mostlep == 1;
		} else {
		   if ($_SESSION[qa_user_id]){
			$result = mysql_query("SELECT sorszam, azonosito, jelszo, jog FROM regisztralt WHERE sorszam = '$_SESSION[sessfelhasznalosorszam]'");	
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
				  $loging_db->write($_SESSION["qa_user_id"], 'Bejelentkezés');
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

class navsav{
	//egy lista navigációs sávjának elkészítése (várt adat az sql, melyik lapon vagyunk)
	public $tol;
	public $ig;
	public $lap;
	public $termekdb;
	public $lapszamsor;
	
	function create_navsav($sql_query, $lap, $db_peroldal, $xkategoriaszures, $adminpublic){
		$result = mysql_query($sql_query);
		$this->termekdb = mysql_num_rows($result);
		
		If (($lap == "") OR ($lap == 1)) {
			$this->tol = 0;
			$this->ig = $db_peroldal;}
		else {
			$this->tol = $db_peroldal * ($lap-1);
			$this->ig = $db_peroldal;
		}
		
		if ($_REQUEST[akcio]){
		   $akcios_link = '&amp;akcio=1';
		}
		
		if ($_REQUEST[search]){
		   $search_link = '&amp;search='.$_REQUEST[search];
		}
		
		if ($_REQUEST[meret]){
		   $meret_link = '&amp;meret='.$_REQUEST[meret];
		}
		
		if ($_REQUEST[szin]){
		   $szin_link = '&amp;szin='.$_REQUEST[szin];
		}
		
		$olddb = 0;
		$oldelemdb = 0;
		#10 számos oldalszámblokk elemei
		if ($lap != ""){
			$kapott_oldal = $lap;}
		else {
			$kapott_oldal = 1;
		}
			
		$kapott_oldal_m = $kapott_oldal;
		$kapott_oldal_p = $kapott_oldal;

		for ($i = 0; 10>$i; $i++){
			If (($kapott_oldal_m %10 == 0) OR ($kapott_oldal_m == 1)) {
				if ($min_oldal == ""){
					$min_oldal = $kapott_oldal_m;
				}
			}
			If ($kapott_oldal_p %10 == 0) {
				if ($max_oldal == ""){
				$max_oldal = $kapott_oldal_p;
				}
			}
			$kapott_oldal_m--;
			$kapott_oldal_p++;
		}
		
		if (($adminpublic == 'public') OR ($adminpublic == '')) {$cel = '?p=nyilvanos&amp;lap=';}
		if ($adminpublic == 'admin') {$cel = 'admin.php?tartalom=termeklist&amp;lap=';}
		
		If ($this->termekdb > $db_peroldal){
			$olddb = ($min_oldal-1);
			for ($i = ($min_oldal-1); $i <= $this->termekdb; $i++){
				If (($i %$db_peroldal == 0) OR ($i == 0)) {
					$olddb++;
					$oldelemdb++;
					$oldvalt = "oldalszam";
					If ($olddb == $lap){$oldvalt = "oldalszamv";}
					If (($lap == "") AND ($i == 0)) {$oldvalt = "oldalszamv";}
					if ($xkategoriaszures != "") {$kategoriaszuresxx = '&amp;kategoriaszures='.$xkategoriaszures;}
					if ($_REQUEST[k] != "") {$kategoriaszuresxx = '&amp;x=list&amp;k='.$_REQUEST[k];}
					if ($_REQUEST[fk] != "") {$kategoriaszuresxx = '&amp;x=list&amp;fk='.$_REQUEST[fk];}
					$this->lapszamsor .= '<a class="'.$oldvalt.'" href="'.$cel.$olddb.$kategoriaszuresxx.$akcios_link.$search_link.$szin_link.$meret_link.'">'.$olddb.'</a>'."\n";}
					if ($oldelemdb == 10) {break;}
					if ($olddb == round($this->termekdb/$db_peroldal,0)+1){break;}
				}
		}
		
		if ($this->lapszamsor != ""){
			$elozooldal = $kapott_oldal-1;
			$kovetkezooldal = $kapott_oldal+1;
			if ($elozooldal < 1) {$elozooldal = 1;}
			if ($kovetkezooldal > round($this->termekdb/$db_peroldal,0)){ $kovetkezooldal = (round($this->termekdb/$db_peroldal,0)+1);}
			if ($_REQUEST[k] != "") {$kategoriaszuresxx = '&amp;k='.$_REQUEST[k];}
			$this->lapszamsor = '
			<div class="navsav">
			   <a href="'.$cel.'1'.$kategoriaszuresxx.$akcios_link.$search_link.$szin_link.$meret_link.'" class="oldalszam" title="első">&#60;&#60;</a>
			   <a href="'.$cel.$elozooldal.$kategoriaszuresxx.$akcios_link.$search_link.$szin_link.$meret_link.'" class="oldalszam" title="előző">&#60;</a>
			   '. $this->lapszamsor .'
			   <a href="'.$cel.$kovetkezooldal.$kategoriaszuresxx.$akcios_link.$search_link.$szin_link.$meret_link.'" class="oldalszam" title="következő">&#62;</a>
			   <a href="'.$cel.(round($this->termekdb/$db_peroldal,0)+1).$kategoriaszuresxx.$akcios_link.$search_link.$szin_link.$meret_link.'" class="oldalszam" title="utolsó">&#62;&#62;</a>
			</div>';
			
		}
		
	}
}

class kerdoiv {
    public $sorszam;
    public $cim;
    public $leiras;
    public $keszito;
    public $kelt;
    public $kereso_kep;
    public $kitoltok_szama;
    public $kovetok_szama;
    public $nyeremeny;
    
    public function load($sorszam){
        $result = mysql_query("SELECT sorszam, cim_hu, cim_en, cim_de, leiras_hu, leiras_en, leiras_de FROM kerdoivek WHERE sorszam = $sorszam");
        $row = mysql_fetch_array($result);
        $this->sorszam = $row['sorszam'];
        $this->cim = $row['cim_'.$_SESSION[lang]];
        $this->leiras = $row['leiras_'.$_SESSION[lang]];
    }
    
}

?>
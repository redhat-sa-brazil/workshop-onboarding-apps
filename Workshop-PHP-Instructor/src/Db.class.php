<?php
// Registering Globals
define("dbhost", "mysql");
define("dbuser", "admin");
define("dbpass", "redhat@123");
define("dbname", "workshop");
// 
class Db {
	public $hostname =  dbhost;
	public $usuario = dbuser;
	public $senha = dbpass;
	public $database = dbname;
	
	
	public $idcon;
	public $rs;
	public $matriz_associativa;
	
	public function Db(){
		$this->m_connect();	
	}
	
	public function m_connect() {
			$this->idcon = mysql_pconnect($this->hostname, $this->usuario, $this->senha) or die(mysql_error());
			mysql_select_db($this->database, $this->idcon);
			// Set timezone
			$qr = "set time_zone = 'America/Sao_Paulo'";
			$this->m_query($qr);
	}
	
	public function m_query($qr) {
			if(!$this->idcon) {
				$this->m_connect();
			}
                        
			$rs=mysql_query($qr, $this->idcon);
			$this->rs = $rs;
			return $rs;
			
	}
	
	public function m_fetch_array($rs) {
		return mysql_fetch_array($rs);
	}

	public function m_result($rs, $campo) {
		return mysql_result($rs, 0, $campo);
	}

	public function SetPassword($password) {
			$this->senha = $password;
	}

	public function m_num_rows($rs) {
		return mysql_num_rows($rs);
	}

	public function m_affected_rows() {
		return mysql_affected_rows($this->idcon);
	}

	public function m_close() {
		return mysql_close($this->idcon);	
	}
	
	public function m_error() {
		return mysql_error();	
	}
        
        public function escape($string) {
            return mysql_real_escape_string($string, $this->idcon);
        }
	
}


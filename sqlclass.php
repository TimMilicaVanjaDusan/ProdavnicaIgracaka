<?php

include 'dbconfig.php';

error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "php_logs.log");

define('SALT', '!"#$%&/()=$%DFGBHJfghJ$%677$%');

class Mysql extends Dbconfig
{
    public $conn;
    public $dataSet;
    public $query;

   protected $hostName;
   protected $userName;
   protected $password;
   protected $dbName;
   private $result = true;
   private $records;
   private $affectedRows;

   function Mysql()
   {

    $this->conn = NULL;
    $this->dataSet = NULL;
    $this->query = NULL;

    $dbPar = new Dbconfig();

    $this->hostName = $dbPar->serverName;
    $this->userName = $dbPar->userName;
    $this->password = $dbPar->password;
    $this->dbName = $dbPar->dbName;

   }

   function dbConnect()
   {
    
    $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
    if($this->conn->connect_errno)
    {
        echo("Greska");
    }
    $this->conn->set_charset("utf8");

   }

   function dbDisconnect()
   {
       $this->conn = NULL;
       $this->dataSet = NULL;
       $this->query = NULL;

       $this->hostName = NULL;
       $this->userName = NULL;
       $this->password = NULL;
       $this->dbName = NULL;

   }
   public function getResult()
	{
		return $this->result;
	}
	
   function dajKorisnike() {
		
	$q = "SELECT * FROM korisnici";	
	$this->ExecuteQuery($q);	
    }
	function ExecuteQuery($query)
	{
		if($this->result = $this->conn->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->conn->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}	
		else{
			return false;
		}
    }
    function prikaziKorisnika($podatak) {
		$this->conn->set_charset("utf8");
		$podatak= $this->conn->real_escape_string($podatak);
        $q = "SELECT * FROM korisnik WHERE korisnickoIme='$podatak'";
		$this->ExecuteQuery($q);
	}
    public function registracijaKorisnika($podaci)
	{
        $ime=mysqli_real_escape_string($this->conn,$podaci[2]);
        $prezime=mysqli_real_escape_string($this->conn,$podaci[3]);
        $sifra=mysqli_real_escape_string($this->conn,$podaci[1]);
        $lozinka = md5(SALT . md5($sifra));
        $korisnickoIme=mysqli_real_escape_string($this->conn,$podaci[0]);
        $adresa=mysqli_real_escape_string($this->conn,$podaci[4]);
        $telefon=mysqli_real_escape_string($this->conn,$podaci[5]);
        $email=mysqli_real_escape_string($this->conn,$podaci[6]);
        $sql = "INSERT INTO korisnik (ime, prezime, korisnickoIme, lozinka, adresa, telefon, email) VALUES
        ('". $ime."', '".$prezime."', '".$korisnickoIme."', '". $lozinka."', '". $adresa."', '". $telefon."','".$email."')";
if ($this->ExecuteQuery($sql))
return true;
else return false;
 }

}
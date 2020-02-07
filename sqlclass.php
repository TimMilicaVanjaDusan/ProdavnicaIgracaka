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

   function __construct()
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
				if (isset($this->conn->affected_rows)) $this->affected        = $this->conn->affected_rows;
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
        $sql = "INSERT INTO korisnik (ime, prezime, korisnickoIme, lozinka, adresa, telefon, email, status) VALUES
        ('". $ime."', '".$prezime."', '".$korisnickoIme."', '". $lozinka."', '". $adresa."', '". $telefon."','".$email."', 'korisnik')";
        if ($this->ExecuteQuery($sql))
            return true;
        else return false;
    }

 function prikaziCenu($naziv)
 {

   $this->sql = "SELECT igracka.cena FROM igracka WHERE igracka.nazivIgracke = '".$naziv."'";
   return mysqli_query($this->conn, $this->sql);
   
 }

 function prikaziDetalje($naziv){

    $this->sql = "SELECT igracka.nazivIgracke,igracka.proizvodjac,igracka.cena,igracka.opis,igracka.slika,tipIgracke.pol FROM igracka JOIN tipIgracke ON igracka.tipIgrackeID=tipIgracke.tipIgrackeID  WHERE igracka.nazivIgracke = '".$naziv."'";
    return mysqli_query($this->conn, $this->sql);

 }

 function prikaziNaziveIgracaka()
 {

    $this->sql = "SELECT igracka.nazivIgracke FROM igracka ";
    return mysqli_query($this->conn, $this->sql);

 }
 function login($sifra,$ime) {
    $sifra =  $this->conn->real_escape_string($sifra);
    $ime =  $this->conn->real_escape_string($ime);
    $lozinka = md5(SALT . md5($sifra));
    $q = "SELECT * FROM korisnik WHERE lozinka='".$lozinka."' AND korisnickoIme='".$ime."'";
    $this->ExecuteQuery($q);
}
function vratiSveIgracke()
 {

    $this->sql = "SELECT * from igracka ";
    return mysqli_query($this->conn, $this->sql);

 }
 function prikaziPonudu($pol){

    $this->sql = "SELECT igracka.nazivIgracke,igracka.proizvodjac,igracka.cena,igracka.opis,igracka.slika,tipIgracke.pol as pol FROM igracka JOIN tipIgracke ON igracka.tipIgrackeID=tipIgracke.tipIgrackeID  WHERE  pol = '".$pol."'";
    return mysqli_query($this->conn, $this->sql);

 }



 function vratiSveKategorije(){

    $this->sql = "SELECT * FROM kategorijaIgracke";
    
    return mysqli_query($this->conn, $this->sql);

 }
 function prikaziPonuduKategorija($nazivKategorije){

    $this->sql = "SELECT igracka.nazivIgracke, igracka.proizvodjac, igracka.cena, igracka.opis, igracka.slika, kategorijaIgracke.nazivKategorije FROM igracka JOIN kategorijaIgracke ON igracka.kategorijaIgrackeID=kategorijaIgracke.kategorijaIgrackeID WHERE kategorijaIgracke.nazivKategorije='".$nazivKategorije."'";
   
    return mysqli_query($this->conn, $this->sql);

 }


}
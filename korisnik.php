<?php

class Korisnik{

    private $ime;
    private $prezime;
    private $korisnickoIme;
    private $lozinka;
    private $adresa;
    private $email;
    private $telefon;
    private $status;

    public function __construct($ime, $prezime, $korisnickoIme, $lozinka, $adresa, $email, $telefon, $status){
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->korisnickoIme = $korisnickoIme;
        $this->lozinka = $lozinka;
        $this->adresa = $adresa;
        $this->email = $email;
        $this->telefon = $telefon;
        $this->status = $status;
    }


}

?>
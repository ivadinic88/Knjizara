<?php

class Pisac {

    public $pisacId;
    public $ime;
    public $prezime;


    public function __construct($pisacId=null,$ime=null,$prezime=null)
    {
        $this->pisacId = $pisacId;
        $this->ime=$ime;
        $this->prezime=$prezime;
    }

    public static function vratiPisce(mysqli $konekcija)
    {
        $sql = "SELECT * FROM pisac";
        $resultSet = $konekcija->query($sql);

        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }



    public static function dodajPisca($ime, $prezime, mysqli $konekcija)
    {
        $odg = $konekcija->query("INSERT INTO pisac VALUES(null, '$ime' , '$prezime' )");
        return $odg;
    }


}


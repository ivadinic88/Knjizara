<?php


class Knjiga
{

   public $knjigaId;
   public $naziv;
   public $cena;
   public $pisacId;
   public $zanrId;


    public function __construct($knjigaId=null, $naziv=null, $cena=null, $pisacId=null, $zanrId=null,)
    {
        $this->knjigaId = $knjigaId;
        $this->naziv=$naziv;
        $this->cena=$cena;
        $this->pisacId=$pisacId;
        $this->zanrId=$zanrId;
    }

    public static function pretraziKnjige($zanr="0", $cena="asc", mysqli $konekcija)
    {
        $sql = "SELECT * FROM knjiga k join pisac p on k.pisacId = p.pisacId join zanr z on k.zanrId = z.zanrId";

        if($zanr != "0"){
            $sql .= " WHERE k.zanrId = " . $zanr;
        }


        $sql.= " ORDER BY k.cena " . $cena;

        $resultSet = $konekcija->query($sql);

        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }

    public static function dodajKnjigu($naziv, $cena, $pisacID, $zanrId, mysqli $konekcija)
    {
        $odg = $konekcija->query("INSERT INTO knjiga VALUES(null, '$naziv' , '$cena', '$pisacID' , $zanrId)");
        return $odg;
    }

    public static function izmeniKnjigu($knjigaId, $naziv, $zanrId, $cena, $pisacId , $konekcija)
    {
        $odg = $konekcija->query("UPDATE knjiga SET naziv = '$naziv', cena = '$cena', zanrId = '$zanrId', pisacId = '$pisacId' WHERE knjigaid = $knjigaId");
        return $odg;
    }

    public static function obrisiKnjigu($knjigaId, mysqli $konekcija)
    {
        $odg = $konekcija->query("DELETE FROM knjiga WHERE knjigaid = $knjigaId");
        return $odg;
    }
}
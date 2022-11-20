<?php

require "konekcija.php";

$korisnik="";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if (isset($_COOKIE["podaciOUseru"])){

    $korisnik=" &hearts; Korisnik: " . $_COOKIE["podaciOUseru"] . " &hearts;";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bookland</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

    <div id="header">
        <p id="korisnik"><?= $korisnik; ?></p>
    </div>
    <div id="header2"></div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row" id="rowc">
                <div class="col-md-5">
                <label for="procitano">Zanr</label>
                    <select class="form-control" id="zanr" onchange="pretraziKnjige()">
                        <option value="0">Svi zanrovi</option>
                        <option value="1">Istorijski roman</option>
                        <option value="2">Drama</option>
                        <option value="3">Ljubavni roman</option>
                        <option value="4">Novela</option>
                        <option value="5">Klasik</option>
                        <option value="6">Krimi/Triler</option>
                    </select>
                </div>
                <div class="col-md-5">
                <label for="cena">Sortiraj po ceni</label>
                    <select class="form-control" id="cena" onchange="pretraziKnjige()">
                        <option value="asc">Prvo najjeftinije</option>
                        <option value="desc">Prvo najskuplje</option>
                    </select>
                </div>
            </div>
            </div>
            <br/>
            <br/>
            <div class="row g-4" id="pretraga" >
            </div>
        
            <center>
            <a href="dodajKnjigu.php", class="BtnForm">Dodaj knjigu</a>
            <a href="dodajPisca.php", class="BtnForm">Dodaj pisca</a>
            <a href="izmeni.php", class="BtnForm">Izmeni knjigu</a>
            <a href="obrisi.php", class="BtnForm">Obrisi knjigu</a>
            </center>

        </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function srediTabelu() {
            let zanr = '0';
            let cena = 'asc';
            $.ajax({
                url: "pretragaKnjiga.php",
                data: {
                    zanr: zanr,
                    cena: cena
                },
                success: function (podaci) {
                    $("#pretraga").html(podaci);
                    pretraziKnjige();
                }
            });
        }
        srediTabelu();

        function pretraziKnjige() {
            let zanr = $("#zanr").val();
            let cena = $("#cena").val();
            $.ajax({
                url: 'pretragaKnjiga.php',
                data: {
                    zanr: zanr,
                    cena: cena
                },
                success: function (data) {
                    $("#pretraga").html(data);
                }
            });
        }

    </script>

</body>
</html>

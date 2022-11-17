<?php

require "konekcija.php";
require "models/Pisac.php";
require "models/User.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$odg = "";

if(isset($_POST['dodaj'])){
    $ime = trim($_POST['ime']);
    $prezime = trim($_POST['prezime']);

    if(Pisac::dodajPisca($ime, $prezime, $kon)){
        header("Location: pocetna.php");
    }else{
        $odg = "Server ne može da sačuva pisca";
    }

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
   
    <div id="header"></div>
    <div id="header2"></div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" data-wow-delay="0.1s" style="max-width: 600px;">
                <h3 id="por"><?= $odg; ?></h3>
            </div>
            <div class="row">
                <form method="post" action="">
                    <label for="ime">Ime</label>
                    <input type="text" id="ime" name="ime" class="form-control">
                    <label for="prezime">Prezime</label>
                    <input type="text" id="prezime" name="prezime" class="form-control">
                    <br>
                    <button class="BtnForm" type="submit" name="dodaj" >Sacuvaj</button>
                    <br><br>
                    <a href="pocetna.php", class="BtnForm">Nazad</a>

                </form>
            </div>
            <div style="height: 155px"></div>
            <br/>
            <br/>

        </div>
    </div>
 
    <div id="footer"></div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
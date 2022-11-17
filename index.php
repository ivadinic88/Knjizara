<?php

require "konekcija.php";
require "models/User.php";

$odg = "";

session_start();
if(isset($_POST['username']) && isset($_POST['password'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $korisnik = new User(1, $user, $pass);
    $odgovor = User::login($korisnik, $kon);

    
    if($odgovor->num_rows==1){
      
        $_SESSION['user_id'] = $korisnik->id;
        setcookie("podaciOUseru", $user, time() + 2 * 60 * 60);
        header('Location: pocetna.php');
        exit();
    }else{
        $odg="Pogrešni kredencijali, pokusajte ponovo!";
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
    <br><br><br><br><br>
<div class="login-form">
        <div class="main-div">
            <form method="post" action="">
            <div class="text-center mx-auto mb-5" data-wow-delay="0.1s" style="max-width: 600px;">
                <h3 id="por" style="color: rgb(168, 115, 157) !important; font-family: 'Open Sans',sans-serif"><?= $odg; ?></h3>
            </div>
                <div class="container"><center>
                    <label class="username">Korisničko ime</label>
                    <input type="text" name="username" class="form-control" required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <br>
                    <button type="submit" class="BtnFormL" name="submit">Prijavi se</button>
                </div></center>

            </form>
        </div>

        
    </div>
</body>
</html>
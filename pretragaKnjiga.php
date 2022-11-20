<?php
require "konekcija.php";
require "models/Knjiga.php";

$zanr = trim($_GET['zanr']);
$cena = trim($_GET['cena']);

$knjige = Knjiga::pretraziKnjige($zanr, $cena, $kon);

?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Naziv</th>
            <th>Zanr</th>
            <th>Pisac</th>
            <th>Cena</th>
        </tr>
    </thead>
    <tbody>
 <?php

foreach ($knjige as $knjiga){
    ?>
    <tr>
        <td><?= $knjiga->naziv ?></td>
        <td><?= $knjiga->zanr?></td>
        <td><?= $knjiga->ime . " " . $knjiga->prezime ?></td>
        <td><?= $knjiga->cena ?></td>
    </tr>
<?php
}
?>
    </tbody>
</table>


<?php
require "konekcija.php";
require "models/Zanr.php";

$zanrovi = Zanr::vratiZanrove($kon);

foreach ($zanrovi as $zanr){

?>
    <option value="<?= $zanr->zanrId ?>"><?= $zanr->zanr ?> </option>

<?php
}
?>
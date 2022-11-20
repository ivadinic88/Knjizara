<?php
require "konekcija.php";
require "models/Pisac.php";

$pisci = Pisac::vratiPisce($kon);

foreach ($pisci as $pisac){

?>
    <option value="<?= $pisac->pisacId ?>"><?=$pisac->ime . " " . $pisac->prezime ?> </option>

<?php
}
?>
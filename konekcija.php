<?php
$host = "localhost";
$db = "knjizara";
$user = "root";
$pass = "";

$kon = new mysqli($host,$user,$pass,$db);

$kon->set_charset('utf8');

if ($kon->connect_errno){
    exit("Greska:".$kon->connect_error.", kod:".$kon->connect_errno);
}
?>
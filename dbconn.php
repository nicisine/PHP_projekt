<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auto_servis";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Greška pri spajanju na bazu: " . mysqli_connect_error());
}
?>

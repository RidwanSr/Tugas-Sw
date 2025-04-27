<?php
$host = "localhost";
$user = "root"; // default user XAMPP
$pass = "";     // password default XAMPP kosong
$db   = "db_login";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>

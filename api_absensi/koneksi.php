<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_absensi"; 

$konek = mysqli_connect($host, $user, $pass, $db);

if (!$konek) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
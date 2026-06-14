<?php
include 'koneksi.php';

$nim = $_POST['nim'];
$password = $_POST['password']; 
$query = "SELECT * FROM mahasiswa WHERE nim = '$nim' AND password = '$password'";
$result = mysqli_query($konek, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Login Berhasil!";
} else {
    echo "Login Gagal! NIM atau Password salah.";
}
?>
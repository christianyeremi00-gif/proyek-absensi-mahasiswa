<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nim    = $_POST['nim'];
    $id_mk  = $_POST['id_mk'];
    $status = $_POST['status'];

    if (!empty($nim) && !empty($id_mk) && !empty($status)) {
        
        $query = "INSERT INTO absensi (nim, id_mk, waktu_absen, status) 
                  VALUES ('$nim', '$id_mk', NOW(), '$status')";

        if (mysqli_query($konek, $query)) {
            echo "Absensi berhasil disimpan ke database!";
        } else {
            echo "Gagal menyimpan data: " . mysqli_error($konek);
        }

    } else {
        echo "Gagal: Data tidak lengkap!";
    }
} else {
    echo "Gagal: Metode request harus POST!";
}

mysqli_close($konek);
?>
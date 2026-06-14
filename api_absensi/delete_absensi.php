<?php
include 'koneksi.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM absensi WHERE id = '$id'";
    
    if(mysqli_query($conn, $query)) {
        echo "success";
    } else {
        echo "failed";
    }
}
?>
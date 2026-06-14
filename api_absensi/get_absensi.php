<?php
include 'koneksi.php';


$query = "SELECT * FROM absensi";
$result = mysqli_query($konek, $query);

$data = array();
while($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>
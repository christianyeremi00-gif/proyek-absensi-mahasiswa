<?php 
require_once "config.php"; 
 
$input = json_decode(file_get_contents("php://input"), true); 
 
$nim = $conn->real_escape_string($input['nim']); 
$nama = $conn->real_escape_string($input['nama']); 
$jurusan = $conn->real_escape_string($input['jurusan']); 
$email = $conn->real_escape_string($input['email']); 
 
// Cek apakah NIM sudah ada 
$check = $conn->query("SELECT id FROM mahasiswa WHERE nim='$nim'"); 
if ($check->num_rows > 0) { 
    echo json_encode([ 
        "status" => "error", 
        "message" => "NIM sudah terdaftar" 
    ]); 
    $conn->close(); 
    exit(); 
} 
 
$sql = "INSERT INTO mahasiswa (nim, nama, jurusan, email) VALUES ('$nim', '$nama', 
'$jurusan', '$email')"; 
 
if ($conn->query($sql)) { 
    echo json_encode([ 
        "status" => "success", 
        "message" => "Data berhasil ditambahkan" 
    ]); 
} else { 
    echo json_encode([ 
        "status" => "error", 
        "message" => "Gagal menambahkan: " . $conn->error 
    ]); 
} 
 
$conn->close(); 
?>
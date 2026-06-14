<?php 
require_once "config.php"; 
$input = json_decode(file_get_contents("php://input"), true); 
$id = (int)$input['id']; 
$nim = $conn->real_escape_string($input['nim']); 
$nama = $conn->real_escape_string($input['nama']); 
$jurusan = $conn->real_escape_string($input['jurusan']); 
$email = $conn->real_escape_string($input['email']); 
// Cek apakah data dengan id tersebut ada 
$check = $conn->query("SELECT id FROM mahasiswa WHERE id=$id"); 
if ($check->num_rows == 0) { 
echo json_encode([ 
"status" => "error", 
"message" => "Data tidak ditemukan" 
]); 
$conn->close(); 
exit(); 
} 
// Cek apakah NIM sudah dipakai oleh mahasiswa lain 
$check = $conn->query("SELECT id FROM mahasiswa WHERE nim='$nim' AND id != $id"); 
if ($check->num_rows > 0) { 
    echo json_encode([ 
        "status" => "error", 
        "message" => "NIM sudah digunakan mahasiswa lain" 
    ]); 
    $conn->close(); 
    exit(); 
} 
 
$sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan', 
email='$email' WHERE id=$id"; 
 
if ($conn->query($sql)) { 
    echo json_encode([ 
        "status" => "success", 
        "message" => "Data berhasil diupdate" 
    ]); 
} else { 
    echo json_encode([ 
        "status" => "error", 
        "message" => "Gagal mengupdate: " . $conn->error 
    ]); 
} 
 
$conn->close(); 
?>
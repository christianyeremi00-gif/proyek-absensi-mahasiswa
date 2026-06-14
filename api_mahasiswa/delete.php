<?php 
require_once "config.php"; 
 
$input = json_decode(file_get_contents("php://input"), true); 
$id = (int)$input['id']; 
 
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
 
$sql = "DELETE FROM mahasiswa WHERE id=$id"; 
 
if ($conn->query($sql)) { 
    echo json_encode([ 
        "status" => "success", 
        "message" => "Data berhasil dihapus" 
    ]); 
} else { 
    echo json_encode([ 
        "status" => "error", 
        "message" => "Gagal menghapus: " . $conn->error 
]); 
} 
$conn->close(); 
?>
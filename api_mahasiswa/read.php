<?php 
require_once "config.php"; 
$sql = "SELECT * FROM mahasiswa ORDER BY id DESC"; 
$result = $conn->query($sql); 
$data = []; 
while ($row = $result->fetch_assoc()) { 
$data[] = $row; 
} 
// Mengembalikan format yang diharapkan Android 
echo json_encode([ 
"status" => "success", 
"data" => $data 
]); 
$conn->close(); 
?>
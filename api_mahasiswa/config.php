<?php 
header("Content-Type: application/json"); 
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, 
Authorization, X-Requested-With"); 
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { 
http_response_code(200); 
exit(); 
} 
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db = "db_mahasiswa"; 
 
$conn = new mysqli($host, $user, $pass, $db); 
 
if ($conn->connect_error) { 
    die(json_encode([ 
        "status" => "error", 
        "message" => "Koneksi gagal: " . $conn->connect_error 
    ])); 
} 
?>
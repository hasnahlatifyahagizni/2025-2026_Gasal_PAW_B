<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$database = 'db_laporan7'; 

try {
    $conn = mysqli_connect($host, $username, $password, $database);
} catch (Exception $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
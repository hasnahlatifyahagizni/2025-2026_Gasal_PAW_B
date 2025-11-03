<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
mysqli_query($conn, $sql);
mysqli_select_db($conn, $dbname);

$sql = "CREATE TABLE IF NOT EXISTS suppliers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    telp VARCHAR(20) NOT NULL,
    alamat VARCHAR(255) NOT NULL
)";
mysqli_query($conn, $sql);

$sql = "INSERT INTO suppliers (nama, telp, alamat) VALUES
    ('PT. Maju Bersama', '08727323823', 'Surabaya'),
    ('PT. Senang Sekali', '08123456789', 'Bangkalan'),
    ('PT. Segar Segar', '08234567890', 'Surabaya')";
mysqli_query($conn, $sql);

echo "Database dan tabel siap digunakan";
mysqli_close($conn);
?>

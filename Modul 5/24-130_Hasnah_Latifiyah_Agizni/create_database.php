<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Koneksi ke MySQL
$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Membuat database jika belum ada
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
mysqli_query($conn, $sql);
mysqli_select_db($conn, $dbname);

// Membuat tabel suppliers jika belum ada
$sql = "CREATE TABLE IF NOT EXISTS suppliers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    telp VARCHAR(20) NOT NULL,
    alamat VARCHAR(255) NOT NULL
)";
mysqli_query($conn, $sql);

// Cek apakah tabel kosong sebelum menambahkan data awal
$sql_check = "SELECT COUNT(*) AS total FROM suppliers";
$result_check = mysqli_query($conn, $sql_check);
$row_check = mysqli_fetch_assoc($result_check);

if($row_check['total'] == 0) {
    // Hanya insert data jika tabel masih kosong
    $sql_insert = "INSERT INTO suppliers (nama, telp, alamat) VALUES
        ('PT. Maju Bersama', '08727323823', 'Surabaya'),
        ('PT. Senang Sekali', '08123456789', 'Bangkalan'),
        ('PT. Segar Segar', '08234567890', 'Surabaya')";
    mysqli_query($conn, $sql_insert);
}

echo "Database dan tabel siap digunakan";
mysqli_close($conn);
?>

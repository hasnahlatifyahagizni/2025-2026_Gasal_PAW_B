<?php
session_start();
include 'config.php';
include 'validate.inc';

// Ambil data POST
$nama   = $_POST['nama'] ?? '';
$telp   = $_POST['telp'] ?? '';
$alamat = $_POST['alamat'] ?? '';

// Array untuk menampung error
$errors = [];

// VALIDASI
validateName($errors, $_POST, 'nama');     
validatePhone($errors, $_POST, 'telp');    
validateNotEmpty($errors, $_POST, 'alamat'); 

// Jika ada error kembali ke form
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST; 
    header("Location: create.php");
    exit;
}

// Jika lolos validasi INSERT ke database
$query = "INSERT INTO suppliers (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
mysqli_query($conn, $query);

header("Location: index.php");
exit;
?>

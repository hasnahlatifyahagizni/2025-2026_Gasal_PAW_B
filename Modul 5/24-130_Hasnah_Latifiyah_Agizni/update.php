<?php
session_start();
include 'config.php';
include 'validate.inc';

$id     = $_POST['id'] ?? 0;
$nama   = $_POST['nama'] ?? '';
$telp   = $_POST['telp'] ?? '';
$alamat = $_POST['alamat'] ?? '';

$errors = [];

validateName($errors, $_POST, 'nama');
validatePhone($errors, $_POST, 'telp');
validateNotEmpty($errors, $_POST, 'alamat');

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("Location: edit.php?id=$id");
    exit;
}

mysqli_query($conn, "UPDATE suppliers SET 
    nama='$nama',
    telp='$telp',
    alamat='$alamat'
    WHERE id=$id
");

header("Location: index.php");
exit;
?>

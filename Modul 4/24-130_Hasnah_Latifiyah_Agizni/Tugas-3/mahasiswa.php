<?php
$errors = [];
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    require 'validate.inc';

    // Validasi field
    validateNama($errors, $data, 'nama');
    validateNIM($errors, $data, 'nim');
    validateEmail($errors, $data, 'email');
    validateJurusan($errors, $data, 'jurusan');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Data Mahasiswa</title>
</head>
<body>
    <h2>Form Input Data Mahasiswa</h2>

    <?php
    // Tampilkan error jika ada
    if (!empty($errors)) {
        foreach ($errors as $field => $error) {
            echo "$field: $error<br>";
        }
    }

    // Tampilkan data yang berhasil submit jika tidak ada error
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
        echo "Data berhasil disubmit!<br>";
        // Hanya tampilkan nama, nim, email, jurusan
        foreach (['nama','nim','email','jurusan'] as $key) {
            if (isset($data[$key])) {
                echo "$key: ".htmlspecialchars($data[$key])."<br>";
            }
        }
    }
    // Include form
    include 'form.inc';
    ?>
</body>
</html>

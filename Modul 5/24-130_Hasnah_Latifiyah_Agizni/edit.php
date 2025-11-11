<?php
include 'config.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM suppliers WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Data dengan ID $id tidak ditemukan.");
}

session_start();
$errors = $_SESSION['errors'] ?? [];
session_unset();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Supplier</title>
<style>
body { font-family: Arial; margin: 30px; }
h2 { color: #40c4ff; font-size: 24px; font-weight: normal; text-align: left; }
hr { border: none; border-top: 1px solid #000; margin-bottom: 20px; }
form { max-width: 500px; margin: 0 auto; }
.form-group { margin-bottom: 18px; }
.form-row { display: flex; align-items: center; }
label { width: 90px; font-size: 14px; }
input[type="text"], input[type="tel"] { flex: 1; padding: 6px; font-size: 14px; }
input[name="telp"], input[name="alamat"] {width: 300px !important;flex: unset !important;}
.error-text { color: red; font-size: 13px; margin-left: 90px; display: block;}
.btn-group { display: flex; margin-left: 90px; margin-top: 10px; }
.btn { padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px; }
.btn-save { background-color: #4CAF50; color: white; }
.btn-cancel { background-color: #f44336; color: white; text-decoration: none; padding: 8px 16px; border-radius: 4px; }
</style>
</head>
<body>

<h2>Edit Data Master Supplier</h2>
<hr>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">

    <div class="form-group">
        <div class="form-row">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?= $row['nama']; ?>" placeholder="Nama" required>
        </div>
        <?php if(isset($errors['nama'])): ?>
            <small class="error-text"><?= $errors['nama']; ?></small>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <div class="form-row">
            <label>Telp:</label>
            <input type="tel" name="telp" value="<?= $row['telp']; ?>" placeholder="Telp" required>
        </div>
        <?php if(isset($errors['telp'])): ?>
            <small class="error-text"><?= $errors['telp']; ?></small>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <div class="form-row">
            <label>Alamat:</label>
            <input type="text" name="alamat" value="<?= $row['alamat']; ?>" placeholder="Alamat" required>
        </div>
        <?php if(isset($errors['alamat'])): ?>
            <small class="error-text"><?= $errors['alamat']; ?></small>
        <?php endif; ?>
    </div>

    <div class="btn-group">
        <button type="submit" class="btn btn-save">Update</button>
        <a href="index.php" class="btn btn-cancel">Batal</a>
    </div>

</form>
</body>
</html>

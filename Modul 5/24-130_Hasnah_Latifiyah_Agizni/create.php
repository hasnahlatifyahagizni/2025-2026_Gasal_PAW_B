<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
session_unset();
?>

<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Supplier</title>
<style>
body { font-family: Arial; margin: 30px; }
h2 { color: #40c4ff; font-size: 22px; font-weight: normal; text-align: left; }
hr { border: none; border-top: 1px solid #000; margin-bottom: 20px; }
form { max-width: 500px; margin: 0 auto; }
.form-group { margin-bottom: 18px; }
.form-row { display: flex; align-items: center; }
label { width: 80px; margin-right: 10px; text-align: left; }
input[type="text"], input[type="tel"] { flex: 1; padding: 5px; }
input[name="telp"], input[name="alamat"] {width: 300px !important;flex: unset !important;}
.error-text { color: red; font-size: 13px; margin-left: 90px; display: block; margin-top: 3px; }
.btn-group { display: flex; margin-left: 90px; margin-top: 5px; }
.btn { padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px; }
.btn-save { background-color: #4CAF50; color: white; }
.btn-cancel { background-color: #f44336; color: white; text-decoration: none; padding: 8px 16px; border-radius: 4px; }
</style>
</head>
<body>

<h2>Tambah Data Master Supplier Baru</h2>
<hr>

<form action="store.php" method="POST">
    
    <!-- NAMA -->
    <div class="form-group">
        <div class="form-row">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?= $old['nama'] ?? '' ?>" placeholder="Nama" size="40" required>
        </div>
        <?php if(isset($errors['nama'])): ?>
            <small class="error-text"><?= $errors['nama']; ?></small>
        <?php endif; ?>
    </div>

    <!-- TELP -->
    <div class="form-group">
        <div class="form-row">
            <label>Telp:</label>
            <input type="tel" name="telp" value="<?= $old['telp'] ?? '' ?>" placeholder="Telp" required>
        </div>
        <?php if(isset($errors['telp'])): ?>
            <small class="error-text"><?= $errors['telp']; ?></small>
        <?php endif; ?>
    </div>

    <!-- ALAMAT -->
    <div class="form-group">
        <div class="form-row">
            <label>Alamat:</label>
            <input type="text" name="alamat" value="<?= $old['alamat'] ?? '' ?>" placeholder="Alamat" required>
        </div>
        <?php if(isset($errors['alamat'])): ?>
            <small class="error-text"><?= $errors['alamat']; ?></small>
        <?php endif; ?>
    </div>

    <div class="btn-group">
        <button type="submit" class="btn btn-save">Simpan</button>
        <a href="index.php" class="btn btn-cancel">Batal</a>
    </div>

</form>
</body>
</html>
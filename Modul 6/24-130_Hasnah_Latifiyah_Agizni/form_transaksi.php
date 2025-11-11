<?php
include "koneksi.php";
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Transaksi Penjualan</title>
</head>
<body>
    <h2>Form Input Transaksi Penjualan</h2>

    <?php
    if (isset($_SESSION['pesan'])) {
        echo "<p style='color: green;'>" . $_SESSION['pesan'] . "</p>";
        unset($_SESSION['pesan']);
    }
    ?>

    <form action="simpan_transaksi.php" method="POST">
        <label>Nama Pelanggan:</label><br>
        <input type="text" name="nama_pelanggan" required><br><br>

        <label>Tanggal Nota:</label><br>
        <input type="date" name="tgl_nota" required><br><br>

        <label>Keterangan:</label><br>
        <textarea name="keterangan" rows="3" cols="30" placeholder="Tulis keterangan transaksi..."></textarea><br><br>

        <h3>Detail Barang</h3>
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" required><br><br>

        <label>Jumlah:</label><br>
        <input type="number" name="jumlah" required><br><br>

        <label>Harga Satuan:</label><br>
        <input type="number" name="harga" required><br><br>

        <input type="submit" name="submit" value="Simpan Transaksi">
    </form>
</body>
</html>
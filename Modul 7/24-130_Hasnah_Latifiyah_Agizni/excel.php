<?php
// Tipe file Excel
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
// Download file dengan nama laporan_modul7.xls
header("Content-Disposition: attachment; filename=laporan_modul7.xls");

require 'koneksi.php';

$tanggalAwal  = $_GET['tgl_awal'];
$tanggalAkhir = $_GET['tgl_akhir'];

$queryRekap = "
    SELECT tanggal, SUM(total) AS total_harian
    FROM transaksi
    WHERE tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
    GROUP BY tanggal
    ORDER BY tanggal ASC
";
$hasilRekap = mysqli_query($conn, $queryRekap);

$queryTotal = "
    SELECT 
        COUNT(DISTINCT pelanggan_id) AS total_pelanggan,
        SUM(total) AS total_pendapatan
    FROM transaksi
    WHERE tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
";
$hasilTotal = mysqli_query($conn, $queryTotal);
$totalData = mysqli_fetch_assoc($hasilTotal);
?>

<!-- Tabel rekap transaksi -->
<table border="1">
    <tr style="background:#cce7ff;">
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>
    <?php 
    $no = 1;
    while ($row = mysqli_fetch_assoc($hasilRekap)): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['total_harian'] ?></td>
        <td><?= $row['tanggal'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<br>

<!-- Tabel total pelanggan & pendapatan -->
<table border="1">
    <tr style="background:#cce7ff;">
        <th>Total Pelanggan</th>
        <th>Total Pendapatan</th>
    </tr>
    <tr>
        <td><?= $totalData['total_pelanggan'] ?></td>
        <td><?= $totalData['total_pendapatan'] ?></td>
    </tr>
</table>

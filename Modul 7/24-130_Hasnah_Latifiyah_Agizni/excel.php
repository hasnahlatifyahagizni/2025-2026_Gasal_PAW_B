<?php
// header untuk download excel
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=laporan_modul7.xls");

require 'koneksi.php';

$tanggalAwal  = $_GET['tgl_awal'];
$tanggalAkhir = $_GET['tgl_akhir'];

// Query rekap harian
$queryRekap = "
    SELECT tanggal, SUM(total) AS total_harian
    FROM transaksi
    WHERE tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
    GROUP BY tanggal
    ORDER BY tanggal ASC
";
$hasilRekap = mysqli_query($conn, $queryRekap);

// Query total keseluruhan
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

<b>Rekap Laporan Transaksi</b><br>
Periode: <?= $tanggalAwal ?> s/d <?= $tanggalAkhir ?><br> 
<br><br>

<table>
    <tr>
        <td><b>No</b></td>
        <td><b>Total</b></td>
        <td><b>Tanggal</b></td>
    </tr>

    <?php 
    $no = 1;
    while ($row = mysqli_fetch_assoc($hasilRekap)): ?>
    <tr>
         <td><?= $no++ ?></td>
        <td><?= 'Rp. ' . number_format($row['total_harian'], 0, ',', '.') ?></td>
        <td><?= $row['tanggal'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<br><br>

<table>
    <tr>
        <td><b>Jumlah Pelanggan</b></td>
        <td><b>Jumlah Pendapatan</b></td>
    </tr>
    <tr>
        <td><?= $totalData['total_pelanggan'] . ' orang' ?></td>
        <td><?= 'Rp. ' . number_format($totalData['total_pendapatan'], 0, ',', '.') ?></td>
    </tr>
</table>
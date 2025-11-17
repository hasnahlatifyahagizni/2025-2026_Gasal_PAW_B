<?php 
require 'koneksi.php';

$tanggalAwal  = $_GET['tgl_awal'];
$tanggalAkhir = $_GET['tgl_akhir'];

$rekapTransaksi = [];
$daftarTanggal = [];
$daftarTotal = [];

//query rekap transaksi
$queryRekap = "
    SELECT tanggal, SUM(total) AS total_harian
    FROM transaksi
    WHERE tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
    GROUP BY tanggal
    ORDER BY tanggal ASC
";
$hasilRekap = mysqli_query($conn, $queryRekap);

while ($row = mysqli_fetch_assoc($hasilRekap)) {
    $rekapTransaksi[] = $row;
    $daftarTanggal[]  = $row['tanggal'];
    $daftarTotal[]    = $row['total_harian'];
}

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

<!DOCTYPE html>
<html>
<head>
    <title>Print Laporan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Laporan Transaksi</h2>
Periode: <?= $tanggalAwal ?> s/d <?= $tanggalAkhir ?>

<br><br>

<!-- TOMBOL -->
<button onclick="window.print()">&#128424; Cetak</button>
<button onclick="history.back()">Kembali</button>
<button onclick="window.location.href='excel.php?tgl_awal=<?= $tanggalAwal ?>&tgl_akhir=<?= $tanggalAkhir ?>'">&#128200; Excel</button>

<br><br>

<!-- GRAFIK -->
<canvas id="grafikPrint" width="400" height="200"></canvas>
<script>
new Chart(document.getElementById('grafikPrint'), {
    type:'bar',
    data:{
        labels: <?= json_encode($daftarTanggal) ?>,
        datasets:[{
            label:'Total Penerimaan',
            data: <?= json_encode($daftarTotal) ?>,
            borderWidth: 1
        }]
    }
});
</script>

<br>

<!-- REKAP -->
<h3>Rekap Penerimaan</h3>
<table>
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>
    <?php $no=1; foreach ($rekapTransaksi as $data): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['total_harian'] ?></td>
        <td><?= $data['tanggal'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<br>

<!-- TOTAL -->
<h3>Total</h3>
<table>
    <tr>
        <th>Total Pelanggan</th>
        <th>Total Pendapatan</th>
    </tr>
    <tr>
        <td><?= $totalData['total_pelanggan'] ?></td>
        <td><?= $totalData['total_pendapatan'] ?></td>
    </tr>
</table>

</body>
</html>
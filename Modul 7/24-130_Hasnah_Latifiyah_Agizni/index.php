<?php 
require 'koneksi.php';

// Ambil filter tanggal dari form
$tanggalAwal  = $_GET['tgl_awal'] ?? '';
$tanggalAkhir = $_GET['tgl_akhir'] ?? '';

// Inisialisasi array dan variabel untuk menampung data laporan
$rekapTransaksi = [];
$daftarTanggal = [];
$daftarTotal = [];
$totalPelanggan = 0;
$totalPendapatan = 0;

if ($tanggalAwal && $tanggalAkhir) {

    // Query rekap total per tanggal
    $queryRekap = "
        SELECT tanggal, SUM(total) AS total_harian
        FROM transaksi
        WHERE tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
        GROUP BY tanggal
        ORDER BY tanggal ASC
    ";
    $hasilRekap = mysqli_query($conn, $queryRekap);

    // Simpan hasil query ke array
    while ($rekap = mysqli_fetch_assoc($hasilRekap)) {
        $rekapTransaksi[] = $rekap;
        $daftarTanggal[]  = $rekap['tanggal'];
        $daftarTotal[]    = $rekap['total_harian'];
    }

    //  Query total & pendapatan
    $queryTotal = "
        SELECT 
            COUNT(DISTINCT pelanggan_id) AS total_pelanggan,
            SUM(total) AS total_pendapatan
        FROM transaksi
        WHERE tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
    ";
    $hasilTotal = mysqli_query($conn, $queryTotal);
    $totalData = mysqli_fetch_assoc($hasilTotal);

    $totalPelanggan  = $totalData['total_pelanggan'];
    $totalPendapatan = $totalData['total_pendapatan'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Modul 7</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h2>Laporan Transaksi Modul 7</h2>

<!-- FILTER TANGGAL -->
<form method="GET">
    <input type="date" name="tgl_awal" required value="<?= $tanggalAwal ?>">
    <input type="date" name="tgl_akhir" required value="<?= $tanggalAkhir ?>">
    <button type="submit">Cari</button>
</form>

<br>

<?php if ($tanggalAwal && $tanggalAkhir): ?>

<!-- TOMBOL CETAK & EXCEL -->
<button onclick="window.location.href='print.php?tgl_awal=<?= $tanggalAwal ?>&tgl_akhir=<?= $tanggalAkhir ?>'">
    &#128424; Cetak
</button>

<button onclick="window.location.href='excel.php?tgl_awal=<?= $tanggalAwal ?>&tgl_akhir=<?= $tanggalAkhir ?>'">
    &#128200; Excel
</button>

<br><br>

<!-- GRAFIK -->
<canvas id="grafikTransaksi" width="400" height="200"></canvas>
<script>
new Chart(document.getElementById('grafikTransaksi'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($daftarTanggal) ?>,
        datasets: [{
            label: 'Total Penerimaan',
            data: <?= json_encode($daftarTotal) ?>,
            borderWidth: 1
        }]
    },
    options: {
        scales: { y: { beginAtZero: true } }
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
        <td><?= $totalPelanggan ?></td>
        <td><?= $totalPendapatan ?></td>
    </tr>
</table>

<?php endif; ?>
</body>
</html>
<?php 
require 'koneksi.php'; 

// ambil tanggal dari input form
$tanggalAwal  = $_GET['tgl_awal'] ?? '';
$tanggalAkhir = $_GET['tgl_akhir'] ?? '';

// variabel untuk menampung data
$rekapTransaksi = [];
$daftarTanggal = [];
$daftarTotal = [];
$totalPelanggan = 0;
$totalPendapatan = 0;

if ($tanggalAwal && $tanggalAkhir) {

    // query untuk rekap per tanggal
    $queryRekap = "
        SELECT tanggal, SUM(total) AS total_harian
        FROM transaksi
        WHERE tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
        GROUP BY tanggal
        ORDER BY tanggal ASC
    ";

    $hasilRekap = mysqli_query($conn, $queryRekap);

    // simpan hasil rekap ke array
    while ($rekap = mysqli_fetch_assoc($hasilRekap)) {
        $rekapTransaksi[] = $rekap;
        $daftarTanggal[]  = $rekap['tanggal'];
        $daftarTotal[]    = $rekap['total_harian'];
    }

    // query untuk total keseluruhan
    $queryTotal = "
        SELECT 
            COUNT(DISTINCT pelanggan_id) AS total_pelanggan,
            SUM(total) AS total_pendapatan
        FROM transaksi
        WHERE tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
    ";

    $hasilTotal = mysqli_query($conn, $queryTotal);
    $totalData = mysqli_fetch_assoc($hasilTotal);

    // simpan ke variabel
    $totalPelanggan  = $totalData['total_pelanggan'];
    $totalPendapatan = $totalData['total_pendapatan'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Modul 7</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { font-family: Arial; margin: 20px; }
        h2, h3 { margin-bottom: 5px; }
        button {
            padding: 8px 14px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
        button:hover { background: #1f7c35; }
        table { border-collapse: collapse; width: 60%; margin-top: 10px; }
        table th, table td { border: 1px solid #777; padding: 8px; }
        table th { background: #cce7ff; }
    </style>
</head>

<body>

<h2>Laporan Transaksi Modul 7</h2>

<!-- FORM FILTER TANGGAL -->
<form method="GET">
    <input type="date" name="tgl_awal" required value="<?= $tanggalAwal ?>">
    <input type="date" name="tgl_akhir" required value="<?= $tanggalAkhir ?>">
    <button type="submit">Cari</button>
</form>

<br>

<?php if ($tanggalAwal && $tanggalAkhir): ?>

<!-- tombol cetak dan excel -->
<button onclick="window.print()">&#128424; Cetak</button>
<button onclick="window.location.href='excel.php?tgl_awal=<?= $tanggalAwal ?>&tgl_akhir=<?= $tanggalAkhir ?>'">&#128200; Excel</button>

<br><br>

<!-- GRAFIK -->
<canvas id="grafikTransaksi" width="400" height="200"></canvas>
<script>
new Chart(document.getElementById('grafikTransaksi'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($daftarTanggal) ?>, // tanggal
        datasets: [{
            label: 'Total Penerimaan',
            data: <?= json_encode($daftarTotal) ?>, // total harian
            borderWidth: 1
        }]
    },
    options: { scales: { y: { beginAtZero: true } } }
});
</script>

<br>

<!-- TABEL REKAP -->
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
        <td><?= 'Rp. ' . number_format($data['total_harian'], 0, ',', '.') ?></td>
        <td><?= $data['tanggal'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<br>

<!-- TOTAL KESELURUHAN -->
<h3>Total</h3>
<table>
    <tr>
        <th>Jumlah Pelanggan</th>
        <th>Jumlah Pendapatan</th>
    </tr>
    <tr>
        <td><?= $totalPelanggan . ' orang' ?></td>
        <td><?= 'Rp. ' . number_format($totalPendapatan, 0, ',', '.') ?></td>
    </tr>
</table>

<?php endif; ?>

</body>
</html>
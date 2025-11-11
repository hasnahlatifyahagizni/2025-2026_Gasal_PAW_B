<?php
session_start();
include 'koneksi.php';

// Ambil data dari form
$nama_pelanggan = $_POST['nama_pelanggan'] ?? '';
$tgl_nota       = $_POST['tgl_nota'] ?? '';
$keterangan     = $_POST['keterangan'] ?? '';
$nama_barang    = $_POST['nama_barang'] ?? '';
$jumlah         = $_POST['jumlah'] ?? 0;
$harga          = $_POST['harga'] ?? 0;

$total = $jumlah * $harga;

// Simpan data master (nota)
mysqli_query($conn, "INSERT INTO nota (nama_pelanggan, tgl_nota, keterangan, total) 
                     VALUES ('$nama_pelanggan', '$tgl_nota', '$keterangan', '$total')");

// Ambil id_nota terakhir
$id_nota = mysqli_insert_id($conn);

// Simpan detail nota
mysqli_query($conn, "INSERT INTO detail_nota (id_nota, nama_barang, jumlah, harga) 
                     VALUES ('$id_nota', '$nama_barang', '$jumlah', '$harga')");

// Tampilkan hasil transaksi
echo "<h3>Transaksi berhasil disimpan!</h3>";
echo "ID Nota: $id_nota<br>";
echo "Nama Pelanggan: $nama_pelanggan<br>";
echo "Tanggal Nota: $tgl_nota<br>";
echo "Keterangan: $keterangan<br><br>";

echo "Detail Barang:<br>";
echo "Barang: $nama_barang | Jumlah: $jumlah | Harga: $harga | Subtotal: $total<br>";

echo "<br>Total Nota: $total<br>";
echo "<hr><a href='form_transaksi.php'>Kembali ke Form</a>";

$conn->close();
?>
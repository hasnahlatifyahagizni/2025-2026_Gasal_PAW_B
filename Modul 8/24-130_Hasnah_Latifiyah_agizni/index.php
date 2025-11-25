<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$level = $_SESSION['level']; 
$page  = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Penjualan</title>
    <style>
        body { font-family: Arial; }
        .navbar { 
            background:#0a2a66; 
            padding:10px; 
            color:white;
        }
        .navbar a {
            color:white;
            margin-right:15px;
            text-decoration:none;
        }
        .navbar a:hover { text-decoration:underline; }
        .right { float:right; color:white; }
        .brand { font-weight:bold; letter-spacing:1px; margin-right:20px; }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-btn {
            color:white;
            text-decoration:none;
            margin-right:15px;
            cursor:pointer;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background:#15408c;
            min-width: 150px;
            padding: 5px 0;
            border-radius: 3px;
            z-index: 1;
        }
        .dropdown-content a {
            color: white;
            padding: 8px 15px;
            display: block;
            text-decoration: none;
        }
        .dropdown-content a:hover {
            background:#193f7c;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>

<div class="navbar">
    
    <span class="brand">Sistem Penjualan</span>

    <a href="index.php?page=home">Home</a>

    <!-- LEVEL 1 -->
    <?php if($level == 1){ ?>

        <div class="dropdown">
            <span class="dropdown-btn">Data Master ▼</span>
            <div class="dropdown-content">
                <a href="index.php?page=barang">Barang</a>
                <a href="index.php?page=pelanggan">Pelanggan</a>
                <a href="index.php?page=pembayaran">Pembayaran</a>
                <a href="index.php?page=supplier">Supplier</a>
            </div>
        </div>

        <a href="index.php?page=transaksi">Transaksi</a>
        <a href="index.php?page=laporan">Laporan</a>

    <?php } ?>

    <!-- LEVEL 2 -->
    <?php if($level == 2){ ?>
        <a href="index.php?page=transaksi">Transaksi</a>
        <a href="index.php?page=laporan">Laporan</a>
    <?php } ?>

    <div class="right">
        <?= $_SESSION['user']; ?> |
        <a href="logout.php" style="color:yellow;">Logout</a>
    </div>

</div>

<div style="padding:20px;">

<!-- Menampilkan halaman sesuai menu yang diklik -->
<?php
if($page == 'home'){
    echo "<h2>Selamat Datang, ".$_SESSION['user']."!</h2>";
}
elseif($page == 'barang'){
    echo "<h2>Halaman Data Barang</h2>";
}
elseif($page == 'pelanggan'){
    echo "<h2>Halaman Data pelanggan</h2>";
}
elseif($page == 'pembayaran'){
    echo "<h2>Halaman Data pembayaran</h2>";
}
elseif($page == 'supplier'){
    echo "<h2>Halaman Data Supplier</h2>";
}
elseif($page == 'transaksi'){
    echo "<h2>Halaman Transaksi</h2>";
}
elseif($page == 'laporan'){
    echo "<h2>Halaman Laporan</h2>";
}
else{
    echo "<h2>Halaman tidak ditemukan!</h2>";
}
?>

</div>

</body>
</html>

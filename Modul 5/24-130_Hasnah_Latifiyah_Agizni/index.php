<?php
include 'config.php';

// Ambil data dari database
$result = mysqli_query($conn, "SELECT * FROM suppliers ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        h2 { color: #40c4ff; font-size: 22px; font-weight: normal; text-align: left; }
        hr { border: none; border-top: 1px solid #000; margin-bottom: 20px; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        .btn-add { background-color: #66bb6a; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #e0f7ff; }
        .btn-edit { background-color: #ff5722; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; }
        .btn-delete { background-color: #c62828; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; }
        .btn { padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px; }
        .error-text { color: red; font-size: 13px; margin-left: 0; display: block; margin-top: 3px; }
    </style>
    <script>
        function confirmDelete(id) {
            if(confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = "delete.php?id=" + id;
            }
        }
    </script>
</head>
<body>

<div class="top-bar">
    <h2>Data Master Supplier</h2>
    <a href="create.php" class="btn-add">Tambah Data</a>
</div>
<hr>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Telp</th>
        <th>Alamat</th>
        <th>Tindakan</th>
    </tr>
    <?php
    $no = 1;
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".$row['nama']."</td>";
        echo "<td>".$row['telp']."</td>";
        echo "<td>".$row['alamat']."</td>";
        echo "<td>
                <a href='edit.php?id=".$row['id']."' class='btn-edit'>Edit</a> 
                <a href='javascript:confirmDelete(".$row['id'].")' class='btn-delete'>Hapus</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
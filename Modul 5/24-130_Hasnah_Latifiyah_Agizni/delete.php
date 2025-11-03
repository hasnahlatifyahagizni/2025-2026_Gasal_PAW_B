<?php
include 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM suppliers WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan.";
}

mysqli_close($conn);
?>

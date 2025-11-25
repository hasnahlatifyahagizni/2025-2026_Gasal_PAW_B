<?php
session_start();
include "config.php";

function checkLogin($data){
    global $conn;

    $username = $data['username'];
    $password = md5($data['password']);

    // cek username dan password
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $hasil = mysqli_query($conn, $query);

    if(mysqli_num_rows($hasil) > 0){
        $user = mysqli_fetch_assoc($hasil);

        // simpan session
        $_SESSION['user']  = $user['nama'];
        $_SESSION['level'] = $user['role']; // 1 = admin, 2 = user

        header("Location: index.php");
        exit;
    }else{
        return "Username atau Password salah!";
    }
}
?>

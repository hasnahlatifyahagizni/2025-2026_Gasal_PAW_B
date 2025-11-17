<?php 

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_modul7';

try {
    $conn = mysqli_connect($host, $username, $password, $database);
} catch (Exception $error) {
    echo $error;
}

?>

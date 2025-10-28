<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'validate.inc';

    // Validasi masing-masing field
    validateName($errors, $_POST, 'surname');       // Cek nama
    validateEmail($errors, $_POST, 'email');       // Cek email
    validatePassword($errors, $_POST, 'password'); // Cek password

    if ($errors) {
        echo "<h3>Invalid, correct the following errors:</h3>";
        foreach ($errors as $field => $error) {
            echo "$field : $error<br/>";
        }

        // tampilkan kembali form
        include 'form.inc';
    } else {
        echo "<h3>Form submitted successfully with no errors!</h3>";
        include 'form.inc'; // tetap menampilkan form
    }
} else {
    include 'form.inc'; // tampilkan form pertama kali
}
?>

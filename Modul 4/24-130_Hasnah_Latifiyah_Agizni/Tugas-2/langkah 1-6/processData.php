<?php
$errors = array();

if (isset($_POST['surname'])) {
    require 'validate.inc';
    validateName($errors, $_POST, 'surname');

    if ($errors) {
        echo '<h1> Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error) {
            echo "<b>$field</b> : $error<br/>";
        }
        echo "<hr>";
        include 'form.inc'; // tampilkan kembali form
    } else {
        echo 'Form submitted successfully with no errors!';
    }
} else {
    include 'form.inc'; // tampilkan form pertama kali
}
?>
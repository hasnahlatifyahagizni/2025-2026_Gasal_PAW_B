<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Process Data</title>
</head>
<body>
    <h3 style="font-family: sans-serif;">Hasil Validasi Data:</h3>

    <?php

    require 'validate.inc';

    $errors = array(); 
    validateName($errors, $_POST, 'surname'); 
    if ($errors) {
        echo "<b>Errors:</b><br/>";
        foreach ($errors as $field => $error) {
            echo "$field : $error<br/>";
        }
    } else {
        echo "<b>Data OK!</b><br/>";
    }
    ?>
</body>
</html>
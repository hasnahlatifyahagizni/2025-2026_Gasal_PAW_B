<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Process Data</title>
</head>
<body>
    <h3 style="font-family: sans-serif;">Hasil Validasi Data:</h3>

    <?php

    require 'validate.inc'; // memanggil fungsi validasi eksternal

    // memriksa apakah susername valid
    if (validateName($_POST, 'surname')) {
        echo "<b>Data OK!</b><br/>";
    } else {
        echo "<b>Data invalid!</b><br/>";
    }
    //menampilkan semua data yang dikirim dari form
    echo "<br><h4>Posted Data:</h4>";
    foreach ($_POST as $key => $value) {
        echo "($key) => ($value)<br/>";
    }

    // Jika checkbox vegetarian tidak dicentang beri nilai "No"
    if (!isset($_POST['vegetarian'])) {
        echo "(vegetarian) => (No)<br/>";
    }
    ?>

    <br>
    <a href="processData_form.html">Kembali ke Form</a>
</body>
</html>
<form method="POST" action="">
    <fieldset style="background-color: #ffe4e1; border: 2px solid #ccc; padding: 15px; width: 450px;">
        <legend><b>Data Mahasiswa</b></legend>
        <table>
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama'] ?? '') ?>"></td>
            </tr>
            <tr>
                <td><label for="nim">NIM:</label></td>
                <td><input type="text" id="nim" name="nim" value="<?= htmlspecialchars($data['nim'] ?? '') ?>"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>"></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan:</label></td>
                <td><input type="text" id="jurusan" name="jurusan" value="<?= htmlspecialchars($data['jurusan'] ?? '') ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Submit">
                    <input type="button" value="Reset" onclick="window.location='mahasiswa.php'">
                </td>
            </tr>
        </table>
    </fieldset>
</form>

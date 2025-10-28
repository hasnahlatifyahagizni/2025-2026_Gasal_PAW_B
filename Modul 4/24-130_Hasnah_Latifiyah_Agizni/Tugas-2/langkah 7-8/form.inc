<form action="processData.php" method="POST">
    <fieldset style="background-color: #ffe4e1; border: 2px solid #ccc; padding: 15px;">
        <legend><b style="font-family: sans-serif;">Personal Details</b></legend>
        <table>
            <tr>
                <td><label for="surname">Surname:</label></td>
                <td><input type="text" id="surname" name="surname" required value="<?= htmlspecialchars($_POST['surname'] ?? '') ?>"></td>
            </tr>
            <tr>
                <td><label for="email">Email Address:</label></td>
                <td><input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td><label for="address">Street Address:</label></td>
                <td><textarea id="address" name="address" rows="3" cols="30"><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea></td>
            </tr>
            <tr>
                <td><label for="state">State:</label></td>
                <td>
                    <select id="state" name="state">
                        <option value="-1" <?= (($_POST['state'] ?? '') == '-1') ? 'selected' : '' ?>>Choose your state</option>
                        <option value="1" <?= (($_POST['state'] ?? '') == '1') ? 'selected' : '' ?>>Australian Capital Territory</option>
                        <option value="2" <?= (($_POST['state'] ?? '') == '2') ? 'selected' : '' ?>>New South Wales</option>
                        <option value="3" <?= (($_POST['state'] ?? '') == '3') ? 'selected' : '' ?>>Queensland</option>
                        <option value="4" <?= (($_POST['state'] ?? '') == '4') ? 'selected' : '' ?>>Victoria</option>
                        <option value="5" <?= (($_POST['state'] ?? '') == '5') ? 'selected' : '' ?>>Tasmania</option>
                        <option value="6" <?= (($_POST['state'] ?? '') == '6') ? 'selected' : '' ?>>Western Australia</option>
                        <option value="7" <?= (($_POST['state'] ?? '') == '7') ? 'selected' : '' ?>>South Australia</option>
                        <option value="8" <?= (($_POST['state'] ?? '') == '8') ? 'selected' : '' ?>>Northern Territory</option>
                    </select>
                </td>
            </tr>
            <input type="hidden" name="country" value="Australia">
            <tr>
                <td><label>Gender:</label></td>
                <td>
                    <input type="radio" name="gender" value="Male" <?= (($_POST['gender'] ?? '') == 'Male') ? 'checked' : '' ?> required> Male
                    <input type="radio" name="gender" value="Female" <?= (($_POST['gender'] ?? '') == 'Female') ? 'checked' : '' ?>> Female
                </td>
            </tr>
            <tr>
                <td><label>Vegetarian?</label></td>
                <td><input type="checkbox" name="vegetarian" value="Yes" <?= isset($_POST['vegetarian']) ? 'checked' : '' ?>> Yes</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </fieldset>
</form>
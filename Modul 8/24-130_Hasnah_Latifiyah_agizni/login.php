<?php
require "functions.php";

$error = "";

if(isset($_POST['login'])){
    $error = checkLogin($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; background: #eee; }
        .box {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background:white;
            border:1px solid #ccc;
            border-radius:5px;
        }
        input, button {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }
        button { background:#095bd1; color:white; border:none; cursor:pointer; }
    </style>
</head>
<body>

<div class="box">
    <h3 style="text-align:center;">Login Sistem</h3>

    <?php if($error != ""){ echo "<p style='color:red;'>$error</p>"; } ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button name="login">Login</button>
    </form>
</div>

</body>
</html>

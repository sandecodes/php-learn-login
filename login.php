<?php

session_start();

require 'koneksi.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;
        header("Location: index.php");
        exit;
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">Username atau password anda salah</p>
    <?php endif; ?>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="" autofocus autocomplete></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="login">Login!</button></td>
            </tr>
        </table>
    </form>
</body>

</html>
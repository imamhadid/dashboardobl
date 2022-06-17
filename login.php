<?php
session_start();
require 'config/functions.php';

if (isset($_SESSION["login"])) {
    header('location: index.php');
    exit;
}

if (isset($_POST["login"])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $query = "SELECT * FROM account WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $nama = $row["nama"];
        $level = $row["level"];

        if ($level == 'admin') {
            $_SESSION["login"] = true;
            $_SESSION["nama"] = $nama;
            echo "<script>
                    let lat = '" . $nama . "';
                    alert('Selamat datang ${nama}!');
                    document.location.href = 'index.php';
                </script>";
        } else if ($level == 'witel') {
            $_SESSION["login"] = true;
            $_SESSION["nama"] = $nama;
            echo "<script>
                    let lat = '" . $nama . "';
                    alert('Selamat datang ${nama}!');
                    document.location.href = 'index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Periksa kembali username dan password anda');
                    document.location.href = 'login.php';
                </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/styleLogin.css">
    <title>Login</title>
</head>

<body>
    <div class="area">
        <div class="container">
            <h2>Login Form</h2>
            <form action="" method="post">
                <div class="form-input">
                    <label for="">Username</label>
                    <input type="text" name="username" placeholder="Masukkan username..." autocomplete="off" />
                </div>
                <div class="form-input">
                    <label for="">Password</label>
                    <input type="password" name="password" id="id_password" placeholder=" Masukkan password..." autocomplete="off" />
                    <i class="fa-regular fa-eye" id="togglePassword"></i>
                </div>
                <div class="form-button">
                    <button type="submit" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>
<?php
require "koneksi.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
    $result = mysqli_query(mysql: $koneksi, query: $sql);

    if (mysqli_num_rows(result: $result) == 1) {
        session_start();
        $user = mysqli_fetch_assoc(result: $result);

        $_SESSION['level'] = $user['level'];
        $_SESSION['username'] = $username;
        $_SESSION['id_petugas'] = $user['id_petugas'];

        if ($_SESSION['level'] == 'admin') {
            header(header:"location:petugas.php");
            exit();
        } elseif ($_SESSION['level'] == 'petugas') {
            header(header:"location:petugas.php");
            exit();
        }
    } else {
        echo "<script>alert('Gagal Login! Username atau Password salah.');</script>";
    }


    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" class="form-login" method="post">
        <p>Silahkan Login</p>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Login</button>
    </form>
    <a href="login2.php">Login sebagai siswa </a>  
    <a href="register.php">Register </a>
</body>
</html>

<?php

session_start();
require "koneksi.php";
    if (empty($_SESSION['level'])) {
        header("location:login.php");
    }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pelaporan Pengaduan</title>
</head>

<body>
    <h1>APLIKASI PEMBAYARAN SPP</h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="spp.php">SPP</a>
        <a href="kelas.php">Kelas</a>
        <a href="siswa.php">Siswa</a>
        <a href="petugas.php">Petugas</a>
        <a href="pembayaran.php">Pembayaran</a>
        <a href="laporan.php">Laporan</a>
        <a href="login.php">Logout</a>

        <?php if ($_SESSION['level'] === 'admin') { ?>
        <a href="petugas.php">Petugas</a>
        <?php } ?>
        

    </nav>
</body>

</html>
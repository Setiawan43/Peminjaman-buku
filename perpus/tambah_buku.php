<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $conn->query("INSERT INTO books (judul, penulis, tahun) VALUES ('$judul', '$penulis', '$tahun')");
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="home.php">Daftar Buku</a></li>
            <li><a href="tambah_buku.php">Tambah Buku</a></li>
            <li><a href="hapus_buku.php">Hapus Buku</a></li>
            <li><a href="logout.php">Logout (<?= $_SESSION['user']; ?>)</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Tambah Buku</h2>
        <form method="POST">
            <input type="text" name="judul" placeholder="Judul Buku" required><br>
            <input type="text" name="penulis" placeholder="Penulis" required><br>
            <input type="number" name="tahun" placeholder="Tahun" required><br>
            <button type="submit" name="tambah">Tambah</button>
        </form>
    </div>
</body>
</html>

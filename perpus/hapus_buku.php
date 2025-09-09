<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM books WHERE id=$id");
    header("Location: hapus_buku.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Buku</title>
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
        <h2>Hapus Buku</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $result = $conn->query("SELECT * FROM books");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$row['judul']}</td>
                        <td>{$row['penulis']}</td>
                        <td>{$row['tahun']}</td>
                        <td><a href='hapus_buku.php?id={$row['id']}' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a></td>
                      </tr>";
                $no++;
            }
            ?>
        </table>
    </div>
</body>
</html>

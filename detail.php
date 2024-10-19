<?php
include 'db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM items WHERE id=$id";
$result = $conn->query($sql);
$item = $result->fetch_assoc();
?>

<h2><?php echo $item['nama_masakan']; ?></h2>
<p><?php echo $item['deskripsi']; ?></p>
<img src="<?php echo $item['gambar']; ?>" alt="Gambar Masakan" width="200">
<a href="main.php">Kembali</a>

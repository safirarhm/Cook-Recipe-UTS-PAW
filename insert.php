<?php
include 'db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
    $nama_masakan = $_POST['nama_masakan'];
    $deskripsi = $_POST['deskripsi'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    $sql = "INSERT INTO items (nama_masakan, deskripsi, gambar) VALUES ('$nama_masakan', '$deskripsi', '$target_file')";
    if ($conn->query($sql) === TRUE) {
        header("Location: main.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST" action="" enctype="multipart/form-data">
    <input type="text" name="nama_masakan" placeholder="Nama Masakan" required>
    <textarea name="deskripsi" placeholder="Deskripsi Masakan" required></textarea>
    <input type="file" name="gambar" required>
    <button type="submit" name="submit">Tambah Resep</button>
</form>

<?php
include 'db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$id = $_GET['id'];
$sql = "SELECT * FROM items WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $nama_masakan = $_POST['nama_masakan'];
    $deskripsi = $_POST['deskripsi'];
    $target_file = $row['gambar'];

    if (!empty($_FILES["gambar"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
    }

    $sql = "UPDATE items SET nama_masakan='$nama_masakan', deskripsi='$deskripsi', gambar='$target_file' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: main.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST" action="" enctype="multipart/form-data">
    <input type="text" name="nama_masakan" value="<?php echo $row['nama_masakan']; ?>" required>
    <textarea name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea>
    <input type="file" name="gambar">
    <button type="submit" name="submit">Update Resep</button>
</form>

<?php
include 'db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$sql = "SELECT * FROM items";
$result = $conn->query($sql);
?>

<h2>Daftar Resep Masakan</h2>
<a href="insert.php">Tambah Resep</a>
<table border="1">
    <tr>
        <th>Nama Masakan</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['nama_masakan']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td>
                <a href="detail.php?id=<?php echo $row['id']; ?>">Detail</a>
                <a href="update.php?id=<?php echo $row['id']; ?>">Update</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

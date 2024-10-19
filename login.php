<?php
include 'db.php'; // Koneksi ke database
session_start(); // Mulai sesi

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query cek user
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: main.php"); // Arahkan ke halaman utama
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}
?>

<!-- Form Login -->
<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>

<!-- Tambahkan tautan ke halaman register -->
<p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>

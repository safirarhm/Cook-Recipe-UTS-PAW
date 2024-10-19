<?php
include 'db.php'; // Koneksi ke database

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password

    // Insert data ke database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- Form Register -->
<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="register">Register</button>
</form>

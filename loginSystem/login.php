<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
        echo "Login berhasil! Selamat datang, " . $user['nama'];
    } else {
        echo "Password salah.";
    }
} else {
    echo "Username tidak ditemukan.";
}

mysqli_close($conn);
?>

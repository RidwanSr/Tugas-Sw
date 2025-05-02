<?php
// Mulai session
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil nama user dari session
$user = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            text-align: center; 
        }
        .navbar {
            background-color: #ccc;
            padding: 10px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .logout {
            position: absolute;
            right: 20px;
        }
        .logout a {
            text-decoration: none;
            color: #333;
            background-color: #eee;
            padding: 6px 12px;
            border-radius: 5px;
        }
        .logout a:hover {
            background-color: #ddd;
        }
        .content {
            padding: 40px 20px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="welcome">Selamat datang, <?php echo htmlspecialchars($user); ?>!</div>
    <div class="logout"><a href="index.html">Log Out</a></div>
</div>

<div class="content">
    <h2>Beranda</h2>
    <p>Ini adalah halaman utama aplikasi Anda.</p>
</div>

</body>
</html>

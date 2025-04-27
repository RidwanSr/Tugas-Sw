<?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan server Anda
$username = "root"; // Ganti dengan username Anda
$password = ""; // Ganti dengan password Anda
$dbname = "db_login"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telepon = $_POST['telepon'];

    // Pastikan semua data telah diisi
    if (!empty($nama) && !empty($email) && !empty($alamat) && !empty($username) && !empty($password) && !empty($telepon)) {
        // Hash password untuk keamanan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Siapkan dan jalankan query
        $sql = "INSERT INTO users (nama, email, alamat, username, password, telepon) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $nama, $email, $alamat, $username, $hashed_password, $telepon);

        if ($stmt->execute()) {
            echo "Registrasi berhasil!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Semua field harus diisi!";
    }
}

$conn->close();
?>
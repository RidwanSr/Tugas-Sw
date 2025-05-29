<?php
include 'koneksi.php';
session_start();

$status = ''; // untuk nyimpan status login
$message = '';

// Cek apakah form dikirim via POST dan key tersedia
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hindari SQL Injection (gunakan prepared statements jika mau lebih aman)
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                // login sukses
                $status = 'success';
                $message = 'Selamat datang ' . $user['nama'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['nama'] = $user['nama'];
            } else {
                // password salah
                $status = 'error';
                $message = 'Password salah!';
            }
        } else {
            // username tidak ditemukan
            $status = 'error';
            $message = 'Username tidak ditemukan!';
        }
    } else {
        $status = 'error';
        $message = 'Query error: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!-- Bagian HTML + SweetAlert2 -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php if (!empty($status)): ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let status = "<?php echo $status; ?>";
        let message = "<?php echo $message; ?>";

        if (status === "success") {
            Swal.fire({
                title: 'Login Berhasil!',
                text: message,
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            }).then(function() {
                window.location.href = 'halaman.php';
            });
        } else if (status === "error") {
            Swal.fire({
                title: 'Login Gagal!',
                text: message,
                icon: 'error',
                timer: 2000,
                showConfirmButton: false
            }).then(function() {
                window.location.href = 'index.html';
            });
        }
    });
</script>
<?php endif; ?>
</body>
</html>

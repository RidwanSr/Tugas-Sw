<?php
include 'koneksi.php';

session_start(); // kalo perlu nanti untuk login

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

$status = ''; // untuk nyimpan status login
$message = '';

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            // login sukses
            $status = 'success';
            $message = 'Selamat datang ' . $user['nama'];

            // kalau mau simpan session user, di sini
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
?>

<!-- Di bawah ini bagian HTML -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                window.location.href = 'login.php';
            });
        }
    });
</script>

<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_login";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$status = '';
$message = '';

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    $sql = "SELECT * FROM users WHERE email=? AND verification_token=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Token valid → update status verifikasi
        $update = "UPDATE users SET is_verified=1, verification_token=NULL WHERE email=?";
        $stmt_update = $conn->prepare($update);
        $stmt_update->bind_param("s", $email);

        if ($stmt_update->execute()) {
            $status = 'success';
            $message = 'Email berhasil diverifikasi! Silakan login.';
        } else {
            $status = 'error';
            $message = 'Gagal memperbarui data pengguna.';
        }
        $stmt_update->close();
    } else {
        $status = 'error';
        $message = 'Token tidak valid atau sudah kadaluarsa.';
    }

    $stmt->close();
} else {
    $status = 'error';
    $message = 'Token atau email tidak ditemukan di URL.';
}

$conn->close();
?>

<!-- SweetAlert untuk notifikasi -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let status = "<?php echo $status; ?>";
        let message = "<?php echo $message; ?>";

        if (status === "success") {
            Swal.fire({
                title: 'Berhasil!',
                text: message,
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            }).then(function() {
                window.location.href = 'index.html'; 
            });
        } else if (status === "error") {
            Swal.fire({
                title: 'Gagal!',
                text: message,
                icon: 'error',
                timer: 3000,
                showConfirmButton: false
            }).then(function() {
                window.location.href = 'register.php'; 
            });
        }
    });
</script>

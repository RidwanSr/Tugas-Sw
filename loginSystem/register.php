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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$status = '';
$message = '';

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

        // Generate token verifikasi
        $token = bin2hex(random_bytes(50));

        // Siapkan dan jalankan query
        $sql = "INSERT INTO users (nama, email, alamat, username, password, telepon, is_verified, verification_token) 
                VALUES (?, ?, ?, ?, ?, ?, 0, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $nama, $email, $alamat, $username, $hashed_password, $telepon, $token);

        if ($stmt->execute()) {
            // Kirim email verifikasi
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; // Sesuaikan host SMTP kamu
                $mail->SMTPAuth   = true;
                $mail->Username   = 'ridwansr043@gmail.com'; // Ganti email kamu
                $mail->Password   = 'wadl vuvm jwws ctoq'; // Ganti password email kamu
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('your_email@gmail.com', 'Your App Name');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Verifikasi Email Anda';
                $mail->Body    = "Hai $nama, <br><br>
                                  Silakan klik link berikut untuk verifikasi akun Anda: <br><br>
                                  <a href='localhost/sw_github/verify.php?email=$email&token=$token'>Verifikasi Email</a> <br><br>
                                  Terima kasih.";

                $mail->send();
                $status = 'success';
                $message = 'Registrasi berhasil! Silakan cek email untuk verifikasi.';
            } catch (Exception $e) {
                $status = 'error';
                $message = "Registrasi berhasil, tapi email tidak terkirim. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $status = 'error';
            $message = 'Error saat registrasi : ' . $stmt->error;
        }

        $stmt->close();
    } else {
        $status = 'error';
        $message = 'Semua field harus diisi!';
    }
}

$conn->close();
?>

<!-- Bagian SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let status = "<?php echo $status; ?>";
        let message = "<?php echo $message; ?>";

        if (status === "success") {
            Swal.fire({
                title: 'Registrasi Berhasil!',
                text: message,
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            }).then(function() {
                window.location.href = 'index.html'; // setelah daftar, balik ke login
            });
        } else if (status === "error" && message !== '') {
            Swal.fire({
                title: 'Registrasi Gagal!',
                text: message,
                icon: 'error',
                timer: 4000,
                showConfirmButton: false
            }).then(function() {
                window.location.href = 'register.php'; // balik ke form register
            });
        }
    });
</script>

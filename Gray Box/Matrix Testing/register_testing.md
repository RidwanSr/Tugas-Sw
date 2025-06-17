
# 🧪 Grey Box Testing – Register

## 📄 Source Code (`register.php`)
```php
<?php
include 'koneksi.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$status = '';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telepon = $_POST['telepon'];

    if (!empty($nama) && !empty($email) && !empty($alamat) && !empty($username) && !empty($password) && !empty($telepon)) {

        $check = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $check->bind_param("ss", $email, $username);
        $check->execute();
        $check_result = $check->get_result();

        if ($check_result->num_rows > 0) {
            $status = 'error';
            $message = 'Email atau Username sudah digunakan!';
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(50));

            $sql = "INSERT INTO users (nama, email, alamat, username, password, telepon, is_verified, verification_token) 
                    VALUES (?, ?, ?, ?, ?, ?, 0, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $nama, $email, $alamat, $username, $hashed_password, $telepon, $token);

            if ($stmt->execute()) {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'ridwansr043@gmail.com';
                    $mail->Password = 'wadl vuvm jwws ctoq';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->setFrom('your_email@gmail.com', 'Your App Name');
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = 'Verifikasi Email Anda';
                    $mail->Body = "Hai $nama, <br><br>Silakan klik link berikut untuk verifikasi akun Anda: 
                                   <a href='localhost/sw_github/verify.php?email=$email&token=$token'>Verifikasi Email</a>";

                    $mail->send();
                    $status = 'success';
                    $message = 'Registrasi berhasil! Silakan cek email untuk verifikasi.';
                } catch (Exception $e) {
                    $status = 'error';
                    $message = "Registrasi berhasil, tapi email tidak terkirim. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $status = 'error';
                $message = 'Error saat registrasi: ' . $stmt->error;
            }

            $stmt->close();
        }

        $check->close();
    } else {
        $status = 'error';
        $message = 'Semua field harus diisi!';
    }
}

$conn->close();
?>
```

## ✅ Matriks Testing – Register

### Cause (Input)
| ID  | Deskripsi                                 |
|-----|-------------------------------------------|
| C1  | Semua field diisi lengkap                 |
| C2  | Email belum terdaftar                     |
| C3  | Username belum digunakan                  |

### Effect (Output)
| ID  | Deskripsi                                                   |
|-----|-------------------------------------------------------------|
| E1  | Registrasi berhasil dan email verifikasi terkirim          |
| E2  | Gagal – Email atau Username sudah digunakan                 |
| E3  | Gagal – Field kosong                                        |

### Test Case
| TC   | C1  | C2  | C3  | Expected Effect |
|------|-----|-----|-----|------------------|
| TC1  | ✔️   | ✔️   | ✔️   | E1               |
| TC2  | ✔️   | ❌   | ✔️   | E2               |
| TC3  | ✔️   | ✔️   | ❌   | E2               |
| TC4  | ❌   | ✔️   | ✔️   | E3               |

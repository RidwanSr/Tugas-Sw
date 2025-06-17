
# 🧪 Grey Box Testing – Verify Email

## 📄 Source Code (`verify.php`)
```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_login";

$conn = new mysqli($servername, $username, $password, $dbname);

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
```

## ✅ Matriks Testing – Verify Email

### Cause (Input)
| ID  | Deskripsi                                 |
|-----|-------------------------------------------|
| C1  | Parameter email dan token tersedia        |
| C2  | Token cocok dengan email di database      |

### Effect (Output)
| ID  | Deskripsi                                                 |
|-----|-----------------------------------------------------------|
| E1  | Verifikasi berhasil, akun aktif                           |
| E2  | Verifikasi gagal – token tidak valid                      |
| E3  | Verifikasi gagal – parameter email/token tidak tersedia   |

### Test Case
| TC   | C1  | C2  | Expected Effect |
|------|-----|-----|------------------|
| TC1  | ✔️   | ✔️   | E1               |
| TC2  | ✔️   | ❌   | E2               |
| TC3  | ❌   | -   | E3               |

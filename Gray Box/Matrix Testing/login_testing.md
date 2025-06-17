
# 🧪 Grey Box Testing – Login

## 📄 Source Code (`login.php`)
```php
<?php
include 'koneksi.php';
session_start();

$status = '';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $status = 'success';
                $message = 'Selamat datang ' . $user['nama'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['nama'] = $user['nama'];
            } else {
                $status = 'error';
                $message = 'Password salah!';
            }
        } else {
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
```

## ✅ Matriks Testing – Login

### Cause (Input)
| ID  | Deskripsi                                |
|-----|------------------------------------------|
| C1  | Username diisi                           |
| C2  | Password diisi                           |
| C3  | Username valid (ada di database)         |
| C4  | Password benar (match dengan hash)       |

### Effect (Output)
| ID  | Deskripsi                                       |
|-----|-------------------------------------------------|
| E1  | Login berhasil, redirect ke `halaman.php`       |
| E2  | Gagal – Username tidak ditemukan                |
| E3  | Gagal – Password salah                          |

### Test Case
| TC   | C1  | C2  | C3  | C4  | Expected Effect |
|------|-----|-----|-----|-----|------------------|
| TC1  | ✔️   | ✔️   | ✔️   | ✔️   | E1               |
| TC2  | ✔️   | ✔️   | ❌   | -   | E2               |
| TC3  | ✔️   | ✔️   | ✔️   | ❌   | E3               |
| TC4  | ❌   | ✔️   | -   | -   | E2               |
| TC5  | ✔️   | ❌   | -   | -   | E3               |

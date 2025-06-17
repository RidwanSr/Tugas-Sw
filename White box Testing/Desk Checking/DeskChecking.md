## 🧾 Desk Checking - `verify.php`

### Input Simulasi

URL: `verify.php?email=john@example.com&token=abc123token`  
Data di database:
- email: `john@example.com`
- verification_token: `abc123token`
- is_verified: 0

### Langkah-langkah Desk Checking

| Langkah | Baris Kode                                               | Nilai Variabel / Status                                      | Catatan                                                                 |
|--------:|-----------------------------------------------------------|---------------------------------------------------------------|-------------------------------------------------------------------------|
| 1       | `$_GET['email']` dan `$_GET['token']`                     | `email = john@example.com`, `token = abc123token`            | Parameter diterima                                                      |
| 2       | Prepare `SELECT`                                          | SQL statement valid                                           | Menggunakan prepared statement                                          |
| 3       | Jalankan query                                            | `$result->num_rows = 1`                                      | Token valid, user ditemukan                                            |
| 4       | Prepare `UPDATE users`                                    | Siapkan untuk update `is_verified = 1`, token dihapus        | Token tidak bisa digunakan lagi setelah diverifikasi                   |
| 5       | Jalankan update                                           | Berhasil                                                      | Data pengguna berhasil diperbarui                                      |
| 6       | Set status sukses                                         | `$status = 'success'`                                        | Akan trigger SweetAlert success                                        |
| 7       | SweetAlert muncul dan redirect                            | Ke halaman login                                              |                                                                          |

### ❌ Kasus Gagal: Token Tidak Valid

| Langkah | Baris Kode                                               | Nilai Variabel / Status                                      | Catatan                                                                 |
|--------:|-----------------------------------------------------------|---------------------------------------------------------------|-------------------------------------------------------------------------|
| 1       | Input token tidak cocok                                   | `token = wrongtoken`                                         | Data tidak ditemukan                                                    |
| 2       | Jalankan query                                            | `$result->num_rows = 0`                                      | Tidak ada user yang cocok                                              |
| 3       | Set status error                                          | `$status = 'error'`                                          | SweetAlert error muncul, redirect ke `register.php`                    |

## 🧾 Desk Checking – `login.php`

### Simulasi Input

Form POST:
- `username = johndoe`
- `password = pass123`

Data di database:
- `username = johndoe`
- `password = hashed_pass123`
- `nama = John Doe`

### Desk Checking Table

| Langkah | Baris Kode                                   | Nilai Variabel / Status                                     | Catatan                                 |
|--------:|-----------------------------------------------|--------------------------------------------------------------|------------------------------------------|
| 1       | `$_POST['username']`, `$_POST['password']`    | `johndoe`, `pass123`                                         | Input berhasil                           |
| 2       | SQL cek username                              | Query hasil = 1 baris                                        | Username ditemukan                        |
| 3       | `password_verify()`                           | `true`                                                       | Password cocok                            |
| 4       | Set session                                   | `$_SESSION['username'] = johndoe`                            | Login sukses                              |
| 5       | `$status = 'success'`, tampil SweetAlert      | Redirect ke `halaman.php`                                    |                                           |

### ❌ Kasus Gagal: Password Salah

| Langkah | Baris Kode                                   | Nilai Variabel / Status                                     | Catatan                                 |
|--------:|-----------------------------------------------|--------------------------------------------------------------|------------------------------------------|
| 1       | `password_verify = false`                     | Login gagal                                                  | SweetAlert error, redirect `index.html`   |

### ❌ Kasus Gagal: Username Tidak Ditemukan

| Langkah | Baris Kode                                   | Nilai Variabel / Status                                     | Catatan                                 |
|--------:|-----------------------------------------------|--------------------------------------------------------------|------------------------------------------|
| 1       | `mysqli_num_rows = 0`                         | Login gagal                                                  | SweetAlert error                         |

---

## 🧾 Desk Checking – `register.php`

### Simulasi Input

Form POST:
- `nama = John Doe`
- `email = john@example.com`
- `alamat = Bandung`
- `username = johndoe`
- `password = pass123`
- `telepon = 08123456789`

### Desk Checking Table

| Langkah | Baris Kode                                   | Nilai Variabel / Status                                     | Catatan                                 |
|--------:|-----------------------------------------------|--------------------------------------------------------------|------------------------------------------|
| 1       | Semua field terisi                            | Valid input                                                  | Lanjut                                   |
| 2       | Cek email/username                            | Tidak ada yang sama                                          | Lanjut insert                            |
| 3       | `password_hash()`                             | `hashed_pass123`                                             | Password aman                            |
| 4       | Generate token                                | `random hex string`                                          | Token untuk verifikasi                   |
| 5       | Eksekusi INSERT                               | Berhasil                                                     | Data masuk                               |
| 6       | PHPMailer kirim email                         | Email berhasil dikirim                                       | SweetAlert sukses                        |

### ❌ Kasus Gagal: Email / Username Sudah Terdaftar

| Langkah | Baris Kode                                   | Nilai Variabel / Status                                     | Catatan                                 |
|--------:|-----------------------------------------------|--------------------------------------------------------------|------------------------------------------|
| 1       | Query cek user                                | Ada user ditemukan                                           | SweetAlert error                         |

### ❌ Kasus Gagal: Field Kosong

| Langkah | Baris Kode                                   | Nilai Variabel / Status                                     | Catatan                                 |
|--------:|-----------------------------------------------|--------------------------------------------------------------|------------------------------------------|
| 1       | Ada field kosong                              | Tidak lanjut ke query                                        | SweetAlert error                         |

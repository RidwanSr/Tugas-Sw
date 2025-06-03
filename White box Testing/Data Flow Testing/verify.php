| Variabel       | Didefinisikan (def)                                 | Digunakan (use)                                                   |
|----------------|-----------------------------------------------------|--------------------------------------------------------------------|
| `$servername`  | Baris awal (`$servername = "localhost";`)           | Digunakan untuk koneksi DB                                        |
| `$username`    | Baris awal (`$username = "root";`)                  | Digunakan untuk koneksi DB                                        |
| `$password`    | Baris awal (`$password = "";`)                      | Digunakan untuk koneksi DB                                        |
| `$dbname`      | Baris awal (`$dbname = "db_login";`)                | Digunakan untuk koneksi DB                                        |
| `$conn`        | `new mysqli(...)`                                   | Untuk semua operasi DB (`prepare`, `close`, dll.)                 |
| `$status`      | Baris awal (`$status = '';`)                        | Digunakan dalam blok JavaScript untuk menampilkan SweetAlert      |
| `$message`     | Baris awal (`$message = '';`)                       | Digunakan dalam blok JavaScript untuk menampilkan SweetAlert      |
| `$email`       | Dari `$_GET['email']`                               | Di-bind ke query SQL dan dipakai dalam update                     |
| `$token`       | Dari `$_GET['token']`                               | Di-bind ke query SQL                                              |
| `$sql`         | Dibentuk: `"SELECT * FROM users WHERE email=?..."` | Disiapkan untuk validasi token melalui prepared statement         |
| `$stmt`        | Hasil dari `$conn->prepare($sql)`                   | Di-bind, dieksekusi, dan hasilnya diambil (`get_result()`)        |
| `$result`      | Hasil dari `$stmt->get_result()`                    | Dicek jumlah baris untuk verifikasi token                         |
| `$update`      | Dibentuk: `"UPDATE users SET ..."`                  | Disiapkan untuk memperbarui status verifikasi pengguna            |
| `$stmt_update` | Hasil dari `$conn->prepare($update)`                | Di-bind dan dieksekusi untuk menyimpan perubahan verifikasi email |

| Variabel                                                           | Definisi (def)              | Penggunaan (use)                        |
| ------------------------------------------------------------------ | --------------------------- | --------------------------------------- |
| `$servername`                                                      | `"localhost"`               | Digunakan untuk inisialisasi koneksi DB |
| `$username`                                                        | `"root"`                    | Digunakan untuk koneksi DB dan form     |
| `$password`                                                        | `""`                        | Digunakan untuk koneksi DB dan form     |
| `$dbname`                                                          | `"db_login"`                | Digunakan untuk koneksi DB              |
| `$conn`                                                            | `new mysqli(...)`           | Untuk semua interaksi DB                |
| `$nama`, `$email`, `$alamat`, `$username`, `$password`, `$telepon` | Diambil dari `$_POST` input | Digunakan dalam query & logika validasi |
| `$hashed_password`                                                 | `password_hash(...)`        | Untuk disimpan ke database              |
| `$status`, `$message`                                              | Inisialisasi kosong (`''`)  | Belum terlihat digunakan dalam cuplikan |

| Variabel    | Didefinisikan (def)                 | Digunakan (use)                                            |
| ----------- | ----------------------------------- | ---------------------------------------------------------- |
| `$status`   | Baris awal (`$status = '';`)        | Digunakan saat menampilkan status login                    |
| `$message`  | Baris awal (`$message = '';`)       | Digunakan untuk menampilkan pesan                          |
| `$username` | Dari `$_POST['username']`           | Dalam query SQL                                            |
| `$password` | Dari `$_POST['password']`           | Untuk verifikasi `password_verify()`                       |
| `$sql`      | Dibentuk sebagai string query       | Dipakai di `mysqli_query()`                                |
| `$result`   | Hasil dari `mysqli_query()`         | Dicek dengan `if ($result)`                                |
| `$user`     | Diambil dari `mysqli_fetch_assoc()` | Digunakan di `password_verify` dan untuk menyimpan session |
| `$_SESSION` | Diatur bila login berhasil          | N/A (tidak dicek/digunakan langsung di file ini)           |

# Test Case: Login - Username & Password

| Test Case                                 | Username Input | Password Input | Ekspektasi Aplikasi                          | actual)                 | status |
|-------------------------------------------|----------------|----------------|----------------------------------------------|-------------------------------|---------|
| Username dan password benar               | "budi123"      | "password123"  |  Login berhasil, masuk ke sistem              | Login berhasil            | Passed |
| Username benar, password salah            | "budi123"      | "salahpass"    |   Login gagal, muncul pesan error              |  Login gagal               |Passed|
| Username salah, password benar            | "salahuser"    | "password123"  |   Login gagal, muncul pesan error              |  Login gagal                |Passed|
| Username tidak terdaftar                  | "tidakadada"   | "randompass"   |   Login gagal, muncul pesan error              |  Login gagal                |Passed|
| Username kosong                           | ""             | "password123"  |  Ditolak, muncul pesan validasi               |  Ditolak                    |Passed|
| Password kosong                           | "budi123"      | ""             |   Ditolak, muncul pesan validasi               |  Ditolak                    |Passed|
| Keduanya kosong                           | ""             | ""             |  Ditolak, muncul pesan validasi               |  Ditolak                     |Passed|

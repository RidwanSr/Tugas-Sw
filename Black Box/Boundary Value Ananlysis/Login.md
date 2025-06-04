# Test Case: Login - Username & Password

| Test Case                                 | Username Input | Password Input |  Alasan                          | Ekspektasi Aplikasi                          | actual)                 |
|-------------------------------------------|----------------|----------------|----------------------------------|----------------------------------------------|---------------------------------------------|
| Username dan password benar               | "budi123"      | "password123"  |  Kombinasi cocok dengan database | Login berhasil, masuk ke sistem              |                                             |
| Username benar, password salah            | "budi123"      | "salahpass"    |  Password tidak cocok             | Login gagal, muncul pesan error              |                                             |
| Username salah, password benar            | "salahuser"    | "password123"  |  Username tidak terdaftar        | Login gagal, muncul pesan error              |                                             |
| Username tidak terdaftar                  | "tidakadada"   | "randompass"   |  Username tidak ada di database  | Login gagal, muncul pesan error              |                                             |
| Username kosong                           | ""             | "password123"  |  Username wajib diisi            | Ditolak, muncul pesan validasi               |                                             |
| Password kosong                           | "budi123"      | ""             |  Password wajib diisi            | Ditolak, muncul pesan validasi               |                                             |
| Keduanya kosong                           | ""             | ""             |  Kedua field wajib diisi         | Ditolak, muncul pesan validasi               |                                             |

# Test Case: Login - Equivalence Class

| No | Kelas Equivalen                          | Username Input | Password Input | Valid / Invalid | Alasan                                  | Ekspektasi Aplikasi                 |
|----|------------------------------------------|----------------|----------------|------------------|------------------------------------------|-------------------------------------|
| 1  | Kombinasi benar                          | "user123"      | "pass12345"    | Valid            | Kombinasi cocok di database              | Login berhasil, masuk ke dashboard  |
| 2  | Username benar, password salah           | "user123"      | "salahpass"    | Invalid          | Password tidak cocok                     | Login gagal, muncul pesan kesalahan |
| 3  | Username tidak terdaftar                 | "tidakadada"   | "pass12345"    | Invalid          | Username tidak ada di database           | Login gagal, muncul pesan kesalahan |
| 4  | Username kosong                          | ""             | "pass12345"    | Invalid          | Field username wajib diisi               | Validasi input ditampilkan          |
| 5  | Password kosong                          | "user123"      | ""             | Invalid          | Field password wajib diisi               | Validasi input ditampilkan          |
| 6  | Keduanya kosong                          | ""             | ""             | Invalid          | Kedua field wajib diisi                  | Validasi input ditampilkan          |
| 7  | Username terlalu pendek (<4 karakter)    | "usr"          | "pass12345"    | Invalid          | Username tidak memenuhi panjang minimal  | Validasi input ditampilkan          |
| 8  | Password terlalu pendek (<8 karakter)    | "user123"      | "short"        | Invalid          | Password tidak memenuhi panjang minimal  | Validasi input ditampilkan          |
| 9  | Username mengandung karakter tidak valid | "user!@#"      | "pass12345"    | Invalid          | Karakter tidak diperbolehkan             | Validasi input ditampilkan          |
| 10 | Password mengandung spasi di tengah      | "user123"      | "pass 12345"   | Invalid          | Spasi di password tidak diizinkan        | Validasi input ditampilkan          |

.

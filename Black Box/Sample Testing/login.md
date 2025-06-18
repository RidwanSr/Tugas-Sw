# Test Case: Skenario Login

| No | Skenario                 | Username  | Password   | Valid / Invalid | Ekspektasi                              | Hasil Aktual | Status |
|----|--------------------------|-----------|------------|------------------|------------------------------------------|--------------|--------|
| 1  | Login sukses             | user123   | pass12345  | Valid            | Masuk ke dashboard                       | Sama         | Pass   |
| 2  | Username tidak terdaftar | fakeuser  | pass12345  | Invalid          | Muncul pesan "username tidak ditemukan" | Sama         | Pass   |
| 3  | Password salah           | user123   | salahpass  | Invalid          | Muncul pesan "password salah"           | Sama         | Pass   |
| 4  | Field kosong             | ""        | ""         | Invalid          | Validasi input ditolak                  | Sama         | Pass   |

.

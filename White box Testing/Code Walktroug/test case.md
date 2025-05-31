| No | Kasus                    | Input                  | Expected Output        |
|----|--------------------------|------------------------|-----------------------|
| 1  | Registrasi semua data valid | Nama, email, dsb.       | Token dikirim ke email |
| 2  | Email tidak valid          | `abc@abc`              | Gagal registrasi       |
| 3  | Token valid di URL         | Token dari email       | Status diverifikasi    |
| 4  | Token tidak valid          | Diubah secara manual   | Gagal diverifikasi     |
| 5  | Login belum diverifikasi   | Email belum diverifikasi | Gagal login          |
| 6  | Login salah password       | Salah password         | Gagal login            |
| 7  | Login berhasil             | Username + password benar | Redirect ke dashboard |

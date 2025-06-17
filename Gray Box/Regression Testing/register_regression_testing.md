# 🔁 Regression Testing – Register

## Tujuan
Memastikan proses registrasi tetap dapat dijalankan setelah perubahan sistem (misal: integrasi email, penambahan captcha, validasi password kuat, dll).

## Skenario Uji

| No. | Deskripsi Perubahan                      | Input Uji                                 | Hasil yang Diharapkan                  | Hasil Aktual | Status |
|-----|------------------------------------------|-------------------------------------------|----------------------------------------|--------------|--------|
| 1   | Tambahan validasi email format           | test@@mail                                 | Tampilkan error email tidak valid      | Sesuai       | ✅      |
| 2   | Tambah reCAPTCHA Google                  | Registrasi normal + captcha                | Registrasi berhasil jika captcha benar | Sesuai       | ✅      |
| 3   | Perubahan struktur kolom `is_verified`   | Data lengkap + email valid                 | Data tersimpan dengan status unverified| Sesuai       | ✅      |
| 4   | Integrasi Mailer baru                    | Registrasi dengan email valid              | Email verifikasi terkirim              | Sesuai       | ✅      |
| 5   | Tambah validasi password minimal 6 char  | password = "123"                           | Tampilkan error                        | Sesuai       | ✅      |

# 🔍 Formal Inspection Report – Whitebox Testing

---

## 📄 File: `login.php`

### Pemeriksaan dan Temuan

| Aspek              | Status        | Temuan / Catatan                                                                 |
|--------------------|---------------|----------------------------------------------------------------------------------|
| Struktur Kontrol   | ✅ Baik        | Login hanya diproses jika `POST` dan semua field tersedia.                      |
| Validasi Input     | ⚠️ Perlu ditingkatkan | Input langsung masuk ke query, berisiko XSS dan SQL injection.               |
| Keamanan Password  | ✅ Aman        | Menggunakan `password_verify()` secara benar.                                   |
| Session Handling   | ✅ Aman        | Session dimulai dan menyimpan data dengan benar.                                |
| SQL Injection      | ❌ Rentan      | Tidak menggunakan prepared statement.                                           |
| UI Feedback        | ✅ Baik        | Menggunakan SweetAlert untuk respon interaktif pengguna.                        |
| Redirect Handling  | ✅ Sesuai      | Mengarahkan user sesuai hasil login.                                            |

---

## 📄 File: `register.php`

### Pemeriksaan dan Temuan

| Aspek              | Status        | Temuan / Catatan                                                                 |
|--------------------|---------------|----------------------------------------------------------------------------------|
| Validasi Input     | ✅ Baik        | Semua field diperiksa, namun belum ada validasi panjang/format.                |
| Duplikasi Data     | ✅ Aman        | Cek email dan username dilakukan sebelum insert.                                |
| Password Hashing   | ✅ Aman        | Menggunakan `password_hash()` dengan algoritma default.                         |
| Email Verifikasi   | ✅ Ada         | Mengirim link verifikasi melalui email menggunakan token.                       |
| SMTP Credentials   | ❌ Kritis      | Password email disimpan hardcoded dalam file, rawan keamanan.                  |
| SQL Injection      | ✅ Aman        | Menggunakan prepared statement untuk semua query.                               |
| Error Handling     | ✅ Baik        | Menggunakan SweetAlert untuk feedback.                                          |

---

## 📄 File: `verify.php`

### Pemeriksaan dan Temuan

| Aspek              | Status        | Temuan / Catatan                                                                 |
|--------------------|---------------|----------------------------------------------------------------------------------|
| Validasi Token     | ✅ Baik        | Email dan token dicek dari parameter URL.                                       |
| Verifikasi Akun    | ✅ Aman        | Status user diupdate dan token dihapus.                                         |
| SQL Injection      | ✅ Aman        | Prepared statement digunakan dengan benar.                                      |
| UI Feedback        | ✅ Baik        | SweetAlert digunakan untuk memberi tahu hasil verifikasi ke pengguna.           |
| XSS Protection     | ⚠️ Perlu ditingkatkan | Tidak ada filter atau escape output HTML dari parameter `GET`.              |

---

## ✅ Rangkuman Kesimpulan

| Area Umum          | Status        | Catatan                                                                 |
|--------------------|---------------|-------------------------------------------------------------------------|
| Standar Kode       | ⚠️ Cukup       | Penamaan variabel cukup konsisten, namun indentasi dan komentar bisa ditingkatkan. |
| Keamanan           | ❗ Perlu Perbaikan | Gunakan `.env` untuk kredensial SMTP dan prepared statements di semua file. |
| Validasi Data      | ⚠️ Sedang      | Perlu tambahan validasi panjang dan format (regex) untuk email, telepon, dll. |
| UX Feedback        | ✅ Baik        | SweetAlert sangat membantu komunikasi dengan user.                       |
| Error Handling     | ⚠️ Terbatas    | Belum ada sistem logging internal untuk error backend (misalnya `error_log`). |

---

## 📌 Rekomendasi

- Ganti query raw SQL di `login.php` dengan prepared statement.
- Pindahkan kredensial email ke file `.env` dan gunakan PHP `getenv()` atau library konfigurasi.
- Tambahkan validasi format pada email, password, dan nomor telepon.
- Tambahkan mekanisme logging untuk membantu debugging (misal log file PHP).
- Sanitasi semua output yang berasal dari `$_GET`, `$_POST` sebelum ditampilkan.

---

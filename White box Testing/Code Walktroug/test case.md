| No | Kasus                    | Input                  | Expected Output        |
|----|--------------------------|------------------------|-----------------------|
| 1  | Registrasi semua data valid | Nama, email, dsb.       | Token dikirim ke email |
| 2  | Email tidak valid          | `abc@abc`              | Gagal registrasi       |
| 3  | Token valid di URL         | Token dari email       | Status diverifikasi    |
| 4  | Token tidak valid          | Diubah secara manual   | Gagal diverifikasi     |
| 5  | Login belum diverifikasi   | Email belum diverifikasi | Gagal login          |
| 6  | Login salah password       | Salah password         | Gagal login            |
| 7  | Login berhasil             | Username + password benar | Redirect ke dashboard |

login.php
| Langkah | Kondisi Pengujian                                         | Jalur Program       | Hasil yang Diharapkan                                       |
| ------- | --------------------------------------------------------- | ------------------- | ----------------------------------------------------------- |
| L1      | Username & password sesuai, dan password cocok (verified) | Login berhasil      | Redirect ke `halaman.php` + pesan sukses                    |
| L2      | Username ada, tapi password salah                         | Login gagal         | Redirect ke `index.html` + pesan "Password salah"           |
| L3      | Username tidak ditemukan di database                      | Login gagal         | Redirect ke `index.html` + pesan "Username tidak ditemukan" |
| L4      | Query SQL gagal dieksekusi                                | Error query         | Redirect + tampilkan pesan error                            |
| L5      | Form tidak dikirim melalui POST atau field kosong         | Form tidak diproses | Tidak ada perubahan, status tetap kosong                    |

register.php
| Langkah | Kondisi Pengujian                                  | Jalur Program                   | Hasil yang Diharapkan                                      |
| ------- | -------------------------------------------------- | ------------------------------- | ---------------------------------------------------------- |
| R1      | Semua data diisi, username & email belum digunakan | Registrasi sukses + kirim email | Redirect ke `index.html` + pesan sukses                    |
| R2      | Email atau username sudah terdaftar                | Registrasi gagal                | Redirect ke `index.html` + pesan "sudah digunakan"         |
| R3      | Salah satu field kosong                            | Registrasi gagal                | Redirect ke `index.html` + pesan "Semua field harus diisi" |
| R4      | Email gagal dikirim oleh PHPMailer                 | Registrasi sukses (parsial)     | Redirect + pesan "email tidak terkirim"                    |
| R5      | Query insert gagal                                 | Registrasi gagal                | Redirect + pesan error SQL                                 |

verify.php
| Langkah | Kondisi Pengujian                                       | Jalur Program               | Hasil yang Diharapkan                                            |
| ------- | ------------------------------------------------------- | --------------------------- | ---------------------------------------------------------------- |
| V1      | Email & token valid, user belum diverifikasi            | Verifikasi sukses           | Redirect ke `index.html` + pesan sukses                          |
| V2      | Email & token tidak cocok atau token kadaluarsa         | Verifikasi gagal            | Redirect ke `register.php` + pesan error                         |
| V3      | Email & token tidak ada di URL                          | Verifikasi gagal            | Redirect ke `register.php` + pesan "Token/email tidak ditemukan" |
| V4      | Email sudah diverifikasi (token null, is\_verified = 1) | Verifikasi dianggap selesai | Redirect ke `index.html` + pesan "Sudah diverifikasi"            |
| V5      | Format email tidak valid                                | Verifikasi gagal            | Redirect + pesan "Format email tidak valid"                      |
| V6      | Update status verifikasi gagal (SQL error)              | Verifikasi gagal            | Redirect + pesan "Gagal memperbarui data"                        |

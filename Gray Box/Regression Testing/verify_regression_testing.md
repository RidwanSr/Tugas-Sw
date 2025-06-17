# 🔁 Regression Testing – Verifikasi Email

## Tujuan
Menguji kestabilan fungsi verifikasi email setelah ada penambahan fitur keamanan, seperti validasi token yang lebih kompleks atau enkripsi URL.

## Skenario Uji

| No. | Deskripsi Perubahan                   | URL Uji                                           | Hasil yang Diharapkan                  | Hasil Aktual | Status |
|-----|---------------------------------------|--------------------------------------------------|----------------------------------------|--------------|--------|
| 1   | Perubahan field `verification_token`  | valid email & token                              | Verifikasi sukses, token nullified     | Sesuai       | ✅      |
| 2   | Penambahan batas waktu token (expiry) | token expired                                    | Verifikasi gagal, token kedaluwarsa    | Sesuai       | ✅      |
| 3   | URL enkripsi                          | URL encoded base64/email/token                   | Sistem mampu mendekripsi dan verifikasi| Sesuai       | ✅      |
| 4   | Cek token tidak boleh reusable        | Gunakan kembali token yang sudah dipakai         | Verifikasi gagal, token invalid        | Sesuai       | ✅      |
| 5   | Integrasi log verifikasi              | URL valid                                        | Aktivitas disimpan ke log              | Sesuai       | ✅      |

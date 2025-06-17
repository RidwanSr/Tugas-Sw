# 🔐 Pattern Testing – Fitur Login

## Tujuan Pengujian
Menguji pola input umum yang bisa menyebabkan login gagal, celah keamanan, atau validasi yang tidak memadai.

## Skema Uji Pola

| No. | Input Username         | Input Password         | Pola Pengujian                   | Hasil yang Diharapkan               |
|-----|------------------------|------------------------|----------------------------------|-------------------------------------|
| 1   | admin                  | admin123               | ✅ Input valid                    | Login berhasil                      |
| 2   | ' OR '1'='1            | apapun                 | ❌ SQL Injection                  | Login gagal, input ditolak          |
| 3   | <script>alert(1)</script> | test123              | ❌ XSS Injection                 | Login gagal, input divalidasi       |
| 4   | user';--               | test123                | ❌ SQL Injection via comment      | Login gagal                         |
| 5   |                       | test123                | ❌ Kosong username               | Tampilkan pesan error               |
| 6   | user123                |                        | ❌ Kosong password               | Tampilkan pesan error               |
| 7   | user_test              | p@ssw0rd               | ✅ Karakter spesial di password   | Login berhasil (jika benar)         |

# 📧 Pattern Testing – Fitur Verifikasi Email

## Tujuan Pengujian
Menguji keamanan URL dan parameter verifikasi email terhadap input yang tidak valid, manipulasi token, atau rekayasa link.

## Skema Uji Pola

| No. | Email dalam URL             | Token                          | Pola Pengujian             | Hasil yang Diharapkan               |
|-----|-----------------------------|--------------------------------|----------------------------|-------------------------------------|
| 1   | user@example.com            | token_asli                     | ✅ Link normal              | Verifikasi berhasil                 |
| 2   | user@example.com            | token_salah                    | ❌ Token tidak cocok        | Verifikasi gagal                    |
| 3   |                            | token_asli                     | ❌ Email kosong             | Verifikasi gagal                    |
| 4   | user@example.com            |                                | ❌ Token kosong             | Verifikasi gagal                    |
| 5   | user@example.com            | ' OR 1=1 --                   | ❌ SQL Injection            | Verifikasi gagal, input ditolak     |
| 6   | <script>                   | <script>alert(1)</script>     | ❌ XSS Injection            | Verifikasi gagal                    |
| 7   | admin@example.com          | token_asli_but_other_email     | ❌ Token tidak cocok        | Verifikasi gagal                    |

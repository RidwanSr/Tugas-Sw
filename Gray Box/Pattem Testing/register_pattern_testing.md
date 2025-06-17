# 📝 Pattern Testing – Fitur Register

## Tujuan Pengujian
Menguji pola input pengguna pada form registrasi untuk memastikan keandalan validasi input dan keamanan sistem.

## Skema Uji Pola

| No. | Nama       | Email                     | Username     | Password         | Telepon     | Pola Pengujian             | Hasil yang Diharapkan             |
|-----|------------|---------------------------|--------------|------------------|-------------|----------------------------|-----------------------------------|
| 1   | Test User  | test@example.com          | testuser     | password123      | 08123456789 | ✅ Input valid              | Registrasi berhasil               |
| 2   | <b>Test</b>| test@example.com          | testuser     | pass             | 08123456789 | ❌ HTML Tag Injection       | Validasi gagal                    |
| 3   | Test       | test@@gmail..com          | testuser     | password         | 08123456789 | ❌ Format email salah       | Validasi gagal                    |
| 4   | Test       | test2@example.com         |              | password         | 08123456789 | ❌ Username kosong          | Validasi gagal                    |
| 5   | Test       | test3@example.com         | testuser     |                  | 08123456789 | ❌ Password kosong          | Validasi gagal                    |
| 6   | Test       | test4@example.com         | testuser     | password123      | <script>    | ❌ XSS Injection pada telp  | Validasi gagal                    |
| 7   | Test       | test5@example.com         | test';--     | password123      | 08123456789 | ❌ SQL Injection di username| Validasi gagal                    |
| 8   | Test       | test6@example.com         | testuser     | 123              | 08123456789 | ❌ Password lemah           | Validasi gagal / warning          |

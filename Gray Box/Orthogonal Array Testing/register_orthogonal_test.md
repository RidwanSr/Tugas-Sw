# 🧪 Orthogonal Array Testing – Fitur Register

## 🔍 Parameter dan Nilai

| Parameter        | Nilai | Deskripsi                           |
|-----------------|-------|-------------------------------------|
| Field Diisi      | F1    | Semua field diisi lengkap           |
|                 | F2    | Ada field kosong                    |
| Username Unique  | U1    | Belum digunakan                     |
|                 | U2    | Sudah digunakan                     |
| Email Unique     | E1    | Belum digunakan                     |
|                 | E2    | Sudah digunakan                     |

## 📋 L4 Orthogonal Array

| Test Case | Field Diisi | Username | Email | Expected Output                                |
|-----------|-------------|----------|-------|------------------------------------------------|
| TC1       | F1          | U1       | E1    | ✅ Registrasi berhasil dan kirim email         |
| TC2       | F1          | U2       | E2    | ❌ Username/Email sudah digunakan              |
| TC3       | F2          | U1       | E2    | ❌ Field belum lengkap                         |
| TC4       | F2          | U2       | E1    | ❌ Field belum lengkap                         |

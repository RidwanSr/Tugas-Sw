# 🧪 Orthogonal Array Testing – Fitur Verifikasi Email

## 🔍 Parameter dan Nilai

| Parameter        | Nilai | Deskripsi                             |
|-----------------|-------|----------------------------------------|
| Token Tersedia   | T1    | Ya                                    |
|                 | T2    | Tidak tersedia                         |
| Email Terdaftar  | E1    | Ada di database                       |
|                 | E2    | Tidak ada di database                 |
| Token Valid      | V1    | Cocok dengan email                    |
|                 | V2    | Tidak cocok / kadaluarsa              |

## 📋 L4 Orthogonal Array

| Test Case | Token | Email | Validitas Token | Expected Output                            |
|-----------|-------|-------|------------------|---------------------------------------------|
| TC1       | T1    | E1    | V1               | ✅ Verifikasi berhasil                      |
| TC2       | T1    | E2    | V2               | ❌ Token/email tidak cocok                  |
| TC3       | T2    | E1    | V2               | ❌ Token tidak tersedia                     |
| TC4       | T2    | E2    | V1               | ❌ Email/token tidak valid                  |

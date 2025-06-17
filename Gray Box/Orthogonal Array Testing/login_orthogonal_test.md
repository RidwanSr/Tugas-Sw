# 🧪 Orthogonal Array Testing – Fitur Login

## 🔍 Parameter dan Nilai

| Parameter         | Nilai | Deskripsi               |
|------------------|-------|-------------------------|
| Username          | U1    | Diisi benar             |
|                  | U2    | Diisi salah             |
| Password          | P1    | Diisi benar             |
|                  | P2    | Diisi salah             |
| Akun Terdaftar    | A1    | Ya                      |
|                  | A2    | Tidak ada               |

## 📋 L4 Orthogonal Array

| Test Case | Username | Password | Akun Terdaftar | Expected Output                        |
|-----------|----------|----------|----------------|----------------------------------------|
| TC1       | U1       | P1       | A1             | ✅ Login berhasil                       |
| TC2       | U1       | P2       | A2             | ❌ Username tidak ditemukan             |
| TC3       | U2       | P1       | A2             | ❌ Username tidak ditemukan             |
| TC4       | U2       | P2       | A1             | ❌ Login gagal – password salah         |

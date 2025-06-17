## 🧪 Basic Path Testing - `login.php`

### Cyclomatic Complexity

- Jumlah keputusan: 4
- V(G) = 4 + 1 = **5**

### Jalur Independen

| Path | Deskripsi                                                                                           |
|------|-----------------------------------------------------------------------------------------------------|
| P1   | Request POST → Query sukses → User ditemukan → Password benar → Login sukses                        |
| P2   | Request POST → Query sukses → User ditemukan → Password salah → Login gagal                         |
| P3   | Request POST → Query sukses → User **tidak** ditemukan → Login gagal                                |
| P4   | Request POST → Query **gagal** → Tampilkan pesan error SQL                                          |
| P5   | Request bukan POST / tidak ada username/password → Tidak diproses sama sekali                       |

### Test Case

| TC  | Input                           | Path | Expected Output                                 |
|-----|----------------------------------|------|--------------------------------------------------|
| TC1 | Username & password valid       | P1   | Redirect ke `halaman.php`                        |
| TC2 | Username valid, password salah | P2   | Redirect ke `index.html` + pesan error password |
| TC3 | Username tidak ada              | P3   | Redirect ke `index.html` + pesan user tidak ditemukan |
| TC4 | Error SQL                       | P4   | Pesan error SQL ditampilkan                      |
| TC5 | Bukan request POST              | P5   | Tidak ada aksi                                   |

## 🧪 Basic Path Testing - `register.php`

### Cyclomatic Complexity

- Jumlah keputusan: 5
- V(G) = 5 + 1 = **6**

### Jalur Independen

| Path | Deskripsi                                                                                         |
|------|---------------------------------------------------------------------------------------------------|
| P1   | Semua field valid → Email/username belum ada → Insert berhasil → Email terkirim                   |
| P2   | Semua field valid → Email/username belum ada → Insert berhasil → **Email gagal dikirim**          |
| P3   | Semua field valid → Email/username sudah dipakai → Registrasi gagal                               |
| P4   | Field ada yang kosong → Registrasi gagal                                                          |
| P5   | Method bukan POST → Tidak dilakukan apa-apa                                                       |
| P6   | Semua field valid → Insert gagal (simulasi error DB) → Registrasi gagal                           |

### Test Case

| TC  | Input                                            | Path | Expected Output                                              |
|-----|--------------------------------------------------|------|---------------------------------------------------------------|
| TC1 | Semua field valid, email unik, kirim email OK   | P1   | SweetAlert success + redirect ke login                       |
| TC2 | Semua field valid, email unik, kirim email gagal| P2   | SweetAlert error ("Mailer Error")                            |
| TC3 | Email atau username sudah ada                   | P3   | SweetAlert error: "Email atau Username sudah digunakan"      |
| TC4 | Ada field kosong                                | P4   | SweetAlert error: "Semua field harus diisi"                 |
| TC5 | Akses bukan POST                                | P5   | Tidak ada aksi dilakukan                                     |
| TC6 | DB insert gagal (misal: constraint gagal)       | P6   | SweetAlert error: "Error saat registrasi: ..."               |


## 🧪 Basic Path Testing - `verify.php`

### Cyclomatic Complexity

- Jumlah keputusan: 4
- V(G) = 4 + 1 = **5**

### Jalur Independen

| Path | Deskripsi                                                                                  |
|------|--------------------------------------------------------------------------------------------|
| P1   | Token & email valid → ditemukan → update sukses                                            |
| P2   | Token & email valid → ditemukan → update **gagal**                                         |
| P3   | Token & email **tidak valid** → hasil query 0                                              |
| P4   | Parameter `email` atau `token` **tidak ada** di URL                                        |
| P5   | Koneksi database gagal (simulasi error `mysqli`)                                           |

### Test Case

| TC  | Input                                                  | Path | Expected Output                                                 |
|-----|--------------------------------------------------------|------|------------------------------------------------------------------|
| TC1 | URL valid (email & token cocok, update berhasil)      | P1   | SweetAlert success: “Email berhasil diverifikasi”               |
| TC2 | URL valid tapi update DB gagal (simulasi error DB)    | P2   | SweetAlert error: “Gagal memperbarui data pengguna”             |
| TC3 | URL valid tapi token/email tidak ditemukan            | P3   | SweetAlert error: “Token tidak valid atau sudah kadaluarsa”     |
| TC4 | URL tidak punya parameter `email` atau `token`        | P4   | SweetAlert error: “Token atau email tidak ditemukan di URL”     |
| TC5 | Simulasi koneksi DB gagal (e.g. servername salah)     | P5   | Fatal error: "Koneksi gagal: ..." (die langsung, no JS alert)   |

# Test Case: Validasi Formulir Pendaftaran

| No | Elemen Uji             | Input                                                            | Valid / Invalid | Ekspektasi Aplikasi                     | Hasil Aktual | Status |
|----|------------------------|------------------------------------------------------------------|------------------|-----------------------------------------|--------------|--------|
| 1  | Semua data benar       | Nama: Budi, Email: budi@email.com, dst.                          | Valid            | Data berhasil disimpan, email terkirim  | Sama         | Pass   |
| 2  | Email tidak valid      | Email: budimail.com                                              | Invalid          | Validasi gagal, email harus valid       | Sama         | Pass   |
| 3  | Username pendek        | Username: abc                                                    | Invalid          | Validasi gagal, minimal 4 karakter      | tidak sama         | Fail   |
| 4  | Password pendek        | Password: 1234567                                                | Invalid          | Validasi gagal, minimal 8 karakter      | tidak sama         | Fail   |
| 5  | Nama mengandung simbol | Nama: Budi@Santoso                                               | Invalid          | Validasi gagal, nama tidak boleh simbol | tidak sama         | Fail   |

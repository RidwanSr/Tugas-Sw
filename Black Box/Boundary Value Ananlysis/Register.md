# Equivalence Class Testing

| Variabel      | Equivalence Class                         | Deskripsi                         | Valid / Invalid |
|---------------|-------------------------------------------|-----------------------------------|-----------------|
| Nama Lengkap  | EC1: Tidak kosong dan hanya huruf/spasi   | Nama valid                        | Valid           |
|               | EC2: Kosong                               | Tidak boleh kosong                | Invalid         |
|               | EC3: Mengandung angka atau simbol khusus  | Invalid untuk nama                | Invalid         |
| Email         | EC1: Format email valid                   | user@example.com                  | Valid           |
|               | EC2: Format email tidak valid             | Missing @, kosong, dll            | Invalid         |
| Alamat        | EC1: Tidak kosong                         | Alamat diisi                      | Valid           |
|               | EC2: Kosong                               | Alamat kosong                     | Invalid         |
| Username      | EC1: Panjang 4–20 karakter                | Username valid                    | Valid           |
|               | EC2: Panjang < 4 karakter                 | Terlalu pendek                    | Invalid         |
|               | EC3: Panjang > 20 karakter                | Terlalu panjang                   | Invalid         |
| Password      | EC1: Panjang ≥ 8 karakter                 | Password valid                    | Valid           |
|               | EC2: Panjang < 8 karakter                 | Terlalu pendek                    | Invalid         |
| No Telp       | EC1: Panjang 10–13 digit, hanya angka     | Nomor telepon valid               | Valid           |
|               | EC2: Panjang < 10 digit                   | Terlalu pendek                    | Invalid         |
|               | EC3: Panjang > 13 digit                   | Terlalu panjang                   | Invalid         |
|               | EC4: Mengandung huruf atau simbol         | Hanya boleh angka                 | Invalid         |


# Test Case: Nama Lengkap

| Test Case         | Input           |  ekspektasi                          | actual                        | status |
|-------------------|------------------|----------------------------------------|------------------------------|--------|
| Kosong            | ""               | Ditolak, muncul pesan "Nama wajib diisi" |  Ditolak dan  muncul pesan | Passed |
| Karakter valid    | "Budi Santoso"  | Diterima tanpa error                   | Diterima tanpa error         | Failed |
| Mengandung angka  | "Budi123"       | Ditolak, muncul pesan validasi         | Diterima tanpa error         | Failed |
| Mengandung simbol | "Budi@Santoso"  | Ditolak, muncul pesan validasi         | Diterima tanpa error         | Failed |

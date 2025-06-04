# Equivalence Class Testing

| Variabel      | Equivalence Class                         | Deskripsi                         | Valid / Invalid | actual              |status|
|---------------|-------------------------------------------|-----------------------------------|-----------------|---------------------|-------|
| Nama Lengkap  | EC1: Tidak kosong dan hanya huruf/spasi   | Nama valid                        | Valid           | Muncul orror        | passed |
|               | EC2: Kosong                               | Tidak boleh kosong                | Invalid         | Muncul orror| passed|
|               | EC3: Mengandung angka atau simbol khusus  | Invalid untuk nama                | Invalid         | Diterima|failed|
| Email         | EC1: Format email valid                   | user@example.com                  | Valid           | Diterima|passed|
|               | EC2: Format email tidak valid             | Missing @, kosong, dll            | Invalid         | Muncul orror |passed|
| Alamat        | EC1: Tidak kosong                         | Alamat diisi                      | Valid           | Diterima|passed|
|               | EC2: Kosong                               | Alamat kosong                     | Invalid         | Muncul orror|passed|
| Username      | EC1: Panjang 4–20 karakter                | Username valid                    | Valid           | Diterima|passed|
|               | EC2: Panjang < 4 karakter                 | Terlalu pendek                    | Invalid         | Diterima|failed|
|               | EC3: Panjang > 20 karakter                | Terlalu panjang                   | Invalid         | Diterima|failed|
| Password      | EC1: Panjang ≥ 8 karakter                 | Password valid                    | Valid           | Diterima|passed|
|               | EC2: Panjang < 8 karakter                 | Terlalu pendek                    | Invalid         | Diterima|failed|
| No Telp       | EC1: Panjang 10–13 digit, hanya angka     | Nomor telepon valid               | Valid           | Diterima|passed|
|               | EC2: Panjang < 10 digit                   | Terlalu pendek                    | Invalid         | Diterima|failed|
|               | EC3: Panjang > 13 digit                   | Terlalu panjang                   | Invalid         | Diterima|failed|
|               | EC4: Mengandung huruf atau simbol         | Hanya boleh angka                 | Invalid         | Diterima|failed|

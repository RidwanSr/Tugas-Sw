


# Test Case: Nama Lengkap

| Test Case         | Input           |  ekspektasi                          | actual                        | status |
|-------------------|------------------|----------------------------------------|------------------------------|--------|
| Kosong            | ""               | Ditolak, muncul pesan "Nama wajib diisi" |  Ditolak dan  muncul pesan | Passed |
| Karakter valid    | "Budi Santoso"  | Diterima tanpa error                   | Diterima tanpa error         | Failed |
| Mengandung angka  | "Budi123"       | Ditolak, muncul pesan validasi         | Diterima tanpa error         | Failed |
| Mengandung simbol | "Budi@Santoso"  | Ditolak, muncul pesan validasi         | Diterima tanpa error         | Failed |


# Test Case: Email

| Test Case       | Input             |  ekspektasi                                     | actual                        | status |
|-----------------|-------------------|------------------------|---------------------------------------------|-------------|
| Kosong          | ""                |  Ditolak, muncul pesan "Email wajib diisi"  | Ditolak dan muncul pesan | Passed|
| Tanpa @         | "email.com"       |  Ditolak, muncul pesan "Format email salah" | Ditolak dan muncul pesan| Passed|
| Tanpa domain    | "user@"           |  Ditolak, muncul pesan "Format email salah" | Ditolak, muncul pesan |Passed|
| Valid           | "user@example.com"|  Diterima tanpa error                       | Diterima tanpa error  |Passed|

# Test Case: Alamat

| Test Case       | Input             |  ekspektasi                                     | actual                        | status |
|-----------------|-------------------|------------------------|---------------------------------------------|-------------|
| Kosong          | ""                |  Ditolak dan muncul pesan  | Ditolak dan muncul pesan | Passed|
|  Alamat normal  | "Jl. Merdeka No. 10"|   Diterima tanpa error     | Diterima tanpa error | Passed|

# Test Case: Username

| Test Case       | Input             |  ekspektasi                                     | actual                        | status |
|-----------------|-------------------|------------------------|---------------------------------------------|-------------|
| Kurang dari 4         | "abc"            |   Ditolak dan muncul pesan  |Diterima tanpa errorn          | Failed|
| Tepat 4        | "abcd"         |  Diterima tanpa error | Diterima tanpa error                         | Passed|
| Lebih dari 20     |  "abcdefghijklmnopqrstu"        |   Ditolak dan muncul pesan | Diterima tanpa error |Failed|


# Test Case: Password

| Test Case      | Input       | Ekspektasi             | Actual                        | Status |
|----------------|-------------|------------------------|-------------------------------|--------|
| Kurang dari 8  | "1234567"   | Ditolak dan muncul pesan  |  Diterima tanpa error   |    Failed    |
| Tepat 8        | "12345678"  |  Diterima tanpa error     |  Diterima tanpa error      |      Passed  |

# Test Case: No Telp

| Test Case         | Input             | Ekspektasi             | Actual                        | Status |
|-------------------|-------------------|------------------------|-------------------------------|--------|
| Kurang dari 10    | "081234567"       |  Ditolak dan muncul pesan |     Diterima tanpa error                          |  Failed       |
| Tepat 12          | "0812345678"      |      Ditolak dan muncul pesan                  |      Diterima tanpa error                         |   Passed       |
| Lebih dari 15     | "08123456789012l734"|     Ditolak dan muncul pesan                   |       Diterima tanpa error                        |   Failed      |
| Mengandung huruf  | "08123abc456"     |     Ditolak dan muncul pesan                   |       Diterima tanpa error                        |    Failed     |




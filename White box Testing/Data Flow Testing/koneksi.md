Uji Flow Testing pada koneksi.php

| **Kondisi yang Diuji**                                         | **Hasil yang Diharapkan**                                                        | **Hasil Aktual**                                            | **Status** |
| -------------------------------------------------------------- | -------------------------------------------------------------------------------- | ----------------------------------------------------------- | ---------- |
| Nilai `$servername`, `$username`, `$password`, `$dbname` valid | Koneksi berhasil, tidak terjadi error                                            | Koneksi berhasil, tidak ada error                           | ✅          |
| Nilai `$servername` salah (misal: `"localhost1"`)              | `$conn->connect_error` bernilai true, program `die()` dengan pesan error koneksi | Program berhenti dengan pesan error: *"Koneksi gagal: ..."* | ✅          |
| Nilai `$username` salah (misal: `"admin"`)                     | `$conn->connect_error` bernilai true, program `die()` dengan pesan error         | Program berhenti dengan pesan error: *"Koneksi gagal: ..."* | ✅          |
| Nilai `$password` salah                                        | `$conn->connect_error` bernilai true, program `die()` dengan pesan error         | Program berhenti dengan pesan error: *"Koneksi gagal: ..."* | ✅          |
| Nilai `$dbname` salah (misal: database tidak ada)              | `$conn->connect_error` bernilai true, program `die()` dengan pesan error         | Program berhenti dengan pesan error: *"Koneksi gagal: ..."* | ✅          |

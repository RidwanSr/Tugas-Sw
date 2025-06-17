# 🔁 Regression Testing – Login

## Tujuan
Memastikan fungsi login tetap berjalan normal setelah adanya perubahan sistem (misalnya: penambahan validasi input, perubahan struktur database, atau integrasi dengan fitur keamanan lain).

## Skenario Uji

| No. | Deskripsi Perubahan               | Input Uji            | Hasil yang Diharapkan       | Hasil Aktual | Status |
|-----|----------------------------------|----------------------|-----------------------------|--------------|--------|
| 1   | Penambahan validasi karakter XSS | `<script>` + pass123 | Login gagal, input ditolak  | Sesuai       | ✅      |
| 2   | Perubahan hashing password       | user1 + password123  | Login berhasil (jika match) | Sesuai       | ✅      |
| 3   | Perubahan redirect setelah login | user1 + password123  | Redirect ke halaman.php     | Sesuai       | ✅      |
| 4   | Penambahan session timeout       | user1 + password123  | Sesi logout otomatis        | Sesuai       | ✅      |
| 5   | Tambah log aktivitas login       | user1 + password123  | Log disimpan di database    | Sesuai       | ✅      |

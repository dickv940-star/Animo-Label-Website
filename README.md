# Animo Label Website

Website company profile + katalog produk Animo Label. PHP 8 + MySQL, tanpa keranjang/checkout.

## Fitur
- Homepage modern dan responsive
- Katalog produk dengan harga & deskripsi opsional
- Kategori, banner, portfolio, layanan, tentang, dan kontak
- WhatsApp CTA
- Admin CMS untuk mengelola konten
- Upload logo, foto produk, banner, dan portfolio
- Siap dipindahkan ke cPanel

## Struktur & cara edit
Panduan lengkap: **[docs/PANDUAN-STRUKTUR.md](docs/PANDUAN-STRUKTUR.md)**.

### Edit tampilan
- CSS website: `assets/css/style.css`
- JavaScript: `assets/js/app.js`
- Header: `includes/header.php`
- Footer: `includes/footer.php`

### Edit konten
Gunakan CMS Admin untuk Produk, Kategori, Banner, Portfolio, dan Pengaturan/logo.

### Server
PHP/MySQL perlu dijalankan di XAMPP/Laragon atau hosting. GitHub Pages hanya dipakai untuk preview `index.html` dan tidak menjalankan PHP/MySQL.

## cPanel
1. Upload source ke hosting.
2. Buat database MySQL dan user.
3. Import `database/animo_label.sql`.
4. Isi `config/database.php`.
5. Pastikan PHP dapat membuat folder `uploads/`.
6. Buka `/admin/` untuk pengelolaan konten.

**Catatan keamanan:** jangan commit password database, file upload produksi, atau kredensial Admin ke repository.

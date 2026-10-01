# Panduan Struktur Animo Label

## Tujuan struktur

Repository ini dibagi berdasarkan fungsi supaya saat mengedit kode tidak perlu mencari di satu file besar.

```text
Animo-Label-Website/
├── index.php                    # Homepage produksi / cPanel
├── index.html                   # Homepage preview GitHub Pages
├── produk.php                   # Katalog produk produksi
├── produk-detail.php            # Detail produk produksi
├── layanan.php                  # Halaman layanan
├── portfolio.php                # Portfolio
├── tentang.php                  # Tentang
├── kontak.php                   # Kontak
│
├── admin/                       # CMS Admin
│   ├── index.php                # Login
│   ├── dashboard.php            # Dashboard
│   ├── products.php             # Produk + foto
│   ├── categories.php           # Kategori
│   ├── banners.php              # Banner
│   ├── portfolio.php            # Portfolio
│   ├── media.php                # Media
│   ├── settings.php             # Identitas website
│   └── admin.css                # CSS CMS
│
├── assets/
│   ├── css/
│   │   ├── style.css            # CSS global
│   │   ├── home-premium.css     # CSS homepage utama
│   │   ├── category-slider.css  # CSS slider kategori
│   │   ├── catalog-premium.css  # CSS katalog
│   │   └── whatsapp.css         # Tombol WhatsApp
│   │
│   ├── js/
│   │   ├── app.js               # JavaScript umum
│   │   ├── home-premium.js      # Banner + header homepage
│   │   ├── category-slider.js   # Slider kategori homepage
│   │   └── catalog.js           # Data + filter katalog
│   │
│   ├── produk/                  # Foto produk
│   ├── logo-animo-label.png     # Logo
│   └── img-placeholder.svg      # Placeholder
│
├── includes/
│   ├── header.php               # Komponen header PHP
│   ├── footer.php               # Komponen footer PHP
│   └── functions.php            # Fungsi umum
│
├── config/
│   └── database.php             # Koneksi database
│
├── database/
│   └── animo_label.sql          # Struktur database
│
└── docs/
    └── PANDUAN-STRUKTUR.md      # Dokumentasi
```

## File yang paling sering diedit

| Kebutuhan | File |
|---|---|
| Warna, font, komponen umum | assets/css/style.css |
| Tampilan homepage | assets/css/home-premium.css |
| Slider kategori | assets/css/category-slider.css |
| Header, banner, pencarian | assets/js/home-premium.js |
| Slider kategori + autoplay | assets/js/category-slider.js |
| Data produk GitHub Pages | assets/js/catalog.js |
| Header PHP / cPanel | includes/header.php |
| Footer PHP / cPanel | includes/footer.php |
| Homepage produksi | index.php |
| Homepage GitHub Pages | index.html |

## Prinsip editing

1. Satu fungsi = satu file bila memungkinkan.
2. CSS ditulis satu properti per baris, sehingga editor bergerak ke bawah, bukan melebar ke samping.
3. JavaScript memakai blok komentar dan fungsi yang terpisah.
4. HTML homepage tidak lagi menyimpan CSS/JavaScript slider kategori secara inline.
5. Jangan mengubah file foto produk untuk mengubah tampilan CSS.
6. Untuk produksi cPanel, utamakan CMS Admin untuk konten produk, kategori, banner, portfolio, logo, dan identitas.

## Lokasi edit cepat

### Mengubah warna website
Edit: assets/css/style.css

### Mengubah tampilan homepage
Edit: assets/css/home-premium.css

### Mengubah kartu kategori homepage
Edit: assets/css/category-slider.css

### Mengubah banner dan pencarian header
Edit: assets/js/home-premium.js

### Mengubah tombol/autoplay kategori
Edit: assets/js/category-slider.js

### Mengubah produk pada preview GitHub Pages
Edit: assets/js/catalog.js

### Mengubah konten produksi dari CMS
Gunakan admin/products.php, admin/categories.php, admin/banners.php, admin/portfolio.php, admin/media.php, dan admin/settings.php.

## Catatan

GitHub Pages menjalankan versi HTML/asset statis. File PHP digunakan saat website dipasang pada server cPanel yang mendukung PHP + MySQL.

Jangan menyimpan password database atau kredensial administrator di repository.

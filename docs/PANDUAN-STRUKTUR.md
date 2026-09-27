# Panduan Struktur Animo Label

## Struktur utama

```text
Animo-Label-Website/
├── index.php                 # Homepage produksi
├── index.html                # Preview GitHub Pages
├── produk.php                # Katalog
├── produk-detail.php         # Detail produk
├── layanan.php               # Layanan
├── portfolio.php             # Portfolio
├── tentang.php               # Tentang
├── kontak.php                # Kontak
├── admin/                    # CMS Admin
│   ├── index.php             # Login
│   ├── dashboard.php         # Dashboard
│   ├── products.php          # Produk + upload foto
│   ├── categories.php        # Kategori
│   ├── banners.php           # Banner + upload
│   ├── portfolio.php         # Portfolio + upload
│   ├── settings.php          # Identitas + logo
│   └── admin.css             # Tampilan CMS
├── assets/
│   ├── css/style.css         # Styling website
│   ├── js/app.js             # JavaScript
│   ├── animo-logo.svg        # Logo bawaan
│   └── img-placeholder.svg   # Placeholder
├── includes/
│   ├── header.php            # Header + navigasi
│   ├── footer.php            # Footer
│   └── functions.php         # Fungsi umum + upload
├── config/database.php       # Koneksi MySQL
├── database/animo_label.sql  # Database
└── docs/                     # Dokumentasi
```

## Paling sering diedit

| Kebutuhan | File |
|---|---|
| Warna, font, layout | `assets/css/style.css` |
| JavaScript | `assets/js/app.js` |
| Header/menu | `includes/header.php` |
| Footer | `includes/footer.php` |
| Homepage | `index.php` |
| Preview GitHub | `index.html` |
| Fungsi upload | `includes/functions.php` |

## Konten

Untuk produksi, **utamakan CMS Admin** daripada mengedit PHP manual:
- Produk → `admin/products.php`
- Kategori → `admin/categories.php`
- Banner → `admin/banners.php`
- Portfolio → `admin/portfolio.php`
- Logo/identitas → `admin/settings.php`

## Database & keamanan

- Struktur/data awal: `database/animo_label.sql`
- Koneksi: `config/database.php`
- Jangan menyimpan password database atau kredensial Admin di repository.
- Folder `uploads/` dibuat otomatis di server saat upload pertama.

## Prinsip struktur

**Tampilan → assets/**  
**Konten → CMS Admin**  
**Logika bersama → includes/**  
**Koneksi → config/**  
**Database → database/**  
**Dokumentasi → docs/**

Root PHP tetap dipertahankan supaya URL website cPanel tetap sederhana dan tidak perlu mengubah routing yang sudah ada.

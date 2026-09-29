CREATE TABLE IF NOT EXISTS settings(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100) UNIQUE,value TEXT NULL);
CREATE TABLE IF NOT EXISTS admins(id INT AUTO_INCREMENT PRIMARY KEY,username VARCHAR(80) UNIQUE,password_hash VARCHAR(255) NOT NULL);
CREATE TABLE IF NOT EXISTS categories(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(160) NOT NULL,image VARCHAR(255),sort_order INT DEFAULT 0);
CREATE TABLE IF NOT EXISTS banners(id INT AUTO_INCREMENT PRIMARY KEY,eyebrow VARCHAR(160),title VARCHAR(255) NOT NULL,subtitle TEXT,image VARCHAR(255),button_text VARCHAR(100),button_url VARCHAR(255),sort_order INT DEFAULT 0,active TINYINT DEFAULT 1);
CREATE TABLE IF NOT EXISTS products(id INT AUTO_INCREMENT PRIMARY KEY,category_id INT NULL,name VARCHAR(200) NOT NULL,description TEXT NULL,price VARCHAR(120) NULL,image VARCHAR(255),featured TINYINT DEFAULT 0,active TINYINT DEFAULT 1,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE IF NOT EXISTS product_images(id INT AUTO_INCREMENT PRIMARY KEY,product_id INT NOT NULL,image VARCHAR(255) NOT NULL,sort_order INT DEFAULT 0,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,INDEX(product_id));
CREATE TABLE IF NOT EXISTS services(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(160) NOT NULL,description TEXT,sort_order INT DEFAULT 0,active TINYINT DEFAULT 1);
CREATE TABLE IF NOT EXISTS portfolio(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(200) NOT NULL,description TEXT,image VARCHAR(255),sort_order INT DEFAULT 0,active TINYINT DEFAULT 1);
INSERT IGNORE INTO settings(name,value) VALUES('site_name','Animo Label'),('description','Solusi label dan printing untuk kebutuhan bisnis Anda.'),('about_title','Mencetak ide menjadi identitas brand.'),('about','Animo Label membantu bisnis menghadirkan label dan materi printing yang profesional.'),('address','Alamat perusahaan'),('phone',''),('whatsapp','628111711338'),('email',''),('instagram','');
UPDATE categories SET name='Label Thermal',image='assets/banner-label-thermal.svg',sort_order=1 WHERE name='Label Sticker';
INSERT INTO categories(name,image,sort_order) SELECT 'Label Thermal','assets/banner-label-thermal.svg',1 WHERE NOT EXISTS (SELECT 1 FROM categories WHERE name='Label Thermal');
UPDATE categories SET name='Label Semicoated',image='assets/banner-label-yupo.svg',sort_order=2 WHERE name='Label Roll';
INSERT INTO categories(name,image,sort_order) SELECT 'Label Semicoated','assets/banner-label-yupo.svg',2 WHERE NOT EXISTS (SELECT 1 FROM categories WHERE name='Label Semicoated');
UPDATE categories SET name='Stiker Bulat',image='assets/banner-sticker-custom.svg',sort_order=3 WHERE name='Packaging';
INSERT INTO categories(name,image,sort_order) SELECT 'Stiker Bulat','assets/banner-sticker-custom.svg',3 WHERE NOT EXISTS (SELECT 1 FROM categories WHERE name='Stiker Bulat');
UPDATE categories SET name='Stiker HVS',image='assets/banner-sticker-custom.svg',sort_order=4 WHERE name='Hangtag';
INSERT INTO categories(name,image,sort_order) SELECT 'Stiker HVS','assets/banner-sticker-custom.svg',4 WHERE NOT EXISTS (SELECT 1 FROM categories WHERE name='Stiker HVS');
INSERT INTO categories(name,image,sort_order) SELECT 'Label Size','assets/banner-sticker-custom.svg',5 WHERE NOT EXISTS (SELECT 1 FROM categories WHERE name='Label Size');
INSERT INTO categories(name,image,sort_order) SELECT 'Label Barcode','assets/banner-label-thermal.svg',6 WHERE NOT EXISTS (SELECT 1 FROM categories WHERE name='Label Barcode');
INSERT INTO categories(name,image,sort_order) SELECT 'Label Numbering','assets/banner-sticker-custom.svg',7 WHERE NOT EXISTS (SELECT 1 FROM categories WHERE name='Label Numbering');
INSERT INTO categories(name,image,sort_order) SELECT 'Label Fashion','assets/banner-sticker-custom.svg',8 WHERE NOT EXISTS (SELECT 1 FROM categories WHERE name='Label Fashion');
INSERT IGNORE INTO services(name,description,sort_order) VALUES('Custom Label','Label sesuai ukuran, material, bentuk, dan finishing.',1),('Label & Barcode','Kebutuhan label dan barcode untuk operasional, retail, gudang, garment, restoran, dan bisnis lainnya.',2),('Stiker Operasional','Stiker bulat, label size, HVS dan kebutuhan penanda lainnya.',3);
// Katalog awal yang sesuai dengan produk ANIMO LABEL. Harga adalah snapshot katalog dan dapat diubah melalui Admin.
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL THERMAL 70 X 50 MM — ISI 1.000 PCS','Direct Thermal untuk barcode dan kebutuhan label harian.','Rp28.000–Rp55.000','assets/banner-label-thermal.svg',1,1 FROM categories c WHERE c.name='Label Thermal' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL THERMAL 70 X 50 MM — ISI 1.000 PCS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL THERMAL 80 X 50 MM — ISI 1.000 PCS','Stiker thermal 8 × 5 cm untuk printer barcode.','Rp28.500–Rp58.200','assets/banner-label-thermal.svg',1,1 FROM categories c WHERE c.name='Label Thermal' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL THERMAL 80 X 50 MM — ISI 1.000 PCS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL THERMAL 65 X 40 MM — ISI 1.000 PCS','Direct Thermal 65 × 40 mm.','Rp40.000','assets/banner-label-thermal.svg',1,1 FROM categories c WHERE c.name='Label Thermal' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL THERMAL 65 X 40 MM — ISI 1.000 PCS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL THERMAL 50 X 60 MM — ISI 1.000 PCS','Direct Thermal 5 × 6 cm.','Rp23.000–Rp81.000','assets/banner-label-thermal.svg',0,1 FROM categories c WHERE c.name='Label Thermal' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL THERMAL 50 X 60 MM — ISI 1.000 PCS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL THERMAL 80 X 40 MM — ISI 1.000 PCS','Direct Thermal 8 × 4 cm untuk barcode.','Rp53.000','assets/banner-label-thermal.svg',0,1 FROM categories c WHERE c.name='Label Thermal' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL THERMAL 80 X 40 MM — ISI 1.000 PCS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL THERMAL 80 X 30 MM — ISI 1.000 PCS','Direct Thermal 8 × 3 cm.','Rp40.800','assets/banner-label-thermal.svg',0,1 FROM categories c WHERE c.name='Label Thermal' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL THERMAL 80 X 30 MM — ISI 1.000 PCS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL THERMAL 33 X 19 MM — 2 LINE','Label barcode thermal 33 × 19 mm, isi 1.000 pcs.','Rp17.500','assets/banner-label-thermal.svg',0,1 FROM categories c WHERE c.name='Label Thermal' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL THERMAL 33 X 19 MM — 2 LINE');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL THERMAL 33 X 15 MM','Label barcode direct thermal ukuran kecil.','Rp25.000','assets/banner-label-thermal.svg',0,1 FROM categories c WHERE c.name='Label Thermal' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL THERMAL 33 X 15 MM');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL THERMAL 78 X 100 MM','Kertas stiker thermal untuk barcode dan pengiriman.','Rp12.000','assets/banner-label-thermal.svg',0,1 FROM categories c WHERE c.name='Label Thermal' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL THERMAL 78 X 100 MM');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL SEMICOATED 80 X 50 MM — ISI 1.000 PCS','Label barcode semicoated 8 × 5 cm.','Rp26.000–Rp50.000','assets/banner-label-yupo.svg',1,1 FROM categories c WHERE c.name='Label Semicoated' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL SEMICOATED 80 X 50 MM — ISI 1.000 PCS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL SEMICOATED 60 X 40 MM — ISI 1.000 PCS','Label barcode semicoated 6 × 4 cm.','Rp31.000','assets/banner-label-yupo.svg',0,1 FROM categories c WHERE c.name='Label Semicoated' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL SEMICOATED 60 X 40 MM — ISI 1.000 PCS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL SEMICOATED 80 X 30 MM — ISI 1.000 PCS','Label barcode semicoated 8 × 3 cm.','Rp32.000','assets/banner-label-yupo.svg',0,1 FROM categories c WHERE c.name='Label Semicoated' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL SEMICOATED 80 X 30 MM — ISI 1.000 PCS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL SEMICOATED 100 X 40 MM — ISI 1.000 PCS','Label barcode semicoated 10 × 4 cm.','Rp55.000','assets/banner-label-yupo.svg',0,1 FROM categories c WHERE c.name='Label Semicoated' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL SEMICOATED 100 X 40 MM — ISI 1.000 PCS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL SEMICOATED 100 X 30 MM — ISI 1.000 PCS','Label barcode semicoated 10 × 3 cm.','Rp45.000','assets/banner-label-yupo.svg',0,1 FROM categories c WHERE c.name='Label Semicoated' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL SEMICOATED 100 X 30 MM — ISI 1.000 PCS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL SEMICOATED 102 X 48 MM — ISI 1.000 PCS','Label barcode semicoated 102 × 48 mm.','Rp61.000','assets/banner-label-yupo.svg',0,1 FROM categories c WHERE c.name='Label Semicoated' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL SEMICOATED 102 X 48 MM — ISI 1.000 PCS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'STIKER BULAT WARNA — COLOR DOT STICKERS','Stiker bulat warna-warni untuk penanda dan kebutuhan operasional.','Rp12.000','assets/banner-sticker-custom.svg',1,1 FROM categories c WHERE c.name='Stiker Bulat' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='STIKER BULAT WARNA — COLOR DOT STICKERS');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'STIKER BULAT WARNA 25 MM — ROL','Color dot sticker diameter 25 mm.','Rp9.350','assets/banner-sticker-custom.svg',0,1 FROM categories c WHERE c.name='Stiker Bulat' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='STIKER BULAT WARNA 25 MM — ROL');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'STIKER BULAT ANGKA TAHAN AIR 20 MM','Stiker angka vinyl waterproof diameter 2 cm.','Rp9.950','assets/banner-sticker-custom.svg',0,1 FROM categories c WHERE c.name='Stiker Bulat' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='STIKER BULAT ANGKA TAHAN AIR 20 MM');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'STIKER HVS PUTIH DOFF A4 — 20 LEMBAR','Kertas sticker HVS matte putih ukuran A4.','Rp21.500','assets/banner-sticker-custom.svg',1,1 FROM categories c WHERE c.name='Stiker HVS' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='STIKER HVS PUTIH DOFF A4 — 20 LEMBAR');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'STIKER HVS PUTIH DOFF A4 — 50 LEMBAR','Kertas sticker HVS matte putih ukuran A4.','Rp40.500','assets/banner-sticker-custom.svg',0,1 FROM categories c WHERE c.name='Stiker HVS' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='STIKER HVS PUTIH DOFF A4 — 50 LEMBAR');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'STIKER SIZE BAJU — XS S M L XL XXL 3XL 4XL 5XL','Label size pakaian ukuran 1 cm.','Rp10.500','assets/banner-sticker-custom.svg',1,1 FROM categories c WHERE c.name='Label Size' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='STIKER SIZE BAJU — XS S M L XL XXL 3XL 4XL 5XL');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL BARCODE THERMAL — BERBAGAI UKURAN','Pilihan ukuran label untuk barcode, gudang, retail, dan pengiriman.','Konsultasi','assets/banner-label-thermal.svg',0,1 FROM categories c WHERE c.name='Label Barcode' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL BARCODE THERMAL — BERBAGAI UKURAN');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL NUMBERING','Label bernomor untuk kebutuhan identifikasi dan operasional.','Konsultasi','assets/banner-sticker-custom.svg',0,1 FROM categories c WHERE c.name='Label Numbering' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL NUMBERING');
INSERT INTO products(category_id,name,description,price,image,featured,active)
SELECT c.id,'LABEL SIZE & IDENTITAS PRODUK','Pilihan label untuk kebutuhan garment, fashion, dan retail.','Konsultasi','assets/banner-sticker-custom.svg',0,1 FROM categories c WHERE c.name='Label Fashion' AND NOT EXISTS (SELECT 1 FROM products p WHERE p.name='LABEL SIZE & IDENTITAS PRODUK');

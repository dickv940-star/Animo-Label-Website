<?php $title='Media';require '_head.php'; ?>
<h1>Media</h1>
<p class="page-intro">Pusat pengelolaan gambar website. File gambar produksi disimpan di server melalui CMS, bukan di repository GitHub.</p>
<div class="admin-grid">
  <a class="menu-card" href="settings.php"><span class="menu-icon">L</span><strong>Logo</strong><small>Upload atau ganti logo website.</small></a>
  <a class="menu-card" href="products.php"><span class="menu-icon">P</span><strong>Foto Produk</strong><small>Upload foto saat menambah produk.</small></a>
  <a class="menu-card" href="banners.php"><span class="menu-icon">B</span><strong>Foto Banner</strong><small>Upload gambar banner homepage.</small></a>
  <a class="menu-card" href="portfolio.php"><span class="menu-icon">F</span><strong>Foto Portfolio</strong><small>Upload gambar karya atau project.</small></a>
</div>
<div class="panel"><h2>Lokasi file upload</h2><p><code>/uploads/logo/</code> · <code>/uploads/products/</code> · <code>/uploads/banners/</code> · <code>/uploads/portfolio/</code></p></div>
<?php require '_foot.php'; ?>
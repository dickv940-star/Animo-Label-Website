<?php require_once __DIR__.'/../config/database.php';require_once __DIR__.'/functions.php'; ?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=e($title??setting('site_name','Animo Label'))?></title><link rel="stylesheet" href="assets/css/style.css"><link rel="stylesheet" href="assets/css/whatsapp.css"></head><body><header class="header"><a class="brand" href="./"><?=setting('logo')?'<img class="site-logo" src="'.e(setting('logo')).'" alt="Animo Label">':'<img class="site-logo" src="assets/animo-logo.svg" alt="ANIMO LABEL">'?></a><form class="header-search" action="produk.php" method="get" role="search"><span class="header-search-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><circle cx="11" cy="11" r="6.5"></circle><path d="m16 16 4.2 4.2"></path></svg></span><input type="search" name="q" value="<?=e($_GET['q']??'')?>" placeholder="Cari produk..." aria-label="Cari produk"><button class="header-search-clear" type="button" aria-label="Hapus kata kunci" title="Hapus kata kunci">×</button></form><nav class="main-nav"><a href="./">Beranda</a><a href="produk.php">Produk</a><a href="layanan.php">Layanan</a><a href="portfolio.php">Portfolio</a><a href="tentang.php">Tentang</a><a href="kontak.php">Kontak</a></nav><a class="btn btn-dark nav-cta" href="<?=e(wa())?>">Konsultasi WhatsApp</a></header><a class="wa-float" href="<?=e(wa())?>" target="_blank" rel="noopener" aria-label="ORDER / KONSULTASI VIA WHATSAPP" title="ORDER / KONSULTASI VIA WHATSAPP"><img src="assets/whatsapp-icon.svg" alt="WhatsApp"><span class="wa-tooltip" role="tooltip">ORDER / KONSULTASI VIA WHATSAPP</span></a><main>
<?php require_once __DIR__.'/../config/database.php';require_once __DIR__.'/functions.php';
$siteName=setting('site_name','Animo Label');
$logo=setting('logo');
$waUrl=wa('Halo ANIMO LABEL, saya ingin konsultasi produk label.');
$path=basename(parse_url($_SERVER['REQUEST_URI']??'',PHP_URL_PATH));
$isProduct=in_array($path,['produk.php','produk.html','produk-detail.php']);
?>
<!doctype html><html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=e($title??$siteName)?></title>
<meta name="description" content="<?=e(setting('description','Solusi label dan sticker profesional untuk kebutuhan bisnis.'))?>">
<link rel="stylesheet" href="assets/css/style.css?v=20260929">
<link rel="stylesheet" href="assets/css/home-premium.css?v=20260929">
<link rel="stylesheet" href="assets/css/catalog-premium.css?v=20260929">
<link rel="stylesheet" href="assets/css/whatsapp.css?v=20260929">
</head><body>
<div class="topbar"><div>Solusi label &amp; sticker untuk kebutuhan bisnis</div><div class="topbar-links"><span>Senin–Sabtu</span><span>•</span><a href="<?=e($waUrl)?>" target="_blank" rel="noopener">WhatsApp <?=e(setting('whatsapp','+62 811-1711-338'))?></a></div></div>
<header class="header premium-header">
<a class="brand" href="./"><img class="site-logo" src="<?=e($logo?:'assets/logo-animo-label.png')?>" alt="<?=e($siteName)?>"></a>
<form class="header-search premium-search" action="produk.php" method="get" role="search">
<span class="header-search-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"></circle><path d="m16 16 4.2 4.2"></path></svg></span>
<input type="search" name="q" value="<?=e($_GET['q']??'')?>" placeholder="Cari produk label atau sticker..." aria-label="Cari produk">
<button class="header-search-clear" type="button" aria-label="Hapus kata kunci">×</button>
<button class="header-search-submit" type="submit">Cari</button>
</form>
<nav class="main-nav premium-nav">
<a class="<?=$path==='index.php'||$path===''?'active':''?>" href="./">Beranda</a>
<a class="<?=$isProduct?'active':''?>" href="produk.php">Produk</a>
<a href="produk.php">Kategori</a><a href="tentang.php">Tentang</a><a href="kontak.php">Kontak</a>
</nav>
<a class="btn btn-dark nav-cta" href="<?=e($waUrl)?>" target="_blank" rel="noopener">Konsultasi</a>
<button class="mobile-menu-btn" type="button" aria-label="Buka menu">☰</button>
</header>
<nav class="category-strip"><div class="category-strip-inner">
<?php foreach($pdo->query('SELECT * FROM categories ORDER BY sort_order,id DESC') as $c): ?><a href="produk.php?category=<?=urlencode($c['id'])?>"><?=e($c['name'])?></a><?php endforeach; ?>
</div></nav>
<a class="wa-float premium-wa" href="<?=e($waUrl)?>" target="_blank" rel="noopener" aria-label="WhatsApp"><img src="assets/whatsapp-icon.webp" alt="WhatsApp"></a>
<main>
<?php
require_once __DIR__.'/../config/database.php';
require_once __DIR__.'/functions.php';

$siteName=setting('site_name','Animo Label');
$logo=setting('logo');
$description=setting('description','Solusi label dan sticker profesional untuk kebutuhan bisnis.');
$address=setting('address');
$phone=setting('phone',setting('whatsapp','+62 811-1711-338'));
$instagram=setting('instagram');
$waUrl=wa('Halo ANIMO LABEL, saya ingin konsultasi produk label.');
$shopee=setting('shopee','https://shopee.co.id/animolabel');
$tokopedia=setting('tokopedia','https://www.tokopedia.com/animolabel');
$categories=$pdo->query('SELECT * FROM categories ORDER BY sort_order,id DESC')->fetchAll();
?>
</main>

<footer class="animo-footer">
  <div class="animo-footer-main">
    <div class="animo-footer-brand">
      <a href="./" class="animo-footer-logo"><img src="<?=e($logo?:'assets/logo-animo-label.png')?>" alt="<?=e($siteName)?>"></a>
      <p><?=e($description)?></p>
      <div class="animo-footer-market">
        <a href="<?=e($shopee)?>" target="_blank" rel="noopener" class="market-badge"><span class="market-badge-icon shopee">S</span><span><b>Shopee</b><small>ANIMO LABEL</small></span></a>
        <a href="<?=e($tokopedia)?>" target="_blank" rel="noopener" class="market-badge"><span class="market-badge-icon tokopedia">T</span><span><b>Tokopedia</b><small>ANIMO LABEL</small></span></a>
      </div>
    </div>

    <div class="animo-footer-col">
      <h3>Produk</h3>
      <?php foreach(array_slice($categories,0,7) as $c): ?><a href="produk.php?category=<?=urlencode($c['id'])?>"><?=e($c['name'])?></a><?php endforeach; ?>
      <a class="footer-more" href="produk.php">Lihat semua produk →</a>
    </div>

    <div class="animo-footer-col">
      <h3>Perusahaan</h3>
      <a href="tentang.php">Tentang Animo Label</a>
      <a href="produk.php">Produk</a>
      <a href="portfolio.php">Portfolio</a>
      <a href="kontak.php">Kontak</a>
    </div>

    <div class="animo-footer-col animo-footer-contact">
      <h3>Hubungi Kami</h3>
      <?php if($address): ?><p><?=nl2br(e($address))?></p><?php endif; ?>
      <?php if($phone): ?><a href="tel:<?=e(preg_replace('/\D+/','',$phone))?>"><?=e($phone)?></a><?php endif; ?>
      <a href="<?=e($waUrl)?>" target="_blank" rel="noopener" class="footer-wa-link">WhatsApp →</a>
      <?php if($instagram): ?><a href="<?=e($instagram)?>" target="_blank" rel="noopener">Instagram →</a><?php endif; ?>
    </div>
  </div>
  <div class="animo-footer-bottom"><span>© <?=date('Y')?> <?=e($siteName)?>. All Rights Reserved.</span><span>Label &amp; Sticker Profesional</span></div>
</footer>

<script src="assets/js/home-premium.js?v=20260929"></script>
<script src="assets/js/app.js?v=20260929"></script>
</body></html>
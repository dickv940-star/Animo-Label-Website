<?php
require_once __DIR__.'/../config/database.php';
require_once __DIR__.'/functions.php';
$siteName=setting('site_name','Animo Label');
$logo=setting('logo');
$description=setting('description','Solusi label dan printing untuk kebutuhan bisnis Anda.');
$address=setting('address');
$phone=setting('phone',setting('whatsapp','+62 811-1711-338'));
$email=setting('email');
$instagram=setting('instagram');
$facebook=setting('facebook');
$tiktok=setting('tiktok');
$waUrl=wa('Halo ANIMO LABEL, saya ingin konsultasi produk label.');
$shopee=setting('shopee','https://shopee.co.id/animolabel');
$tokopedia=setting('tokopedia','https://www.tokopedia.com/animolabel');
$categories=$pdo->query('SELECT * FROM categories ORDER BY sort_order,id DESC')->fetchAll();
?>
</main>
<footer class="animo-footer">
  <div class="animo-footer-main">
    <section class="animo-footer-brand">
      <a href="./" class="animo-footer-logo"><img src="<?=e($logo?:'assets/logo-animo-label.png')?>" alt="<?=e($siteName)?>"></a>
      <p><?=e($description)?></p>
      <div class="animo-footer-social" aria-label="Media sosial">
        <a href="<?=e($waUrl)?>" target="_blank" rel="noopener" aria-label="WhatsApp" title="WhatsApp"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 11.7a8 8 0 0 1-11.9 7l-4.1 1.2 1.3-4A8 8 0 1 1 20 11.7Z"/><path d="M9 8.8c.2-.4.5-.4.8-.1l1 1c.2.2.2.5 0 .7l-.5.5c.6 1 1.4 1.7 2.4 2.2l.5-.5c.2-.2.5-.2.7 0l1 1c.3.3.2.6-.1.8-.6.4-1.2.5-1.8.2-2.7-1.2-4.6-3-5.8-5.7-.3-.7-.2-1.3.2-1.9Z"/></svg></a>
        <?php if($instagram): ?><a href="<?=e($instagram)?>" target="_blank" rel="noopener" aria-label="Instagram" title="Instagram"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="3.5" width="17" height="17" rx="4"/><circle cx="12" cy="12" r="4"/><circle cx="17.4" cy="6.8" r="1"/></svg></a><?php endif; ?>
        <?php if($facebook): ?><a href="<?=e($facebook)?>" target="_blank" rel="noopener" aria-label="Facebook" title="Facebook"><b>f</b></a><?php endif; ?>
        <?php if($tiktok): ?><a href="<?=e($tiktok)?>" target="_blank" rel="noopener" aria-label="TikTok" title="TikTok"><b>♪</b></a><?php endif; ?>
      </div>
      <div class="animo-footer-market">
        <a href="<?=e($shopee)?>" target="_blank" rel="noopener" class="market-badge"><span class="market-badge-icon shopee">S</span><span><b>Shopee</b><small>ANIMO LABEL</small></span></a>
        <a href="<?=e($tokopedia)?>" target="_blank" rel="noopener" class="market-badge"><span class="market-badge-icon tokopedia">T</span><span><b>Tokopedia</b><small>ANIMO LABEL</small></span></a>
      </div>
    </section>
    <section class="animo-footer-col">
      <h3>Produk</h3>
      <?php foreach(array_slice($categories,0,7) as $c): ?><a href="produk.php?category=<?=urlencode($c['id'])?>"><?=e($c['name'])?></a><?php endforeach; ?>
      <a class="footer-more" href="produk.php">Lihat semua produk →</a>
    </section>
    <section class="animo-footer-col">
      <h3>Perusahaan</h3>
      <a href="tentang.php">Tentang Animo Label</a><a href="produk.php">Produk</a><a href="portfolio.php">Portfolio</a><a href="kontak.php">Kontak</a>
    </section>
    <section class="animo-footer-col animo-footer-contact">
      <h3>Hubungi Kami</h3>
      <?php if($address): ?><p class="footer-address"><?=nl2br(e($address))?></p><?php endif; ?>
      <?php if($phone): ?><a href="tel:<?=e(preg_replace('/\D+/','',$phone))?>"><?=e($phone)?></a><?php endif; ?>
      <?php if($email): ?><a href="mailto:<?=e($email)?>"><?=e($email)?></a><?php endif; ?>
      <a href="<?=e($waUrl)?>" target="_blank" rel="noopener" class="footer-wa-link">WhatsApp →</a>
    </section>
  </div>
  <div class="animo-footer-bottom"><span>© <?=date('Y')?> <?=e($siteName)?>. All Rights Reserved.</span><span>Label &amp; Sticker Profesional</span></div>
</footer>
<script src="assets/js/home-premium.js?v=20260929"></script>
<script src="assets/js/app.js?v=20260929"></script>
</body></html>
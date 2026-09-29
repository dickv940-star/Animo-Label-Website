</main><footer><div><strong><?=e(setting('site_name','Animo Label'))?></strong><p><?=e(setting('description','Solusi label dan printing untuk kebutuhan bisnis Anda.'))?></p></div><div><b>Kontak</b><p><?=nl2br(e(setting('address')))?><br><?=e(setting('phone'))?></p></div><div><b>Sosial</b><p><?=e(setting('instagram'))?></p></div></footer><script src="/assets/js/app.js"></script></body></html>
</main>
<footer class="premium-footer">
<div class="footer-brand"><img class="footer-site-logo" src="<?=e($logo?:'assets/logo-animo-label.png')?>" alt="<?=e($siteName)?>"><p><?=e(setting('description','Solusi label dan sticker untuk kebutuhan bisnis Anda.'))?></p></div>
<div><b>Produk</b><?php foreach(array_slice($pdo->query('SELECT * FROM categories ORDER BY sort_order,id DESC')->fetchAll(),0,5) as $c): ?><a href="produk.php?category=<?=urlencode($c['id'])?>"><?=e($c['name'])?></a><?php endforeach; ?></div>
<div><b>Perusahaan</b><a href="tentang.php">Tentang Animo Label</a><a href="kontak.php">Kontak</a><a href="portfolio.php">Portfolio</a></div>
<div><b>Marketplace</b><a href="<?=e(setting('shopee','https://shopee.co.id/animolabel'))?>" target="_blank" rel="noopener">Shopee ANIMO LABEL →</a><a href="<?=e(setting('tokopedia','https://www.tokopedia.com/animolabel'))?>" target="_blank" rel="noopener">Tokopedia ANIMO LABEL →</a><a href="<?=e($waUrl)?>" target="_blank" rel="noopener">WhatsApp →</a></div>
<div class="copyright">© <?=date('Y')?> <?=e($siteName)?>. All Rights Reserved.</div>
</footer>
<script src="assets/js/home-premium.js?v=20260929"></script><script src="assets/js/app.js?v=20260929"></script>
</body></html>
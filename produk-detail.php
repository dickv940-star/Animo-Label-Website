<?php
$id=(int)($_GET['id']??0);
require_once __DIR__.'/config/database.php';
require_once __DIR__.'/includes/functions.php';
$st=$pdo->prepare("SELECT p.*,c.name category_name FROM products p LEFT JOIN categories c ON c.id=p.category_id WHERE p.id=? AND p.active=1");
$st->execute([$id]);$p=$st->fetch();
if(!$p){http_response_code(404);$title='Produk tidak ditemukan';require __DIR__.'/includes/header.php';echo '<section class="pagehead"><h1>Produk tidak ditemukan</h1><p>Produk mungkin sudah tidak aktif.</p><a class="btn btn-dark" href="produk.php">Kembali ke Produk</a></section>';require __DIR__.'/includes/footer.php';exit;}
$title=$p['name'].' — Animo Label';
$ims=$pdo->prepare('SELECT id,image,sort_order FROM product_images WHERE product_id=? ORDER BY sort_order,id');$ims->execute([$id]);$photos=$ims->fetchAll();
if(!$photos&&$p['image'])$photos=[['id'=>0,'image'=>$p['image'],'sort_order'=>0]];
$main=$p['image']?:($photos[0]['image']??'assets/img-placeholder.svg');
require __DIR__.'/includes/header.php';
?>
<section class="detail product-detail">
<div class="detail-breadcrumb"><a href="produk.php">← Kembali ke katalog</a></div>
<div class="dynamic-detail-grid">
<div class="dynamic-gallery">
<div class="dynamic-main-photo"><img id="dynamicMainPhoto" src="<?=e($main)?>" alt="<?=e($p['name'])?>"></div>
<?php if(count($photos)>1): ?><div class="dynamic-thumbs"><?php foreach($photos as $i=>$ph): ?><button type="button" class="dynamic-thumb <?=$ph['image']===$main?'active':''?>" data-src="<?=e($ph['image'])?>" aria-label="Foto <?=$i+1?>"><img src="<?=e($ph['image'])?>" alt="" loading="lazy"></button><?php endforeach; ?></div><?php endif; ?>
<div class="gallery-caption"><?=count($photos)?> foto • Otomatis mengikuti galeri CMS</div>
</div>
<div class="dynamic-detail-copy"><small><?=e($p['category_name']?:'Produk')?></small><h1><?=e($p['name'])?></h1>
<?php if(trim((string)$p['description'])!==''): ?><p><?=nl2br(e($p['description']))?></p><?php endif; ?>
<?php if(trim((string)$p['price'])!==''): ?><div class="detail-price"><?=e($p['price'])?></div><?php endif; ?>
<div class="detail-actions"><a class="btn btn-dark" target="_blank" rel="noopener" href="<?=e(wa('Halo Animo Label, saya tertarik dengan produk '.$p['name'].'. Mohon informasi stok dan pemesanan.'))?>">Konsultasi WhatsApp</a><a class="btn btn-light detail-shop" target="_blank" rel="noopener" href="<?=e(setting('shopee_url','https://shopee.co.id/animolabel'))?>">Lihat di Shopee →</a></div>
<div class="detail-note"><b>Galeri otomatis:</b> foto utama, foto tambahan, urutan, dan foto yang dihapus mengikuti pengaturan di CMS Admin → Produk.</div>
</div></div></section>
<script>
document.querySelectorAll('.dynamic-thumb').forEach(function(btn){btn.addEventListener('click',function(){document.getElementById('dynamicMainPhoto').src=this.dataset.src;document.querySelectorAll('.dynamic-thumb').forEach(function(x){x.classList.remove('active')});this.classList.add('active')})});
</script>
<?php require __DIR__.'/includes/footer.php'; ?>
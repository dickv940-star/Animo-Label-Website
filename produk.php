<?php
$title='Produk';require __DIR__.'/includes/header.php';
$cat=(int)($_GET['category']??0);
$q=trim($_GET['q']??'');
$page=max(1,(int)($_GET['page']??1));
$perPage=12;
$cats=$pdo->query('SELECT * FROM categories ORDER BY sort_order,id DESC')->fetchAll();
$where=['p.active=1'];$params=[];
if($cat){$where[]='p.category_id=?';$params[]=$cat;}
if($q!==''){ $where[]='(p.name LIKE ? OR p.description LIKE ?)';$params[]='%'.$q.'%';$params[]='%'.$q.'%';}
$whereSql=' WHERE '.implode(' AND ',$where);
$count=$pdo->prepare('SELECT COUNT(*) FROM products p'.$whereSql);$count->execute($params);$total=(int)$count->fetchColumn();
$pages=max(1,(int)ceil($total/$perPage));$page=min($page,$pages);$offset=($page-1)*$perPage;
$sql="SELECT p.*,c.name category_name FROM products p LEFT JOIN categories c ON c.id=p.category_id".$whereSql." ORDER BY p.featured DESC,p.id DESC LIMIT ".$perPage." OFFSET ".$offset;
$st=$pdo->prepare($sql);$st->execute($params);$products=$st->fetchAll();
function product_url($page,$cat,$q){$a=[];if($cat)$a['category']=$cat;if($q!=='')$a['q']=$q;if($page>1)$a['page']=$page;return 'produk.php'.($a?'?'.http_build_query($a):'');}
?>
<section class="pagehead"><small>KATALOG</small><h1>Produk Animo Label</h1><p>Pilih kategori dan temukan solusi printing yang sesuai.</p></section>
<section class="section">
<div class="catalog-toolbar">
<form class="catalog-search" method="get"><input type="search" name="q" value="<?=e($q)?>" placeholder="Cari produk..."><input type="hidden" name="category" value="<?=$cat?>"><button type="submit">Cari</button></form>
<div class="chips"><a class="<?=$cat?'':'active'?>" href="produk.php<?= $q!==''?'?q='.rawurlencode($q):'' ?>">Semua</a><?php foreach($cats as $c):?><a class="<?=$cat===$c['id']?'active':''?>" href="<?=e(product_url(1,(int)$c['id'],$q))?>"><?=e($c['name'])?></a><?php endforeach;?></div>
</div>
<?php if($products):?><div class="product-grid"><?php foreach($products as $p):?><article class="product-card"><a class="product-image" href="produk-detail.php?id=<?=$p['id']?>"><img src="<?=e(img($p['image']))?>" alt="<?=e($p['name'])?>"></a><div class="product-info"><small><?=e($p['category_name']?:'Produk')?></small><h3><?=e($p['name'])?></h3><?php if($p['description']):?><p><?=e($p['description'])?></p><?php endif;if($p['price']!==''):?><strong><?=e($p['price'])?></strong><?php endif;?><a class="text-link" href="produk-detail.php?id=<?=$p['id']?>">Lihat detail →</a></div></article><?php endforeach;?></div>
<?php else:?><div class="empty-state"><h3>Produk tidak ditemukan</h3><p>Coba kata kunci atau kategori lainnya.</p></div><?php endif;?>
<?php if($pages>1):?><nav class="pagination" aria-label="Paginasi produk"><?php if($page>1):?><a href="<?=e(product_url($page-1,$cat,$q))?>">← Sebelumnya</a><?php endif;?><div><?php for($n=1;$n<=$pages;$n++):?><a class="<?=$n===$page?'active':''?>" href="<?=e(product_url($n,$cat,$q))?>"><?=$n?></a><?php endfor;?></div><?php if($page<$pages):?><a href="<?=e(product_url($page+1,$cat,$q))?>">Berikutnya →</a><?php endif;?></nav><?php endif;?>
</section><?php require __DIR__.'/includes/footer.php';?>
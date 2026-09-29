<?php
$title='Produk';require '_head.php';$msg='';
try{
if(isset($_GET['delete'])){$id=(int)$_GET['delete'];$pdo->prepare('DELETE FROM product_images WHERE product_id=?')->execute([$id]);$pdo->prepare('DELETE FROM products WHERE id=?')->execute([$id]);header('Location: products.php');exit;}
if(isset($_GET['edit'])){$editId=(int)$_GET['edit'];$st=$pdo->prepare('SELECT * FROM products WHERE id=?');$st->execute([$editId]);$edit=$st->fetch();if(!$edit)throw new RuntimeException('Produk tidak ditemukan.');}
if($_SERVER['REQUEST_METHOD']==='POST'){
$id=(int)($_POST['id']??0);
if(isset($_POST['save_product'])){
if($id){
$old=$pdo->prepare('SELECT * FROM products WHERE id=?');$old->execute([$id]);$product=$old->fetch();if(!$product)throw new RuntimeException('Produk tidak ditemukan.');
$main=$product['image'];
if(!empty($_FILES['main_image']['name']))$main=upload_image($_FILES['main_image'],'products');
$pdo->prepare('UPDATE products SET category_id=?,name=?,description=?,price=?,image=?,featured=?,active=? WHERE id=?')->execute([(int)$_POST['category_id'],trim($_POST['name']),trim($_POST['description']),trim($_POST['price']),$main,isset($_POST['featured'])?1:0,isset($_POST['active'])?1:0,$id]);
if(!empty($_FILES['images']['name'][0])){
$files=$_FILES['images'];$st=$pdo->prepare('SELECT COALESCE(MAX(sort_order),-1)+1 FROM product_images WHERE product_id=?');$st->execute([$id]);$order=(int)$st->fetchColumn();
foreach($files['name'] as $i=>$name){if($name==='')continue;$file=['name'=>$name,'type'=>$files['type'][$i],'tmp_name'=>$files['tmp_name'][$i],'error'=>$files['error'][$i],'size'=>$files['size'][$i]];$path=upload_image($file,'products');$pdo->prepare('INSERT INTO product_images(product_id,image,sort_order) VALUES(?,?,?)')->execute([$id,$path,$order++]);}
}
header('Location: products.php?saved=1');exit;
}else{
$files=$_FILES['images']??null;$uploaded=[];
if($files&&isset($files['name'])&&is_array($files['name']))foreach($files['name'] as $i=>$name){if($name==='')continue;$file=['name'=>$name,'type'=>$files['type'][$i],'tmp_name'=>$files['tmp_name'][$i],'error'=>$files['error'][$i],'size'=>$files['size'][$i]];$uploaded[]=upload_image($file,'products');}
if(!$uploaded)throw new RuntimeException('Pilih minimal 1 foto produk.');
$pdo->beginTransaction();$pdo->prepare('INSERT INTO products(category_id,name,description,price,image,featured,active) VALUES(?,?,?,?,?,?,?)')->execute([(int)$_POST['category_id'],trim($_POST['name']),trim($_POST['description']),trim($_POST['price']),$uploaded[0],isset($_POST['featured'])?1:0,1]);$productId=(int)$pdo->lastInsertId();$st=$pdo->prepare('INSERT INTO product_images(product_id,image,sort_order) VALUES(?,?,?)');foreach($uploaded as $i=>$path)$st->execute([$productId,$path,$i]);$pdo->commit();header('Location: products.php?saved=1');exit;
}
}
}catch(Throwable $e){if($pdo->inTransaction())$pdo->rollBack();$msg=$e->getMessage();}
$cats=$pdo->query('SELECT * FROM categories ORDER BY name')->fetchAll();
$q=trim($_GET['q']??'');$cat=(int)($_GET['category']??0);$page=max(1,(int)($_GET['page']??1));$perPage=15;$where=[];$params=[];if($cat){$where[]='p.category_id=?';$params[]=$cat;}if($q!==''){$where[]='(p.name LIKE ? OR p.description LIKE ?)';$params[]='%'.$q.'%';$params[]='%'.$q.'%';}$ws=$where?' WHERE '.implode(' AND ',$where):'';$cs=$pdo->prepare('SELECT COUNT(*) FROM products p'.$ws);$cs->execute($params);$total=(int)$cs->fetchColumn();$pages=max(1,(int)ceil($total/$perPage));$page=min($page,$pages);$offset=($page-1)*$perPage;$st=$pdo->prepare("SELECT p.*,c.name category_name,(SELECT COUNT(*) FROM product_images pi WHERE pi.product_id=p.id) photo_count FROM products p LEFT JOIN categories c ON c.id=p.category_id".$ws." ORDER BY p.id DESC LIMIT ".$perPage." OFFSET ".$offset);$st->execute($params);$rows=$st->fetchAll();
function admin_product_url($page,$cat,$q){$a=[];if($cat)$a['category']=$cat;if($q!=='')$a['q']=$q;if($page>1)$a['page']=$page;return 'products.php'.($a?'?'.http_build_query($a):'');}
?>
<div class="admin-page-title"><div><h1>Produk</h1><p>Kelola katalog, foto utama, dan galeri foto produk.</p></div></div>
<?php if($msg):?><div class="alert"><?=e($msg)?></div><?php endif;?>
<div class="panel"><form method="post" enctype="multipart/form-data" class="product-admin-form">
<?php if(!empty($edit)):?><input type="hidden" name="id" value="<?=$edit['id']?>"><?php endif;?>
<input name="name" value="<?=e($edit['name']??'')?>" placeholder="Nama produk" required>
<select name="category_id" required><option value="">Pilih kategori</option><?php foreach($cats as $c):?><option value="<?=$c['id']?>" <?=(!empty($edit)&&$edit['category_id']==$c['id'])?'selected':''?>><?=e($c['name'])?></option><?php endforeach;?></select>
<textarea name="description" placeholder="Keterangan (opsional)"><?=e($edit['description']??'')?></textarea>
<input name="price" value="<?=e($edit['price']??'')?>" placeholder="Harga (opsional)">
<label class="upload-label"><?=!empty($edit)?'Ganti foto utama':'Foto produk utama'?><input type="file" name="<?=!empty($edit)?'main_image':'images[]'?>" accept="image/jpeg,image/png,image/webp" <?=empty($edit)?'required':''?>></label>
<?php if(!empty($edit)):?><label class="upload-label">Tambah foto galeri<input type="file" name="images[]" accept="image/jpeg,image/png,image/webp" multiple><small>Foto lama tetap tersimpan. Upload foto baru kapan saja.</small></label><?php else:?><label class="upload-label">Foto tambahan<input type="file" name="images[]" accept="image/jpeg,image/png,image/webp" multiple><small>JPG, PNG, WebP • maksimal 5 MB per foto.</small></label><?php endif;?>
<label><input type="checkbox" name="featured" <?=(!empty($edit)&&$edit['featured'])?'checked':''?>> Produk unggulan</label>
<?php if(!empty($edit)):?><label><input type="checkbox" name="active" <?=($edit['active']??1)?'checked':''?>> Tampilkan di website</label><?php endif;?>
<button class="admin-primary" name="save_product" value="1"><?=!empty($edit)?'Simpan Perubahan':' + Simpan Produk'?></button>
<?php if(!empty($edit)):?><a class="admin-secondary" href="products.php">Batal</a><?php endif;?>
</form></div>
<div class="panel"><form class="admin-filter" method="get"><input type="search" name="q" value="<?=e($q)?>" placeholder="Cari nama produk..."><select name="category"><option value="0">Semua kategori</option><?php foreach($cats as $c):?><option value="<?=$c['id']?>" <?=$cat===$c['id']?'selected':''?>><?=e($c['name'])?></option><?php endforeach;?></select><button>Cari</button></form>
<div class="product-admin-table-wrap"><table><thead><tr><th>Foto</th><th>Produk</th><th>Kategori</th><th>Galeri</th><th>Harga</th><th>Aksi</th></tr></thead><tbody><?php foreach($rows as $p):?><tr><td><?php if($p['image']):?><img class="thumb" src="<?=e($p['image'])?>" alt="<?=e($p['name'])?>"><?php endif;?></td><td><strong><?=e($p['name'])?></strong></td><td><?=e($p['category_name']?:'-')?></td><td><?=$p['photo_count']?> foto</td><td><?=e($p['price']?:'-')?></td><td><a href="?edit=<?=$p['id']?>">Edit foto/data</a> · <a href="../produk-detail.php?id=<?=$p['id']?>" target="_blank">Lihat</a> · <a href="?delete=<?=$p['id']?>" onclick="return confirm('Hapus produk dan semua fotonya?')">Hapus</a></td></tr><?php endforeach;?></tbody></table></div>
<?php if($pages>1):?><nav class="admin-pagination"><?php if($page>1):?><a href="<?=e(admin_product_url($page-1,$cat,$q))?>">←</a><?php endif;?><?php for($n=1;$n<=$pages;$n++):?><a class="<?=$n===$page?'active':''?>" href="<?=e(admin_product_url($n,$cat,$q))?>"><?=$n?></a><?php endfor;?><?php if($page<$pages):?><a href="<?=e(admin_product_url($page+1,$cat,$q))?>">→</a><?php endif;?></nav><?php endif;?></div>
<?php require '_foot.php';?>
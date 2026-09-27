<?php
$title='Produk';require '_head.php';
$msg='';
try{
if(isset($_GET['delete'])){
 $id=(int)$_GET['delete'];
 $pdo->prepare('DELETE FROM product_images WHERE product_id=?')->execute([$id]);
 $pdo->prepare('DELETE FROM products WHERE id=?')->execute([$id]);
 header('Location: products.php');exit;
}
if($_SERVER['REQUEST_METHOD']==='POST'){
 $files=$_FILES['images']??null;
 $uploaded=[];
 if($files && isset($files['name']) && is_array($files['name'])){
  foreach($files['name'] as $i=>$name){
   if($name==='')continue;
   $file=['name'=>$files['name'][$i],'type'=>$files['type'][$i],'tmp_name'=>$files['tmp_name'][$i],'error'=>$files['error'][$i],'size'=>$files['size'][$i]];
   $uploaded[]=upload_image($file,'products');
  }
 }
 if(!$uploaded)throw new RuntimeException('Pilih minimal 1 foto produk.');
 $pdo->beginTransaction();
 $pdo->prepare('INSERT INTO products(category_id,name,description,price,image,featured,active) VALUES(?,?,?,?,?,?,?)')->execute([(int)$_POST['category_id'],trim($_POST['name']),trim($_POST['description']),trim($_POST['price']),$uploaded[0],isset($_POST['featured'])?1:0,1]);
 $productId=(int)$pdo->lastInsertId();
 $st=$pdo->prepare('INSERT INTO product_images(product_id,image,sort_order) VALUES(?,?,?)');
 foreach($uploaded as $i=>$path)$st->execute([$productId,$path,$i]);
 $pdo->commit();
 header('Location: products.php?saved=1');exit;
}
}catch(Throwable $e){if($pdo->inTransaction())$pdo->rollBack();$msg=$e->getMessage();}
$cats=$pdo->query('SELECT * FROM categories ORDER BY name')->fetchAll();$rows=$pdo->query('SELECT p.*,c.name category_name,(SELECT COUNT(*) FROM product_images pi WHERE pi.product_id=p.id) photo_count FROM products p LEFT JOIN categories c ON c.id=p.category_id ORDER BY p.id DESC')->fetchAll();
?><h1>Produk</h1><?php if($msg):?><div class="alert"><?=e($msg)?></div><?php endif;?>
<div class="panel"><form method="post" enctype="multipart/form-data">
<input name="name" placeholder="Nama produk" required>
<select name="category_id" required><?php foreach($cats as $c):?><option value="<?=$c['id']?>"><?=e($c['name'])?></option><?php endforeach;?></select>
<textarea name="description" placeholder="Keterangan (opsional)"></textarea><input name="price" placeholder="Harga (opsional)">
<label class="upload-label">Foto produk — bisa pilih beberapa sekaligus<input type="file" name="images[]" accept="image/jpeg,image/png,image/webp" multiple required><small>JPG, PNG, WebP • maksimal 5 MB per foto • foto pertama menjadi foto utama</small></label>
<label><input type="checkbox" name="featured"> Produk unggulan</label><br><button>Simpan Produk</button></form></div>
<div class="panel"><table><?php foreach($rows as $p):?><tr><td><?php if($p['image']):?><img class="thumb" src="<?=e($p['image'])?>" alt=""><?php endif;?></td><td><?=e($p['name'])?></td><td><?=e($p['price'])?></td><td><?=$p['photo_count']?> foto</td><td><a href="/produk-detail.php?id=<?=$p['id']?>">Lihat</a> · <a href="?delete=<?=$p['id']?>" onclick="return confirm('Hapus produk dan semua fotonya?')">Hapus</a></td></tr><?php endforeach;?></table></div><?php require '_foot.php';?>
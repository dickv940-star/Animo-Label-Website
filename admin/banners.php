<?php
$title='Banner';require '_head.php';$msg='';$edit=null;
try{
if(isset($_GET['delete'])){
 $id=(int)$_GET['delete'];
 $pdo->prepare('DELETE FROM banners WHERE id=?')->execute([$id]);
 header('Location: banners.php?saved=deleted');exit;
}
if(isset($_GET['edit'])){
 $st=$pdo->prepare('SELECT * FROM banners WHERE id=?');$st->execute([(int)$_GET['edit']]);$edit=$st->fetch();
 if(!$edit)throw new RuntimeException('Banner tidak ditemukan.');
}
if($_SERVER['REQUEST_METHOD']==='POST'){
 $id=(int)($_POST['id']??0);
 if($id){
   $st=$pdo->prepare('SELECT * FROM banners WHERE id=?');$st->execute([$id]);$old=$st->fetch();
   if(!$old)throw new RuntimeException('Banner tidak ditemukan.');
   $image=$old['image'];
   if(!empty($_FILES['image']['name']))$image=upload_image($_FILES['image'],'banners');
   $pdo->prepare('UPDATE banners SET eyebrow=?,title=?,subtitle=?,image=?,button_text=?,button_url=?,sort_order=?,active=? WHERE id=?')->execute([
     trim($_POST['eyebrow']??''),trim($_POST['title']??''),trim($_POST['subtitle']??''),$image,
     trim($_POST['button_text']??''),trim($_POST['button_url']??''),(int)($_POST['sort_order']??0),isset($_POST['active'])?1:0,$id
   ]);
 }else{
   $image=upload_image($_FILES['image']??null,'banners');
   if(!$image)throw new RuntimeException('Pilih foto banner.');
   $pdo->prepare('INSERT INTO banners(eyebrow,title,subtitle,image,button_text,button_url,sort_order,active) VALUES(?,?,?,?,?,?,?,?)')->execute([
     trim($_POST['eyebrow']??''),trim($_POST['title']??''),trim($_POST['subtitle']??''),$image,
     trim($_POST['button_text']??''),trim($_POST['button_url']??''),(int)($_POST['sort_order']??0),isset($_POST['active'])?1:0
   ]);
 }
 header('Location: banners.php?saved=1');exit;
}
}catch(Throwable $e){$msg=$e->getMessage();}
$rows=$pdo->query('SELECT * FROM banners ORDER BY sort_order ASC,id ASC')->fetchAll();
?>
<div class="admin-page-title"><div><h1>Banner</h1><p>Tambah, ganti, edit, urutkan, aktifkan, atau hapus banner homepage tanpa mengubah kode website.</p></div></div>
<?php if($msg):?><div class="alert"><?=e($msg)?></div><?php endif;?>
<div class="panel">
<h2><?=!empty($edit)?'Edit Banner':'Tambah Banner'?></h2>
<form method="post" enctype="multipart/form-data">
<?php if(!empty($edit)):?><input type="hidden" name="id" value="<?=$edit['id']?>"><?php endif;?>
<label>Label kecil / Eyebrow</label><input name="eyebrow" value="<?=e($edit['eyebrow']??'')?>" placeholder="CONTOH: LABEL THERMAL">
<label>Judul banner</label><input name="title" value="<?=e($edit['title']??'')?>" placeholder="Judul utama banner" required>
<label>Keterangan / Subjudul</label><textarea name="subtitle" placeholder="Keterangan singkat yang tampil di banner"><?=e($edit['subtitle']??'')?></textarea>
<label class="upload-label"><?=!empty($edit)?'Ganti foto banner':'Foto banner'?><input type="file" name="image" accept="image/jpeg,image/png,image/webp" <?=empty($edit)?'required':''?>><small><?=!empty($edit)?'Kosongkan jika foto lama tetap digunakan. ':''?>JPG, PNG, WebP • maksimal 5 MB.</small></label>
<label>Teks tombol</label><input name="button_text" value="<?=e($edit['button_text']??'')?>" placeholder="Lihat Produk">
<label>Link tombol</label><input name="button_url" value="<?=e($edit['button_url']??'')?>" placeholder="produk.html atau https://wa.me/...">
<label>Urutan tampil</label><input type="number" name="sort_order" value="<?=e($edit['sort_order']??0)?>" min="0">
<?php if(!empty($edit)):?><label><input type="checkbox" name="active" <?=($edit['active']??1)?'checked':''?>> Tampilkan banner ini</label><?php else:?><label><input type="checkbox" name="active" checked> Tampilkan banner ini</label><?php endif;?>
<button class="admin-primary"><?=!empty($edit)?'Simpan Perubahan':'Tambah Banner'?></button>
<?php if(!empty($edit)):?><a class="admin-secondary" href="banners.php">Batal</a><?php endif;?>
</form>
<?php if(!empty($edit)&&$edit['image']):?><div style="margin-top:20px"><strong>Preview foto saat ini</strong><p><img class="thumb" style="max-width:420px;height:auto" src="<?=e($edit['image'])?>" alt="<?=e($edit['title'])?>"></p></div><?php endif;?>
</div>
<div class="panel">
<div class="panel-heading"><div><h2>Daftar Banner</h2><p>Banner aktif akan digunakan sebagai materi homepage pada versi CMS/cPanel.</p></div></div>
<div class="product-admin-table-wrap"><table><thead><tr><th>Preview</th><th>Banner</th><th>Urutan</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
<?php foreach($rows as $r):?><tr>
<td><?php if($r['image']):?><img class="thumb" src="<?=e($r['image'])?>" alt="<?=e($r['title'])?>"><?php endif;?></td>
<td><strong><?=e($r['title'])?></strong><br><small><?=e($r['subtitle']??'')?></small></td>
<td><?=e($r['sort_order'])?></td><td><?=!empty($r['active'])?'Aktif':'Nonaktif'?></td>
<td><a href="?edit=<?=$r['id']?>">Edit</a> · <a href="?delete=<?=$r['id']?>" onclick="return confirm('Hapus banner ini?')">Hapus</a></td>
</tr><?php endforeach;?>
<?php if(!$rows):?><tr><td colspan="5">Belum ada banner. Tambahkan banner pertama di atas.</td></tr><?php endif;?>
</tbody></table></div>
</div>
<?php require '_foot.php';?>
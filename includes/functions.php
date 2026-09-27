<?php
if(session_status()===PHP_SESSION_NONE)session_start();
function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function setting($key,$default=''){global $pdo;static $s=null;if($s===null){$s=[];try{foreach($pdo->query('SELECT name,value FROM settings') as $r)$s[$r['name']]=$r['value'];}catch(Throwable $x){}}return $s[$key]??$default;}
function wa($text='Halo Animo Label, saya ingin konsultasi.'){ $n=preg_replace('/\D+/','',setting('whatsapp')); return $n?'https://wa.me/'.$n.'?text='.rawurlencode($text):'#'; }
function img($path,$fallback='/assets/img-placeholder.svg'){return $path?$path:$fallback;}
function admin(){return !empty($_SESSION['admin_id']);}
function require_admin(){if(!admin()){header('Location: index.php');exit;}}
function upload_image($file,$folder){
    if(!isset($file)||!is_array($file)||($file['error']??UPLOAD_ERR_NO_FILE)===UPLOAD_ERR_NO_FILE)return '';
    if(($file['error']??UPLOAD_ERR_OK)!==UPLOAD_ERR_OK)throw new RuntimeException('Upload gagal.');
    if(($file['size']??0)>5*1024*1024)throw new RuntimeException('Ukuran gambar maksimal 5 MB.');
    $allowed=['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp'];
    $finfo=new finfo(FILEINFO_MIME_TYPE);$mime=$finfo->file($file['tmp_name']);
    if(!isset($allowed[$mime]))throw new RuntimeException('Format harus JPG, PNG, atau WebP.');
    $root=dirname(__DIR__).'/uploads/'.$folder;
    if(!is_dir($root)&&!mkdir($root,0755,true)&&!is_dir($root))throw new RuntimeException('Folder upload tidak dapat dibuat.');
    $name=bin2hex(random_bytes(10)).'.'.$allowed[$mime];
    if(!move_uploaded_file($file['tmp_name'],$root.'/'.$name))throw new RuntimeException('File gagal disimpan.');
    return '/uploads/'.$folder.'/'.$name;
}
function upload_or_keep($field,$folder,$old=''){return !empty($_FILES[$field]['name'])?upload_image($_FILES[$field],$folder):$old;}

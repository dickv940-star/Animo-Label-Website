<?php
if(session_status()===PHP_SESSION_NONE)session_start();
function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function setting($key,$default=''){global $pdo;static $s=null;if($s===null){$s=[];try{foreach($pdo->query('SELECT name,value FROM settings') as $r)$s[$r['name']]=$r['value'];}catch(Throwable $x){}}return $s[$key]??$default;}
function wa($text='Halo Animo Label, saya ingin konsultasi.'){ $n=preg_replace('/\\D+/','',setting('whatsapp')); return $n?'https://wa.me/'.$n.'?text='.rawurlencode($text):'#'; }
function img($path,$fallback='/assets/img-placeholder.svg'){return $path?$path:$fallback;}
function admin(){return !empty($_SESSION['admin_id']);}
function require_admin(){if(!admin()){header('Location: index.php');exit;}}

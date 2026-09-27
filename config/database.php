<?php
$DB_HOST='localhost'; $DB_NAME='GANTI_DATABASE'; $DB_USER='GANTI_USER'; $DB_PASS='GANTI_PASSWORD';
try{$pdo=new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4",$DB_USER,$DB_PASS,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);}catch(Throwable $e){http_response_code(500);die('Database belum dikonfigurasi.');}

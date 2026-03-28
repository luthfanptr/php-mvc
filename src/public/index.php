<?php
// klo dalam app tdk terdeteksi ada session_id maka jalankan session nya (session_start)
if(!session_id() ) session_start();

// halaman utama yang akan ditampilkan di public
require_once '../app/init.php';

$app = new App;
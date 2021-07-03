<?php

define('DSN', 'mysql:host=db;dbname=php_db;charset=utf8mb4');
define('DB_USER', 'php_user');
define('DB_PASS', 'php_pass');


// 下二つは同じ意味(phpのサーバ変数でも取得できる)
// define('SITE_URL', 'http://localhost:8080/');
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);



// spl_autoload_register(関数(クラス))を使ってクラスを自動で読み込む
// 未定義のクラスをインスタンス化した場合、実行するメソッド
// spl_autoload_register

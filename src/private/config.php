<?php

define('DSN', 'mysql:host=db;dbname=php_db;charset=utf8mb4');
define('DB_USER', 'php_user');
define('DB_PASS', 'php_pass');


// 下二つは同じ意味(phpのサーバ変数でも取得できる)
// define('SITE_URL', 'http://localhost:8080/');
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);


// spl_autoload_register(関数(クラス))を使ってクラスを自動で読み込む
// 未定義のクラスをインスタンス化した場合、実行されるメソッド
spl_autoload_register(function ($class) {
    // バックスラッシュ自信を表すには\\としてあげる
    $prefix = 'MyApp\\';

    // namespaceを使っているので、$classに'MyApp\'がある時だけ'MyApp\'をはずす
    // strposは文字検索をしてヒットした場所を数値で返す。(0番目、つまり先頭)
    if (strpos($class, $prefix) === 0) {
        // MyApp\Database
        // MyApp\以降の文字列を取得
        $class = substr($class, strlen($prefix));
        // sprintfで文字列結合
        $fileName = sprintf(__DIR__ . '/%s.php', $class);

        // ファイル存在チェック
        if (file_exists($fileName)) {
            // ファイル読み込み
            require_once($fileName);
        } else {
            echo 'File not found: ' . $fileName;
            exit;
        }
    }
})
?>

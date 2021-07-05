<?php

namespace MyApp;

// require_once('config.php');


class Database {

    // index.phpでは一か所しか呼ばれていないが、
    // getInstanceを実行するたびにデータベースへの接続が増えてしまうから、
    // PDOクラスから作られるインスタンスは1つになるようにする
    // クラス変数にしてインスタンス間で共通の変数にする
    private static $instance;

    // インスタンスを作って操作するほどのものでもないため、
    // クラスメソッドにするためにstaticをつける
    public static function getInstance() {

        try {
            if (!isset(self::$instance)) {
                self::$instance = new \PDO(
                    DSN,
                    DB_USER,
                    DB_PASS,
                    [
                    // エラーが起きたときは例外を設定する
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    // オブジェクトで取得
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                    // SQLで定義した方で取得
                    \PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
            }
            return self::$instance;
        } catch(\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}

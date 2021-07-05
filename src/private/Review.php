<?php

namespace MyApp;

// レビュー一覧を管理するクラス
class Review {
    private $menuName;  // メニュー名
    private $userId;    // インスタンスid
    private $body;      // レビュー


    public function __construct($menuName, $userId, $body) {
        $this->menuName = $menuName;
        $this->userId = $userId;
        $this->body = $body;
    }


    // メニュー名取得
    public function getMenuName() {
        return $this->menuName;
    }

    // レビュー内容取得
    public function getBody() {
        return $this->body;
    }


    // インスタンスの$userIdと一致するインスタンスを返す
    public function getUser($users) {
        foreach ($users as $user) {
            if ($user->getId() == $this->userId) {
                return $user;
            }
        }
    }

}

?>

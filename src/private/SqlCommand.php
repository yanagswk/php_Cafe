<?php


class SqlCommand {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Drinkデータ取得
    public function getDrink() {
        // クエリ作成
        $drinkQuery = $this->pdo->query("SELECT * FROM drink");

        // クエリを実行してデータ取得
        $drink = $drinkQuery->fetchAll();
        return $drink;
    }


    // Foodデータ取得
    public function getFood() {
        // クエリ作成
        $foodQuery = $this->pdo->query("SELECT * FROM food");

        // クエリを実行してデータ取得
        $food = $foodQuery->fetchAll();
        return $food;
    }


    // Userデータ取得
    public function getUser() {
        // クエリ作成
        $userQuery = $this->pdo->query("SELECT * FROM user");

        // クエリを実行してデータ取得
        $user = $userQuery->fetchAll();
        return $user;
    }


    // Reviewデータ取得
    public function getReview() {
        // クエリ作成
        $reviewQuery = $this->pdo->query("SELECT * FROM review");

        // クエリを実行してデータ取得
        $review = $reviewQuery->fetchAll();
        return $review;
    }

}

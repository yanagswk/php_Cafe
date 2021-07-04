<?php

namespace MyApp;

class Menu {
    protected $name;    // メニュー名
    protected $price;   // 値段
    protected $image;   // 画像
    private $orderCount = 0;    // 注文数
    protected static $count = 0;    // メニュー数

    public function __construct($name, $price, $image) {
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        self::$count++;
    }


    // メニュー名取得
    public function getName() {
        return $this->name;
    }


    // 画像取得
    public function getImage() {
        return $this->image;
    }


    // 注文数取得
    public function getOrderCount() {
        return $this->orderCount;
    }


    // 注文数セット
    public function setOrderCount($orderCount) {
        $this->orderCount = $orderCount;
    }


    // priceに消費税をかけたもの
    public function getTaxIncludedPrice() {
        return floor($this->price * 1.08);
    }


    // 各メニューごとの合計金額
    public function getTotalPrice() {
        return $this->getTaxIncludedPrice() * $this->orderCount;
    }


    // メニュー名が一致したインスタンスのみを返す
    public function getReviews($reviews) {
        $reviewsForMenu = array();
        foreach ($reviews as $review) {
            if ($review->getMenuName() == $this->name) {
                $reviewsForMenu[] = $review;
            }
        }
        return $reviewsForMenu;
    }


    // メニュー数取得
    public static function getCount() {
        return self::$count;
    }


    // メニューからGETで送られたパラメータ値と一致したら、それを返す
    public static function findByName($menus, $name) {
        foreach ($menus as $menu) {
            if ($menu->getName() == $name) {
                return $menu;
            }
        }
    }

}
?>

<?php

namespace MyApp;
use MyApp\Menu;

// require_once('Menu.php');

class Food extends Menu {
    // 辛さ数値
    private $spiciness;

    public function __construct($name, $price, $image, $spiciness) {
        parent::__construct($name, $price, $image);
        $this->spiciness = $spiciness;
    }

    // 辛さ数値取得
    public function getSpiciness() {
        return $this->spiciness;
    }

}

?>

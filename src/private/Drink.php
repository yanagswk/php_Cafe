<?php
require_once('Menu.php');

class Drink extends Menu {
    // アイスかホットか
    private $type;

    public function __construct($name, $price, $image, $type) {
        parent::__construct($name, $price, $image);
        $this->type = $type;
    }

    // タイプ取得
    public function getType() {
        return $this->type;
    }

}
?>

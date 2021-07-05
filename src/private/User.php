<?php

namespace MyApp;

class User {
    private $id;
    private $name;      // 名前
    private $gender;    // 性別
    private static $count = 0;

    public function __construct($name, $gender) {
        $this->name = $name;
        $this->gender = $gender;
        self::$count++;
        $this->id = self::$count;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getGender() {
        return $this->gender;
    }
}

?>

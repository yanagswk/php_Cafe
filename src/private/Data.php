<?php

require_once('config.php');

use MyApp\User;
use MyApp\SqlCommand;
use MyApp\Database;
use MyApp\Drink;
use MyApp\Food;
use MyApp\Review;

$pdo = Database::getInstance();
$sqlCommand = new SqlCommand($pdo);
$drinkDatas = $sqlCommand->getDrink();
$foodDatas = $sqlCommand->getFood();
$userDatas = $sqlCommand->getUser();
$reviewDatas = $sqlCommand->getReview();

$menus = array();
$users = array();
$reviews = array();

foreach ($drinkDatas as $drinkData) {
    $drink = new Drink($drinkData->menu_name, $drinkData->item,
                       $drinkData->memo, $drinkData->drink_type);
    $menus[] = $drink;
}

foreach ($foodDatas as $foodData) {
    $food = new Food($foodData->menu_name, $foodData->item,
                     $foodData->memo, $foodData->spiciness);
    $menus[] = $food;
}

foreach ($userDatas as $userData) {
    $user = new User($userData->user_name, $userData->user_type);
    $users[] = $user;
}

foreach ($reviewDatas as $reviewData) {
    foreach ($userDatas as $userData) {
        if ($userData->user_id == $reviewData->user_number) {
            $result = (empty($reviewData->food_number)) ? $reviewData->drink_number : $reviewData->food_number;
            $reviews[] = new Review($result, $userData->user_id, $reviewData->review_body);
        }
    }
}

?>

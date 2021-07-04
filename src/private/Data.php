<?php
require_once('Drink.php');
require_once('Food.php');
require_once('Review.php');
require_once('User.php');
require_once('SqlCommand.php');
require_once('Database.php');

use MyApp\User;
use MyApp\SqlCommand;
use MyApp\Database;
use MyApp\Drink;
use MyApp\Food;


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


$count = 1;
foreach ($menus as $menu) {
    if ($menu instanceof Drink) {
        $reviews[] = new Review($menu->getName(), $count, '果肉たっぷりのオレンジジュースです！');
    } else {
        $count++;
        $reviews[] = new Review($menu->getName(), $count, '果肉たっぷりのオレンジジュースです！');
    }
}


// $juice = new Drink('JUICE', 600, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/juice.png', 'アイス');
// $coffee = new Drink('COFFEE', 500, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/coffee.png', 'ホット');
// $curry = new Food('CURRY', 900, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/curry.png', 3);
// $pasta = new Food('PASTA', 1200, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/pasta.png', 1);

// $menus = array($juice, $coffee, $curry, $pasta);

// $user1 = new User('suzuki', 'male');
// $user2 = new User('tanaka', 'female');
// $user3 = new User('suzuki', 'female');
// $user4 = new User('sato', 'male');

// $users = array($user1, $user2, $user3, $user4);

// $review1 = new Review($juice->getName(), $user1->getId(), '果肉たっぷりのオレンジジュースです！');
// $review2 = new Review($curry->getName(), $user1->getId(), '具がゴロゴロしていてとてもおいしいです');
// $review3 = new Review($coffee->getName(), $user2->getId(), '香りがいいです');
// $review4 = new Review($pasta->getName(), $user2->getId(), 'ソースが絶品です。また食べたい。');

// $review5 = new Review($juice->getName(), $user3->getId(), '普通のジュース');
// $review6 = new Review($curry->getName(), $user3->getId(), '値段の割においしいカレーだと思いました');
// $review7 = new Review($coffee->getName(), $user4->getId(), '苦味がちょうどよくて、おすすめです');
// $review8 = new Review($pasta->getName(), $user4->getId(), '具材にこだわりを感じました。');

// $reviews = array($review1, $review2, $review3, $review4, $review5, $review6, $review7, $review8);

?>

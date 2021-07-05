<?php

use MyApp\Drink;
use MyApp\Menu;
use MyApp\Review;

// require_once('./private/Menu.php');
require_once('./private/Data.php');
require_once('./private/config.php');

// index.php からgetで送られたパラメータ値を取得
$menuName = $_GET['name'];

// GETから送られてきたパラメータ値のインスタンスを返す
$menu = Menu::findByName($menus, $menuName);

// reviewsはレビュー一覧の配列
// $menuReviewsはメニュー名が同じインスタンスが入る。
$menuReviews = $menu->getReviews($reviews);

?>

<!-- 各メニュー詳細ページ -->


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Progate</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>

<body>

    <div class="review-wrapper">
        <div class="review-menu-item">
        <img src="<?php echo $menu->getImage() ?>" class="menu-item-image">
        <h3 class="menu-item-name"><?php echo $menu->getName() ?></h3>

        <!-- Drinkクラスの場合、タイプを表示 -->
        <?php if ($menu instanceof Drink): ?>
            <p class="menu-item-type"><?php echo $menu->getType() ?></p>
        <!-- それ以外の場合、辛さを表示 -->
        <?php else: ?>
            <?php for ($i=0; $i<$menu->getSpiciness(); $i++): ?>
            <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/chilli.png" class='icon-spiciness'>
            <?php endfor ?>
        <?php endif ?>
        <p class="price">¥<?php echo $menu->getTaxIncludedPrice() ?></p>
        </div>

        <!-- レビュー一覧表示 -->
        <div class="review-list-wrapper">
            <div class="review-list">
                <div class="review-list-title">
                <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/review.png" class='icon-review'>
                <h4>レビュー一覧</h4>
                </div>

                <!-- レビュー表示 -->
                <?php foreach($menuReviews as $review): ?>
                    <?php $user=$review->getUser($users) ?>
                    <div class="review-list-item">
                        <div class="review-user">
                            <!-- 性別によってアイコンを変える -->
                            <?php if ($user->getGender() == 'male'): ?>
                                <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/male.png" class='icon-user'>
                            <?php else: ?>
                                <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/female.png" class='icon-user'>
                            <?php endif ?>
                            <p><?php echo $user->getName() ?></p>
                        </div>
                        <!-- レビュー -->
                        <p class="review-text"><?php echo $review->getBody() ?></p>
                        <?php
                            $test = $review->getBody()
                        ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <a href="index.php">メニュー一覧へ</a>
    </div>
</body>
</html>

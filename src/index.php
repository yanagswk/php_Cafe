<?php
require_once('Data.php');
require_once('Menu.php');

?>


<!DOCTYPE html>

<html>
<head>
    <title>Cafe Progate</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="menu-wrapper container">
        <h1 class="logo">Cafe Progete</h1>
        <h3>メニュー<?php echo Menu::getCount() ?>品</h3>



        <!-- フォーム送信先: Confirm.php -->
        <form method="post" action="Confirm.php">
            <div class="menu-items">

                <!-- data.phpのmenus -->
                <?php foreach ($menus as $menu): ?>
                    <div class="menu-item">
                    <img src="<?php echo $menu->getImage() ?>" class="menu-item-image">
                    <h3 class="menu-item-name">

                        <!-- Show.phpへのメニューごとのリンク -->
                        <a href="Show.php?name=<?php echo $menu->getName() ?>">
                            <?php echo $menu->getName() ?>
                        </a>
                    </h3>

                        <!-- インスタンスのクラスによって処理が変わる -->
                        <?php if ($menu instanceof Drink): ?>
                            <p class="menu-item-type"><?php echo $menu->getType() ?></p>
                        <?php else: ?>
                            <?php for ($i=0; $i<$menu->getSpiciness(); $i++): ?>
                                <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/chilli.png" class='icon-spiciness'>
                            <?php endfor ?>
                        <?php endif ?>

                        <!-- 値段表示 -->
                        <p class="price">¥<?php echo $menu->getTaxIncludedPrice() ?>（税込）</p>
                        <input type="text" value="0" name="<?php echo $menu->getName() ?>">
                        <span>個</span>
                    </div>
                <?php endforeach ?>
            </div>
            <input type="submit" value="注文する">
        </form>
    </div>
</body>
</html>

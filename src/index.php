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

                <!-- Data.php: $menus -->
                <?php foreach ($menus as $menu): ?>
                    <div class="menu-item">
                        <img src="<?php echo $menu->getImage() ?>" class="menu-item-image">
                        <h3 class="menu-item-name">
                            <!-- Show.phpへのメニューごとのリンク -->
                            <a href="Show.php?name=<?php echo $menu->getName() ?>">
                                <?php echo $menu->getName() ?>
                            </a>
                        </h3>

                        <!-- Drinkクラスの場合、タイプを表示 -->
                        <?php if ($menu instanceof Drink): ?>
                            <p class="menu-item-type"><?php echo $menu->getType() ?></p>
                        <!-- それ以外の場合、辛さを表示 -->
                        <?php else: ?>
                            <?php for ($i=0; $i<$menu->getSpiciness(); $i++): ?>
                                <img class='icon-spiciness' src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/chilli.png" >
                            <?php endfor ?>
                        <?php endif ?>

                        <!-- 値段表示 -->
                        <p class="price">¥<?php echo $menu->getTaxIncludedPrice() ?>（税込）</p>
                        <!-- name=value POST送信 -->
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

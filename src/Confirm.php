<?php

require_once('./private/Data.php');

?>


<html>
<head>
    <meta charset="utf-8">
    <title>Progate</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="order-wrapper">
        <h2>注文内容確認</h2>
        <!-- 合計金額 -->
        <?php $totalPayment = 0 ?>

        <?php foreach($menus as $menu): ?>

            <?php
                // $_POSTは配列取得(JUICE:"10"COFFEE:"6"CURRY:"8"PASTA:"0")
                $orderCount = $_POST[$menu->getName()];     // メニューの個数取得
                $menu->setOrderCount($orderCount);          // 注文数セット
                $totalPayment += $menu->getTotalPrice();    // 合計金額
            ?>
            <p class="order-amount">
                <?php echo $menu->getName() ?>
                ✖︎
                <?php echo $orderCount ?>
                個
            </p>
            <p class="order-price"><?php echo $menu->getTotalPrice() ?>円</p>
        <?php endforeach ?>
        <h3>合計金額: <?php echo $totalPayment ?>円</h3>
    </div>
</body>
</html>

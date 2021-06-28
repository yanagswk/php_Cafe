<?php require_once('Data.php') ?>


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
        <?php $totalPayment = 0 ?>

        <?php foreach($menus as $menu): ?>

            <?php 
                $orderCount = $_POST[$menu->getName()];
                $menu->setOrderCount($orderCount);
                $totalPayment += $menu->getTotalPrice();
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

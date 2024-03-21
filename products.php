<!DOCTYPE html>
<html>

<head>
    <?php
    include_once("db.php");
    session_start();
    $filename = 'products';
    include 'includes/head.php';
    ?>
</head>

<body>
    <?php
    include 'includes/navbar.php';

    $sql = $pdo->prepare("SELECT * FROM `products`");
    $sql->execute();
    foreach ($sql as $product): ?>
        <div class="product-container">
            <div class="product-img">
                <img src="images/<?php echo $product['img']?>" alt="product-img">
            </div>
            <div class="product-info">
                <h2> <?php echo $product['name']?> </h2>
                <p> <?php  echo $product['content']?>  </p>
                <p> <?php echo $product['price'] ?></p>
            </div>
        </div>';
    <?php endforeach; ?>

    <?php
    include 'includes/footer.php';
    ?>

</body>

</html>
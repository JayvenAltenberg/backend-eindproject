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
    ?>
    <div class="products-container">
        <?php foreach ($sql as $product) : ?>
            <div class="product-container">
                <div class="product-info">
                    <h2> <?php echo $product['name'] ?> </h2>
                    <img class="product-img" src="images/<?php echo $product['img'] ?>" alt="product-img">
                    <p> €<?php echo $product['price'] ?></p>
                    <a href="products.php" class="btn">add to cart</a>
                    <a href="detail.php" class="btn">vieuw details</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php
    include 'includes/footer.php';
    ?>

</body>

</html>
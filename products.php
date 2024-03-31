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
                    <img class="product-img" src="images/<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>">
                    <h2><?php echo $product['name']; ?></h2>
                    <p>Price: €<?php echo $product['price']; ?></p>
                    <a class="btn" href="detail.php?id=<?php echo $product['id']; ?>">View Details</a>
                </div>
        <?php endforeach; ?>
    </div>

    <?php
    include 'includes/footer.php';
    ?>

</body>

</html>
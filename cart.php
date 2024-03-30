<!DOCTYPE html>
<html>
<?php
session_start();
include_once "db.php";
?>

<head>
    <?php
    $filenames = "cart";
    include 'includes/head.php';
    ?>
</head>

<body>
    <?php
    include 'includes/navbar.php';
    ?>
    <div class="cart-container">
    <?php
    foreach ($_SESSION['cart'] as $id) :
        $sql = $pdo->prepare("SELECT * FROM `products` WHERE `id` = ?");
        $sql->execute([$id]);
        $product = $sql->fetch(PDO::FETCH_ASSOC);
        if ($product) :
    ?>
            <div class="item-card">
                <a href="product_details.php?id=<?= $product['id'] ?>">
                <img class="cart-img" src="images/<?php echo $product['img'] ?>" alt="product-img">
                </a>
                <div class="item-details">
                    <h3 class="item-name"><?= $product['name'] ?></h3>
                    <p class="item-price">€<?= $product['price'] ?></p>
                </div>
            </div>
    <?php
        endif;
    endforeach;
    ?>
    </div>


    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>
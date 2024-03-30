<!DOCTYPE html>
<html>
<?php
include_once 'db.php';
session_start();
?>

<head>
    <?php
    include 'includes/head.php';
    ?>
</head>

<body>
    <?php
    include 'includes/navbar.php';
    $id = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM `products` WHERE `id` =$id");
    $sql->execute();
    $product = $sql->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="detail-container">
        <h2> <?php echo $product['name'] ?> </h2>
        <section class="detail-content">

            <?php if ($product['stock'] > 9) : ?>
                <p class="low-stock-text">Low Stock</p>
            <?php endif; ?>

            <figure>
                <img src="images/<?php echo $product['img'] ?>" alt="product-img">
            </figure>
            <div class="description">
                <h2>Price</h2>
                <p>€<?php echo $product['price'] ?></p>
                <form method="post" action="addToCart.php">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <button type="submit" class="btn">Add to Cart</button>
                </form>
                <a href="products.php" class="btn">Buy Now</a>
                <?php if (isset($_SESSION['product_status'])) {
                    echo $_SESSION['product_status'];
                    unset($_SESSION['product_status']);
                }
                ?>
                <h2>Description</h2>
                <p><?php echo $product['content'] ?></p>
            </div>

        </section>
    </div>


    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>
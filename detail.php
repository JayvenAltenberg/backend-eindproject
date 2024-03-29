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
    //cart functions
    function addToCart($id){
        
    }
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
                <h2>price</h2>
                <p> €<?php echo $product['price'] ?></p>
                <a href="products.php" class="btn">add to cart</a>
                <a href="products.php" class="btn">buy now</a>
                <h2>Description</h2>
                <p> <?php echo $product['content'] ?></p>
            </div>
        </section>
    </div>


    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>
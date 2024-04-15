<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    include_once("../includes/db.php");
    $filename = 'homepage';
    include '../includes/head.php';
    ?>
</head>

<body>

    <header>
        <?php include '../includes/navbar.php'; ?>
    </header>

    <main>
        <div class="page-container">
            <div>
                <h1>2.0 products</h1>
                <a href="../items/products.php" class="shop-now-btn">shop now</a>
            </div>
        </div>
        <h1>trending</h1>
        <div class="products-container">
            <?php
            //trending products
            $sql = "SELECT * FROM products ORDER BY views DESC LIMIT 4";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $trending_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($trending_products as $product) {
            ?>
                <div class="product-container">
                    <img class="product-img" src="../images/<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>">
                    <h2><?php echo $product['name']; ?></h2>
                    <p>Price: €<?php echo $product['price']; ?></p>
                    <a class="btn" href="../items/detail.php?id=<?php echo $product['id']; ?>">View Details</a>
                </div>
            <?php
            }
            ?>
        </div>
    </main>

    <!--footer-->
    <?php include '../includes/footer.php'; ?>
</body>
</html>
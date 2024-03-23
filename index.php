<!DOCTYPE html>
<html>

<head>
    <?php
    include_once("db.php");
    $filename = 'homepage';
    include 'includes/head.php';
    ?>
</head>

<body>
    <header>
        <?php include 'includes/navbar.php'; ?>
    </header>

    <main>
        <div class="page-container">
            <div>
                <h1>2.0 products</h1>
                <a href="products.php" class="shop-now-btn">shop now</a>
            </div>
        </div>
        <h1>trending</h1>
    </main>

    <!--footer-->
    <?php include 'includes/footer.php'; ?>
</body>

</html>
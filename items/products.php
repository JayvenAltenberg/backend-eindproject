<!DOCTYPE html>
<html>
<head>
    <?php
    include_once("../includes/db.php");
    session_start();
    $filename = 'products';
    include '../includes/head.php';
    ?>
</head>
<body>
    <?php
    include '../includes/navbar.php';

    // Check if the search query is set and not empty
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        // Get the search query from the URL
        $search_query = $_GET['search'];

        // Prepare the SQL query to search for products
        $sql = $pdo->prepare("SELECT * FROM `products` WHERE `name` LIKE ?");
        $sql->execute(["%$search_query%"]);

        // Fetch the search results
        $search_results = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // If the search query is not provided, fetch all products
        $sql = $pdo->prepare("SELECT * FROM `products`");
        $sql->execute();
        $search_results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <form action="" method="GET">
        <div class="search-container">
            <input type="text" class="search-bar" name="search" value="<?php if(isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Search...">
            <button type="submit" class="search-button">Search</button>
        </div>
    </form>

    <div class="products-container">
        <?php if (!empty($search_results)) : ?>
            <?php foreach ($search_results as $product) : ?>
                <div class="product-container">
                    <img class="product-img" src="../images/<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>">
                    <h2><?php echo $product['name']; ?></h2>
                    <p>Price: €<?php echo $product['price']; ?></p>
                    <a class="btn" href="detail.php?id=<?php echo $product['id']; ?>">View Details</a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>

    <?php include '../includes/footer.php'; ?>

</body>
</html>

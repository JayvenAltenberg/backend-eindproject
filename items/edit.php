<!DOCTYPE html>
<html>
<head>
    <?php
    include_once "../includes/db.php";
    $filename = 'Edit Product';
    include '../includes/head.php';

    if(isset($_GET['id'])) {
        $product_id = $_GET['id'];

        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: products.php");
        exit();
    }
    ?>
</head>
<body>
<header>
    <?php include '../includes/navbar.php'; ?>
</header>
<main>
    <h1>Edit Product</h1>
    <form class="form" action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>

        <label for="weight">Weight:</label>
        <input type="text" id="weight" name="weight" value="<?php echo $product['weight']; ?>" required>

        <label for="material">Material:</label>
        <input type="text" id="material" name="material" value="<?php echo $product['material']; ?>" required>

        <label for="content">Content:</label>
        <input type="text" id="content" name="content" value="<?php echo $product['content']; ?>" required>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>" required>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="<?php echo $product['stock']; ?>">

        <div>
            <label for="image">Picture:</label>
            <input class="file" type="file" name="image" id="image">
        </div>

        <div>
            <input type="submit" value="Update" name="update">
        </div>
    </form>
</main>

<!--footer-->
<?php include '../includes/footer.php'; ?>

<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $weight = $_POST['weight'];
    $description = $_POST['description'];
    $material = $_POST['material'];
    $content = $_POST['content'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $product_id = $_POST['product_id'];

    // File
    if(!empty($_FILES['image']['name'])) {
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'images/' . $file_name;
        move_uploaded_file($tempname, $folder);

        // Update product data with the image
        $stmt = $pdo->prepare("UPDATE products SET `name`=?, `weight`=?, `material`=?, `content`=?, `price`=?, `img`=?, `stock`=? WHERE id=?");
        $stmt->execute([$name, $weight, $material, $content, $price, $file_name, $stock, $product_id]);
    } else {
        // Update product data without changing the image
        $stmt = $pdo->prepare("UPDATE products SET `name`=?, `weight`=?, `material`=?, `content`=?, `price`=?, `stock`=? WHERE id=?");
        $stmt->execute([$name, $weight, $material, $content, $price, $stock, $product_id]);
    }

    // Check if the update was successful
    if ($stmt) {
        echo "<script>alert('Product updated successfully.'); window.location.href='products.php';</script>";
    } else {
        echo "<script>alert('Error updating product.');</script>";
    }
}
?>
</body>
</html>

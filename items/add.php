<!DOCTYPE html>
<html>
<?php
include_once "db.php";


// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $weight = $_POST['weight'];
    $description = $_POST['description'];
    $material = $_POST['material'];
    $content = $_POST['content'];
    $price = $_POST['price'];

    // File
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/' . $file_name;
    move_uploaded_file($tempname, $folder);

    try {
        $stmt = $pdo->prepare("INSERT INTO products (`name`, `weight`, `material`, `content`, `price`, `img`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $weight, $material, $content, $price, $file_name]);
        // Check if the insertion was successful
        if ($stmt) {
            echo "Data inserted successfully.";
        } else {
            echo "Error inserting data.";
        }
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
}
?>


<head>
    <?php
    $filename = 'add product';
    include 'includes/head.php';
    ?>
</head>

<body>
    <header>
        <?php include 'includes/navbar.php'; ?>
    </header>

    <main>
        <form class="form" action="#" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="weight">weight:</label>
            <input type="text" id="weight" name="weight" required>

            <label for="name">meterial:</label>
            <input type="text" id="material" name="material" required>

            <label for="name">content:</label>
            <input type="text" id="content" name="content" required>

            <label for="name">price:</label>
            <input type="text" id="price" name="price" required>
            <div>
                <label for="file">picture:</label>
                <input class="file" type="file" name="image" id="image">
            </div>
            <div>
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
    </main>

    <!--footer-->
    <?php include 'includes/footer.php'; ?>
</body>

</html>
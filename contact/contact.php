<!DOCTYPE html>
<html>
<?php
session_start();
include_once '../includes/db.php';
?>

<head>
    <?php
    include '../includes/head.php';
    ?>
</head>

<body>
    <?php
    include '../includes/navbar.php';
    ?>
        <div class="container">
        <h1>Contact Us</h1>
        <form action="contact_handler.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
    <?php
    include '../includes/footer.php';
    ?>
</body>

</html>
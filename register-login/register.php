<?php
session_start();
require_once '../includes/db.php';
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>register</h2>


        <form action="handler.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Repeat Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <?php
            if (isset($_SESSION['errors'])) {
                $errors = $_SESSION['errors'];
                echo "<div class='error-message'>$errors</div>";
            }
            unset($_SESSION['errors']);
            if (isset($_SESSION['status'])) {
                $status = $_SESSION['status'];
                echo "<div class='status-message'>$status</div>";
            }
            unset($_SESSION['errors']);
            unset($_SESSION['status']);
            ?>
            
            <div class="form-group">
                <input type="submit" value="Login" name="submit">
            </div>
        </form>
    </div>

</body>

</html>
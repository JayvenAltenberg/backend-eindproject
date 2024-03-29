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

    <?php
        include 'includes/footer.php';
    ?>
</body>
</html>

<?php
session_start();
if (isset($_POST['product_id'])) {
    $id = $_POST['product_id'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (!is_array($_SESSION['cart'])) {
        $_SESSION['cart'] = array($_SESSION['cart']);
    }
    // Add the new product ID to the cart array
    $_SESSION['cart'][] = $id;
    header("Location: detail.php?id=".$id);
} else {
    header('Location: index.php');
}
?>


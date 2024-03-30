<?php
session_start();
if (isset($_POST['product_id'])) {
    $id = $_POST['product_id'];
    if (!is_array($_SESSION['cart'])) {
        $_SESSION['cart'] = array($_SESSION['cart']);
    }
    $_SESSION['cart'][] = $id;
    $_SESSION['product_status'] = "item added successfully";
    header("Location: detail.php?id=".$id);
} else {
    header('Location: index.php');
}

?>


<?php
session_start();
require_once '../includes/db.php';

if (isset($_GET['checkout']) && $_GET['checkout'] == 'true') {
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id) {
            $sql = $pdo->prepare("SELECT * FROM `products` WHERE `id` = ?");
            $sql->execute([$id]);
            $product = $sql->fetch(PDO::FETCH_ASSOC);

            $newStock = $product['stock'] - 1;

            $updateStock = $pdo->prepare("UPDATE `products` SET `stock` = ? WHERE `id` = ?");
            $updateStock->execute([$newStock, $id]);
        }
        unset($_SESSION['cart']);
        $_SESSION['bought'] = 'Items bought';
        header("location: cart.php");
    } else {
        header("Location: cart.php");
        exit();
    }
} else {
    header("Location: cart.php");
    exit();
}
?>

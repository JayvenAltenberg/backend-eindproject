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
        if (isset($_SESSION['coupon'])) {
            $coupon_code = $_SESSION['coupon_code'];
            $sql = $pdo->prepare("SELECT * FROM `coupon` WHERE `code` = ?");
            $sql->execute([$coupon_code]);
            $coupon = $sql->fetch(PDO::FETCH_ASSOC);
            $updateCoupon = $pdo->prepare("UPDATE `coupon` SET `used` = ? WHERE `code` = ?");
            $updateCoupon->execute([1 , $coupon_code]);
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

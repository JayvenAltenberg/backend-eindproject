<!DOCTYPE html>
<html>
<?php
session_start();
include_once "../includes/db.php";
?>

<head>
    <?php
    $filenames = "cart";
    include '../includes/head.php';
    ?>
</head>

<body>
    <?php
    include '../includes/navbar.php';
    ?>
    <div class="cart-container">
        <?php
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id) :
                $sql = $pdo->prepare("SELECT * FROM `products` WHERE `id` = ?");
                $sql->execute([$id]);
                $product = $sql->fetch(PDO::FETCH_ASSOC);
                if ($product) :
                    $price += $product['price'];
        ?>
                    <div class="item-card">
                        <a href="../items/detail.php?id=<?= $product['id'] ?>">
                            <img class="cart-img" src="../images/<?php echo $product['img'] ?>" alt="product-img">
                        </a>
                        <div class="item-details">
                            <h3 class="item-name"><?= $product['name'] ?></h3>
                            <p class="item-price">€<?= $product['price'] ?></p>
                        </div>
                    </div>
        <?php
                endif;
            endforeach;
        } else {
            echo 'Your cart is empty!';
        }
        ?>
        <?php if (!empty($_SESSION['cart'])) : ?>
            <div class="total">
                <div class="total-price">
                    <h3>Total: €<?= $price ?></h3>
                </div>
                <div class="checkout">
                    <a href="checkout.php">
                        <button type="button" class="btn">Checkout</button>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="coupon-form">
                    <form action="#" method="post">
                        <label for="coupon_code">Coupon Code:</label>
                        <input type="text" id="coupon_code" name="coupon_code">
                        <button type="submit" class="btn">Apply Coupon</button>
                    </form>
                    <?php
                        if (isset($status)) {
                            echo $status;
                            unset($status);
                        }
                    ?>
                </div>
    <?php
    include '../includes/footer.php';
    ?>
</body>
<?php
    if (isset($_POST['coupon_code'])) {
        $coupon_code = $_POST['coupon_code'];
        $sql = $pdo->prepare("SELECT * FROM `coupon` WHERE `code` = ?");
        $sql->execute([$coupon_code]);
        $coupon = $pdo-> prepare("SELECT * FROM `coupon`");
        $coupon->execute();
        foreach ($coupon as $coupon) {
            if ($coupon['code'] == $coupon_code) {
                $status = 'coupon code added successfully';
                $price -= $coupon['discount'];
            } else {
                $status = "Invalid coupon";
            }
        }
        
        
    }
?>

</html>

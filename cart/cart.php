<?php
session_start();
include_once "../includes/db.php";

function coupon_code($pdo, $coupon_code) {
    if (isset($_POST['coupon_code'])) {
        $sql = $pdo->prepare("SELECT * FROM `coupon` WHERE `code` = ?");
        $sql->execute([$coupon_code]);
        $coupon = $sql->fetch(PDO::FETCH_ASSOC);

        if ($coupon) {
            $status = "Valid coupon code";
            $discount = $coupon['discount'];
            $_SESSION['coupon_discount'] = $discount;
            return $status;
        } else {
            $status = "Invalid coupon code";
            return $status;
        }
    }
}


$status = '';
if (isset($_POST['coupon_code'])) {
    $coupon_code = $_POST['coupon_code'];
    $status = coupon_code($pdo, $coupon_code);
}

?>

<!DOCTYPE html>
<html>

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
        $price = 0;
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
            echo 'Your cart is empty! <br>';
        }
        if (isset($_SESSION['bought'])) {
            echo "<h1>{$_SESSION['bought']}</h1>";
            unset($_SESSION['bought']);
        }
        
        ?>
        
        <?php if (!empty($_SESSION['cart'])) : ?>
            <div class="total">
                <div class="total-price">
                    <h3>Total: €<?= $price ?></h3>
                    <?php
                    if (!empty($_SESSION['coupon_discount'])) {
                        $price -= $_SESSION['coupon_discount'];
                        echo "<p>Coupon Applied: -€{$_SESSION['coupon_discount']}</p>";
                        echo "<p>Total with coupon: €{$price}</p>";
                    }
                    ?>
                </div>
                <div class="checkout">
                    <a href="checkout.php?checkout=true">
                        <button type="button" class="btn">Checkout</button>
                    </a>
                    <div><?php echo $status; ?></div>
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
    </div>
    <?php
    include '../includes/footer.php';
    ?>
</body>

</html>

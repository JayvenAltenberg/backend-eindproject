<?php
    session_start();
    if (isset($_SESSION['cart'])) {
        $cart_amount = count($_SESSION['cart']) -1;
    } else {
        $cart_amount = 0;
    }
?>

<nav class="navbar">
        <img class="logo" src="../images/2.0_products-logo.png" alt="logo">
    <div class="navbar-content">
        <a href="../homepage/index.php">Home</a>
        <a href="../register-login/register.php">Register</a>
        <a href="add.php">Add</a>
        <a href="../items/products.php">Shop</a>
        <a href="../contact/contact.php">Contact</a>
    </div>
    <div class="navbar-end">
        <a href="../cart/cart.php">
            <img class="cart" src="../includes/cart.png" alt="shopping-cart">
        </a>
        <span class="cart-count"><?= $cart_amount; ?></span>
    </div>
</nav>
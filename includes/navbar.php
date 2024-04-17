<?php
session_start();
if (isset($_SESSION['cart'])) {
    $cart_amount = count($_SESSION['cart']) - 1;
} else {
    $cart_amount = 0;
}
?>

<nav class="navbar">
    <div onmousedown="startHold()" onmouseup="endHold()" ontouchstart="startHold()" ontouchend="endHold()">
        <img class="logo" src="../images/2.0_products-logo.png" alt="logo">
    </div>
    <div class="navbar-content">
        <a href="../homepage/index.php">Home</a>
        <a href="../register-login/register.php">Register</a>
        <?php echo (isset($_SESSION['logged_in'])) ? '<a href="../items/add.php">Add</a>' : ''; ?>
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

<!-- JavaScript -->
<script>
var holdTimer;

function startHold() {
  // Start a timer when mouse button is pressed down
  holdTimer = setTimeout(function() {
    // After a certain duration, redirect to the secret sign-in page
    redirectToSecretSignIn();
  }, 1000); // Adjust the duration as needed (in milliseconds)
}

function endHold() {
  // Clear the timer when mouse button is released
  clearTimeout(holdTimer);
}

function redirectToSecretSignIn() {
  // Redirect to the secret sign-in page
  window.location.href = '../register-login/login.php';
}
</script>

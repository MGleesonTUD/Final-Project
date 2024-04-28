<?php 
include "template/header.php"; 


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$feedback_message = ""; // feedback message  empty

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];

    // Add to cart logic
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = ['name' => $product_name, 'quantity' => 1];
    } else {
        $_SESSION['cart'][$product_id]['quantity']++;
    }


    $feedback_message = "You have added 1 item of {$product_name} to the cart.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Football Boots Store</title>
</head>
<body>
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
    
</div>

<h3 class="text-muted">Home page</h3>

<div class="product-container">
    <!-- Product 1 -->
    <div class="product">
        <img src="images/img1.jpg" alt="Football Boot 1">
        <h4>Adidas</h4>
        <p>€99.99</p>
        <form method="post">
            <input type="hidden" name="product_id" value="1">
            <input type="hidden" name="product_name" value="Adidas">
            <button type="submit" name="add_to_cart">Add to Cart</button>
        </form>
    </div>
    <!-- Product 2 -->
    <div class="product">
        <img src="images/img2.jpg" alt="Football Boot 2">
        <h4>Adidas 2</h4>
        <p>€119.99</p>
        <form method="post">
            <input type="hidden" name="product_id" value="2">
            <input type="hidden" name="product_name" value="Adidas 2">
            <button type="submit" name="add_to_cart">Add to Cart</button>
        </form>
    </div>
    <!-- Product 3 -->
    <div class="product">
        <img src="images/img3.jpg" alt="Football Boot 3">
        <h4>Nike</h4>
        <p>€55.99</p>
        <form method="post">
            <input type="hidden" name="product_id" value="3">
            <input type="hidden" name="product_name" value="Nike">
            <button type="submit" name="add_to_cart">Add to Cart</button>
        </form>
    </div>
    <!-- Product 4 -->
    <div class="product">
        <img src="images/img4.jpg" alt="Football Boot 4">
        <h4>Gola</h4>
        <p>€189.99</p>
        <form method="post">
            <input type="hidden" name="product_id" value="4">
            <input type="hidden" name="product_name" value="Gola">
            <button type="submit" name="add_to_cart">Add to Cart</button>
        </form>
    </div>
    <!-- Product 5 -->
    <div class="product">
        <img src="images/img5.jpg" alt="Football Boot 5">
        <h4>Nike High Heel</h4>
        <p>€5000</p>
        <form method="post">
            <input type="hidden" name="product_id" value="5">
            <input type="hidden" name="product_name" value="Nike High Heel">
            <button type="submit" name="add_to_cart">Add to Cart</button>
        </form>
    </div>
</div>

<div class="logout-area">
    <h1>Status: You are logged in <?php echo $_SESSION['Username']; ?></h1>
    <?php if (!empty($feedback_message)): ?>
        <p><?php echo $feedback_message; ?></p>
        <!-- Checkout Link -->
        <a href="checkout.php" class="button checkout-button">Checkout Now</a>
    <?php endif; ?>
    <b>
    <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
        <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
    </form>
</div>

<?php include "template/footer.php"; ?>
</body>
</html>

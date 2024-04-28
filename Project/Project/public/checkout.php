<?php
include "template/header.php";

$feedback_message = "You have purchased the following items:";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Checkout - Football Boots Store</title>
</head>
<body>
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
</div>

<h3 class="text-muted">Checkout Page</h3>

<div class="checkout-container">
    <?php if (!empty($feedback_message)): ?>
        <h4><?php echo $feedback_message; ?></h4>
        <ul>
        <?php
            foreach ($_SESSION['cart'] as $product_id => $details) {
                echo "<li>" . $details['name'] . ", Quantity: " . $details['quantity'] . "</li>";
            }
        ?>
        </ul>
    <?php endif; ?>
    <a href="index.php" class="button">Continue Shopping</a>
</div>

<div class="logout-area">
    <h1>Status: You are logged in <?php echo $_SESSION['Username']; ?></h1>
    <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
        <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
    </form>
</div>

<?php include "template/footer.php"; ?>
</body>
</html>


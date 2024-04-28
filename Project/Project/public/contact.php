<?php require_once 'template/header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
</div>

<div class="row marketing">
    <h4>Contacts page</h4>
    <div class="contact-form-container">
        <h2>Contact Us</h2>
        <form id="contactForm" onsubmit="return handleSubmit();" method="POST"> <!-- Removed the action attribute -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required placeholder="Your name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Your email">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" required placeholder="Your message"></textarea>
            </div>
            <button type="submit" class="submit-button">Send Message</button>
        </form>
    </div>

    <div class="mainarea">
        <h1>Status: You are logged in <?php echo $_SESSION['Username']; ?></h1>
        <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
            <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
        </form>
    </div>
</div>

<?php require_once 'template/footer.php';?>
<script>
function handleSubmit() {
    alert("Thank you for your message!");
    document.getElementById('name').value = ''; 
    document.getElementById('email').value = ''; 
    document.getElementById('message').value = ''; 
    return false; 
}
</script>
</body>
</html>

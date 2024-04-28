<?php require_once 'template/header.php'; ?>

<body class="about-page">
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
</div>

<div class="container"> 
  <div class="header clearfix">
  </div>

  <div class="row marketing" style="text-align: center;">
    <img src="images/img6.jpg" alt="Decorative background" style="width: 80%; margin: 0 auto; display: block;">
    <div>
      <h4>Football Boots History</h4>
      <p>In the heart of Blanchardstown, Dublin, a small football boots shop began its journey in a modest garage, fueled by a deep passion for the sport and an entrepreneurial spirit. What started as a local niche for football enthusiasts quickly escalated due to its commitment to quality and innovation. As word spread and demand grew, the shop expanded its operations online, swiftly becoming the go-to source globally for football boots. Today, it stands as the largest football boots website in the world, setting industry standards and inspiring players across all levels with its impressive range of products and dedication to the beautiful game.</p>
    </div>
  </div>

  <div class="mainarea">
    <h1>Status: You are logged in <?php echo $_SESSION['Username']; ?></h1>
    <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
      <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
    </form>
  </div>

  <?php require_once 'template/footer.php'; ?>
</div>
</body>
</html>




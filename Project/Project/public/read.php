<?php 
require "../common.php"; 
require_once '../src/DBconnect.php'; 


$result = [];

if (isset($_POST['submit']) && !empty($_POST['firstname'])) {   
    try {
        
        $sql = "SELECT * FROM products WHERE name = :name";
        $statement = $connection->prepare($sql); 
        $statement->bindParam(':name', $_POST['firstname'], PDO::PARAM_STR);
        $statement->execute(); 
        $result = $statement->fetchAll();
    } catch(PDOException $error) {     
        echo $sql . "<br>" . $error->getMessage();   
    } 
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

<?php include "template/header.php"; ?>

<div class="navbar2">
    <a href="index.php">Home-Customer View</a>
    <a href="about.php">About-Customer View</a>
    <a href="contact.php">Contact- Customer View</a>
    <a href="read.php">Stock View</a>
    <a href="delete.php">Delete Users</a>
    <a href="update.php">Admin Home</a>
</div>


<h2>Find Product Based on Name</h2>
<form method="post"> 
    <label for="firstname">Name</label>
    <input type="text" id="firstname" name="firstname">
    <input type="submit" name="submit" value="View Results"> 
</form> 

<?php 
if (isset($_POST['submit']) && !empty($_POST['firstname'])) {   
    if ($result && count($result) > 0) {  
?>
        <h2>Results</h2>     
        <table>   
            <thead>     
                <tr>       
                    <th>Product ID</th>       
                    <th>Product Name</th>       
                    <th>Price</th>       
                    <th>Quantity</th>       
                      
                </tr>   
            </thead>   
            <tbody>   
                <?php foreach ($result as $row) : ?>     
                    <tr>       
                        <td><?php echo escape($row["id"]); ?></td>       
                        <td><?php echo escape($row["name"]); ?></td>       
                        <td><?php echo escape($row["price"]); ?></td>       
                        <td><?php echo escape($row["quantity"]); ?></td>        
                          
                    </tr>   
                <?php endforeach; ?>   
            </tbody> 
        </table> 
<?php
    } else {     
        echo "<p>No results found for " . escape($_POST['firstname']) . ".</p>";   
    }
} 
?>
<div class="logout-area">
    <h1>Status: You are logged in <?php echo $_SESSION['Username']; ?></h1>
    <?php if (!empty($feedback_message)): ?>
        <p><?php echo $feedback_message; ?></p>
        
    <?php endif; ?>
    <b>
    <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
        <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
    </form>



<?php include "template/footer.php"; ?>

</body>
</html>




















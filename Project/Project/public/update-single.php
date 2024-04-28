<?php 
require "../common.php"; 

if (isset($_POST['submit'])) { 
    try { require_once '../src/DBconnect.php';   
        
        $products =[       
            "id"        => escape($_POST['id']),       
            "name"      => escape($_POST['name']),       
            "price"     => escape($_POST['price']),       
            "quantity"  => escape($_POST['quantity']),       
               
        ]; 
        
        $sql = "UPDATE products 
                    SET id = :id, 
                        name = :name, 
                        price = :price, 
                        quantity = :quantity
                       
                    
                    WHERE id = :id ";
                    



            $statement = $connection->prepare($sql);   
            $statement->execute($products);


    } catch(PDOException $error) { 
        echo $sql . "<br>" . $error->getMessage(); 
    } 
}



if (isset($_GET['id'])) { 
    try { require_once '../src/DBconnect.php'; 
        $id = escape ($_GET['id']); 
        $sql = "SELECT * FROM products WHERE id = :id"; 
        $statement = $connection->prepare($sql); 
        $statement->bindValue(':id', $id); 
        $statement->execute(); 
        $user = $statement->fetch(PDO::FETCH_ASSOC); 
        
    } catch(PDOException $error) { 
        echo $sql . "<br>" . $error->getMessage(); 
    }
    } else { echo "Something went wrong!";
     exit;
      } 
      ?> 



<?php if (isset($_POST['submit']) && $statement) : ?> 
    <?php echo escape($_POST['name']); ?> successfully updated. 
<?php endif; ?>


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

<h2>Edit a user</h2> 
<form method="post"> 
    <?php foreach ($user as $key => $value) : ?> 
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label> 
        <input type="text" name="<?php echo $key; ?>" id="
        <?php echo $key; ?>" value="<?php echo escape($value); ?>" 
        <?php echo ($key === 'id' ? 'readonly' : null); ?>> 
        <?php endforeach; ?> <input type="submit" name="submit" value="Submit"> 
</form> 

<div class="logout-area">
    <h1>Status: You are logged in <?php echo $_SESSION['Username']; ?></h1>
    <?php if (!empty($feedback_message)): ?>
        <p><?php echo $feedback_message; ?></p>
        
    <?php endif; ?>
    <b>
    <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
        <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
    </form>
</div>
   

    </body>
    </html>
    
    
    <?php require "template/footer.php"; ?> 
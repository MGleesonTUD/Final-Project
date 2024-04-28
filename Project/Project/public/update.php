<?php  
/**   
 * 
 * 
 * * List all users with a link to edit   
 * 
 * 
 * */  

try {   
    require "../common.php";   
    require_once '../src/DBconnect.php';     
    
    $sql = "SELECT * FROM products";
    
    $statement = $connection->prepare($sql);   
    $statement->execute();    
    
    $result = $statement->fetchAll();  

    
    } catch(PDOException $error) {   
        echo $sql . "<br>" . $error->getMessage(); 
        
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
<h2>Stock</h2>  
<table>   
    <thead>     
        <tr>       
            <th>Product ID</th>       
            <th>Product Name</th>              
            <th>Price</th>       
            <th>Email</th>        
            <th>Edit</th>   
        </tr>   
    </thead>   
    <tbody>   
        <?php foreach ($result as $row) : ?>     
            <tr>       
                <td><?php echo $row["id"]; ?></td>       
                <td><?php echo $row["name"]; ?></td>       
                <td><?php echo $row["price"]; ?></td>       
                <td><?php echo $row["quantity"]; ?></td>        
                <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>   
            </tr>   
            <?php endforeach; ?>   
        </tbody> 
    </table>  
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
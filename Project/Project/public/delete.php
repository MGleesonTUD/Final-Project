<?php  
  
if (isset($_GET["id"])) {   
    try {     
        require_once '../src/DBconnect.php';      
        $id = $_GET["id"];      
        $sql = "DELETE FROM user WHERE id = :id";
        $statement = $connection->prepare($sql);     
        $statement->bindValue(':id', $id);     
        $statement->execute();      
        $success = "User ". $id. " successfully deleted";
    } catch(PDOException $error) {     
        echo $sql . "<br>" . $error->getMessage();   
    } 
}  

try {   
    require "../common.php";   
    require_once '../src/DBconnect.php';     
    
    $sql = "SELECT * FROM user";
    
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
<h2>Update users</h2>  
<table>   
    <thead>     
        <tr>       
            <th>#</th>       
            <th>First Name</th>       
            <th>Last Name</th>       
            <th>Email Address</th>       
            <th>Age</th>       
            <th>Password</th>
            <th>Date</th>  
            <th>Delete</th>   
        </tr>   
    </thead>   
    <tbody>   
        <?php foreach ($result as $row) : ?>     
            <tr>       
                <td><?php echo $row["id"]; ?></td>       
                <td><?php echo $row["firstname"]; ?></td>       
                <td><?php echo $row["lastname"]; ?></td>       
                <td><?php echo $row["email"]; ?></td>       
                <td><?php echo $row["age"]; ?></td>       
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["date"]; ?> </td> 
                <td><a href="delete.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>   
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
    
  
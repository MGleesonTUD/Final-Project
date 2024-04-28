<?php
require_once '../config.php';
session_start();

$loginError = '';

if(isset($_POST['Submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $sql = "SELECT * FROM user WHERE firstname = :firstname";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':firstname', $_POST['Username'], PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && $_POST['Password'] == $user['password']) { 
            $_SESSION['Username'] = $user['firstname'];
            $_SESSION['Active'] = true;
            $_SESSION['Admin'] = $user['Admin']; 

            if ($user['Admin']) {
                header("location:update.php");
                exit;
            } else {
                header("location:index.php");
                exit;
            }
        } else {
            $loginError = 'Incorrect Username or Password';
        }
    } catch (Exception $e) {
        $loginError = 'Error Logging in: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/signin.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    <title>Sign in</title>
</head>
<body>
<div class="login-page">
    <div class="container">
        <form action="" method="post" name="Login_Form" class="form-signin">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputUsername">Username</label>
            <input name="Username" type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword">Password</label>
            <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button name="Submit" value="Login" class="button" type="submit">Sign in</button>
            <p class="messages-error"><?php echo $loginError; ?></p>
        </form>

        <p>If you are a new user <a href="create.php">Create an Account here</a></p>
    </div>
</div>
</body>
</html>

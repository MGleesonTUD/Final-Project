<?php 
session_start(); 
if (!isset($_SESSION['Active']) || $_SESSION['Active'] !== true) {  
    $current_page = basename($_SERVER['PHP_SELF']);
    if ($current_page != 'login.php' && $current_page != 'create.php') {
        header("Location: login.php"); // Redirect to login if not on login or create page
        exit;
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
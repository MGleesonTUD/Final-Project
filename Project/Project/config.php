<?php 

/** 
 * * Configuration for database connection 
 * 
 * 
 * *
 *  */ 
$host       = "localhost"; 
$username   = "root"; 
$password   = ""; 
$dbname     = "shop"; // will use later 
$dsn        = "mysql:host=$host;port=3305;dbname=$dbname"; // will use later 
$options    = array( 
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
); 
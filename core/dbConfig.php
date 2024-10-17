<?php  
$host = "localhost";
$user = "root";
$password = "";
$dbname = "franchise_partners";
$dsn = "mysql:host={$host};dbname={$dbname}";
$pdo = new PDO($dsn, $user, $password);
?>
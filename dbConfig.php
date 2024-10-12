<?php  

$host = "localhost";
$user = "root";
$password = "";
$dbname = "go";
$dsn = "mysql:host={$host};dbname={$dbname}";
$pdo = new PDO($dsn, $user, $password);

?>
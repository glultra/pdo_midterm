<?php 
session_start();
$host = 'localhost';
$db = 'isa_midterm';
$user = 'root';
$pass = '';
$dsn="mysql:host=$host;dbname=$db";

try {
    $conn = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
    echo $e->getMessage();
}

?>
<?php
require_once 'pdo_connection.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET"){
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($record);
}else{
    http_response_code(400);
    echo 'Only GET method allowed in this route.';
}

?>
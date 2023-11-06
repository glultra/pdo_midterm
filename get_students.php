<?php
// header("Access-Control-Allow-Origins: *");
// header("Access-Control-Allow-Headers: access");
// header("Access-Control-Allow-Methods: GET");
// header("Access-Control-Allow-Credentials: true");
// header("Content-Type: application/json; charset=UTF-8");

require_once 'pdo_connection.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET"){
    $sql = "SELECT * FROM students";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);
}else{
    http_response_code(400);
    echo 'Only GET method allowed in this route.';
}

?>
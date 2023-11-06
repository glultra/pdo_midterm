<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");

require_once 'pdo_connection.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST"){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $stage = $_POST['stage'];

    $sql = "INSERT INTO students values($id, :name, $age, $stage)";
    $stmt = $conn->prepare($sql);
    // Bindings...
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    //excutions...
    if($stmt->execute()){
        echo "New student created.";
    }else{
        echo 'Error occured.';
    };

}else{
    http_response_code(400);
    echo 'Only POST method allowed in this route.';
}

?>
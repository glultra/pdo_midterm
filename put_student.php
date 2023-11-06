<?php
require_once 'pdo_connection.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method == "PUT"){
    $id = $_GET['id'];
    $data = json_decode(file_get_contents("php://input"));

    $name = $data->name ?? null;
    $age = $data->age ?? null;
    $stage = $data->stage ?? null;

    $sql = "UPDATE students SET"
        .($name ? " name = :name," : "")
        .($age ? " age = :age," : "")
        .($stage ? " stage = :stage," : "");
    $sql = rtrim($sql, ', ') ." WHERE id = $id";

    $stmt = $conn->prepare($sql);
    // Binding...
    $name ? $stmt->bindValue(':name', $name, PDO::PARAM_STR) : null;
    $age ? $stmt->bindValue(':age', $age, PDO::PARAM_INT) : null;
    $stage ? $stmt->bindValue(':stage', $stage, PDO::PARAM_INT) : null;

    if($stmt->execute()){
        echo 'Successfuly updated student data.';
    }else{
        echo 'Error Occured.';
    }
    
    

}else{
    http_response_code(400);
    echo 'Only PUT method allowed in this route.';
}

?>
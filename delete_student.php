<?php

require_once 'pdo_connection.php';

$method = $_SERVER['REQUEST_METHOD'];
if($method == "DELETE"){
    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    if($record){
        $name = $record['name'];
        $sql = "DELETE FROM students WHERE id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "Student " . $name . " deleted.";
    }
    else {
        echo "Error id: $id not exist in students.";
    }

}else{
    http_response_code(400);
    echo 'Only DELETE method allowed in this route.';
}


?>
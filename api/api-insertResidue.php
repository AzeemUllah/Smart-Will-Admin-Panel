<?php

$input = json_decode(file_get_contents('php://input'));

header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "4Slash1234!@#$";
$dbname = "smart_will";

$response = array();

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    $response = array("Status"=>"Error", "Error"=>$conn->connect_error, "Data"=>"");
    echo json_encode($response);
    exit;
}

$sql = "DELETE FROM `resedue_of_estate` WHERE `u_id` = '".$input->user_id."' and `type` = 'childrens'";
if ($conn->query($sql) === TRUE) {
    $sql = "INSERT INTO `smart_will`.`resedue_of_estate` (`id`, `first_name`, `mid_name`, `sur_name`, `relationship`, `estate`, `type`, `u_id`, `created_at`, `updated_at`) 
    VALUES (NULL, '".$input->firstName."', '".$input->middleName."', '".$input->lastName."', '".$input->relationship."', '".$input->estate."', '".$input->type."', '".$input->user_id."', CURRENT_TIMESTAMP, NULL);";

    if ($conn->query($sql) === TRUE) {
        $response = array("Status"=>"Ok", "Error"=>"", "Data"=>"");
    } else {
        $response = array("Status"=>"Error", "Error"=>$conn->error, "Data"=>"");
    }
} else {
    $response = array("Status"=>"Error", "Error"=>$conn->error, "Data"=>"");
}




$conn->close();

echo json_encode($response);
?>
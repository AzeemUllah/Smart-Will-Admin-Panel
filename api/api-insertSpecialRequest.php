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

$sql = "INSERT INTO `smart_will`.`special_request` (`id`, `buried_cremated`, `home_owner`, `music`, `video_storage`, `prepaid_plan`, `request`, `u_id`, `created_at`, `updated_at`) 
VALUES (NULL, '".$input->buried_cremated."', '".$input->home_owner."', '".$input->music."', '".$input->video_name."', '".$input->prepaid_plan."', '".$input->request."', '".$input->user_id."', CURRENT_TIMESTAMP, NULL);";


if ($conn->query($sql) === TRUE) {
    $response = array("Status"=>"Ok", "Error"=>"", "Data"=>"");
} else {
    $response = array("Status"=>"Error", "Error"=>$conn->error, "Data"=>"");
}

$conn->close();

echo json_encode($response);
?>
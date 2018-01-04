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

$sql = "SELECT * FROM  `users` where `email` = '" . $input->email ."'";
$result = $conn->query($sql);

if (($result->num_rows > 0)) {
    $response = array("Status"=>"Error", "Error"=>"Email address already exists.", "Data"=>"");
    echo json_encode($response);
    exit;
}

$sql = "INSERT INTO `smart_will`.`users` (`id`, `user_name`, `email`, `password`, `token_generat`, `token_status`, `created_at`, `updated_at`,`current_working_class`)
        VALUES (NULL, '".$input->username."', '".$input->email."', '".$input->password."', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'testator');";

if ($conn->query($sql) === TRUE) {
    $response = array("Status"=>"Ok", "Error"=>"", "Data"=>"");
} else {
    $response = array("Status"=>"Error", "Error"=>$conn->error, "Data"=>"");
}

$conn->close();

echo json_encode($response);
?>
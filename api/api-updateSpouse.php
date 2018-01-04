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

$sql = "UPDATE  `smart_will`.`spouse` SET  `first_name` =  '".$input->firstName."',
`mid_name` =  '".$input->middleName."',
`sur_name` =  '".$input->lastName."',
`address` =  '".$input->address."',
`post_code` =  '".$input->postalCode."',
`telephone` =  '".$input->telephone."',
`email` = '".$input->email."',
`date_of_birth` = '".$input->date."',
`gender` =  '".$input->gender."',
`updated_at` =  CURRENT_TIMESTAMP WHERE  `spouse`.`u_id` = ".$input->user_id;


if ($conn->query($sql) === TRUE) {
    $response = array("Status"=>"Ok", "Error"=>"", "Data"=>"");
} else {
    $response = array("Status"=>"Error", "Error"=>$conn->error, "Data"=>"");
}

$conn->close();

echo json_encode($response);
?>
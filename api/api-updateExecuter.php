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

$sql = "UPDATE  `smart_will`.`executor` SET  `first_name` =  '".$input->firstName."',
`mid_name` =  '".$input->middleName."',
`sur_name` =  '".$input->lastName."',
`address` =  '".$input->address."',
`post_code` =  '".$input->postalCode."',
`date_of_birth` = '".$input->date."',
`relationship` = '".$input->relation."',
`updated_at` =  CURRENT_TIMESTAMP WHERE  `executor`.`u_id` = ".$input->user_id ." and `id` = " . $input->updateId;


if ($conn->query($sql) === TRUE) {
    $response = array("Status"=>"Ok", "Error"=>"", "Data"=>"");
} else {
    $response = array("Status"=>"Error", "Error"=>$conn->error, "Data"=>"");
}

$conn->close();

echo json_encode($response);
?>
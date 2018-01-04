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

$sql = "UPDATE  `smart_will`.`special_request` SET  `buried_cremated` =  '".$input->buried_cremated."',
`home_owner` =  '".$input->home_owner."',
`music` =  '".$input->music."',
`prepaid_plan` =  '".$input->prepaid_plan."',
`request` =  '".$input->request."',
`video_storage` =  '".$input->video_name."',
`updated_at` =  CURRENT_TIMESTAMP WHERE  `special_request`.`id` = ".$input->updateId;


if ($conn->query($sql) === TRUE) {
    $response = array("Status"=>"Ok", "Error"=>"", "Data"=>"");
} else {
    $response = array("Status"=>"Error", "Error"=>$conn->error, "Data"=>"");
}

$conn->close();

echo json_encode($response);
?>
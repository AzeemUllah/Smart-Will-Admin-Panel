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

$insert="INSERT INTO `smart_will`.`support_desission` (`id`, `option1`, `option2`, `option3`, `user_id`) VALUES (NULL, '".$input->option1."', '".$input->option2."', '".$input->option3."', '".$input->user_id."');";
$delete = "DELETE FROM `smart_will`.`support_desission` WHERE user_id=".$input->user_id.";";

/*$update = "UPDATE  `smart_will`.`support_desission` SET  `option1` =  '".$input->option1."',
`option2` =  '".$input->option2."',
`option3` =  '".$input->option3."' WHERE  `support_desission`.`id` =".$input->user_id.";";
*/


if ($conn->query($delete) === TRUE) {
    if ($conn->query($insert) === TRUE) {
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
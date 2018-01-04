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

$sql = "UPDATE  `smart_will`.`gifts_legacy` SET  `foundation1` =  '".$input->foundation1."',
`foundation2` =  '".$input->foundation2."',
`foundation3` =  '".$input->foundation3."',

`charity_no_1` =  '".$input->charity_no_1."',
`charity_no_2` =  '".$input->charity_no_2."',
`charity_no_3` =  '".$input->charity_no_3."',

`gift_1` =  '".$input->gift_1."',
`gift_2` =  '".$input->gift_2."',
`gift_3` =  '".$input->gift_3."',


`updated_at` =  CURRENT_TIMESTAMP  WHERE  `gifts_legacy`.`id` =" . $input->foundationId . " and `gifts_legacy`.`u_id` = " . $input->user_id;




if ($conn->query($sql) === TRUE) {
    $response = array("Status"=>"Ok", "Error"=>"", "Data"=>"");
} else {
    $response = array("Status"=>"Error", "Error"=>$conn->error, "Data"=>"");
}

$conn->close();

echo json_encode($response);
?>
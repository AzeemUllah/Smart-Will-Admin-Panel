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

$sql = "DELETE FROM `gifts` WHERE `u_id` = " . $input->user_id;

if ($conn->query($sql) === TRUE) {
    $sql = "INSERT INTO `smart_will`.`gifts_legacy` (`id`, `foundation1`, `foundation2`, `foundation3`,`charity_no_1`, `gift_1`, `charity_no_2`, `gift_2`, `charity_no_3`, `gift_3`, `u_id`, `created_at`, `updated_at`) 
    VALUES (NULL, '".$input->foundation1."', '".$input->foundation2."', '".$input->foundation3."', 
    '".$input->charity_no_1."',  '".$input->gift_1."', '".$input->charity_no_2."', '".$input->gift_2."','".$input->charity_no_3."','".$input->gift_3."',
    '".$input->user_id."', CURRENT_TIMESTAMP, NULL);";


    if ($conn->query($sql) === TRUE) {
        $response = array("Status"=>"Ok", "Error"=>"", "Data"=>"");
    } else {
        $response = array("Status"=>"Error", "Error"=>$conn->error, "Data"=>$sql);
    }

} else {
    $response = array("Status"=>"Error", "Error"=>$conn->error, "Data"=>$sql);
}



$conn->close();

echo json_encode($response);
?>
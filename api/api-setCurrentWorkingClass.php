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

$sql = "SELECT * FROM  `users` where `id` = " . $input->user_id;
$result = $conn->query($sql);

if (!($result->num_rows > 0)) {
    $response = array("Status"=>"Error", "Error"=>"User Doesnot Exists", "Data"=>"");
    $conn->close();
    echo json_encode($response);
    exit;
}
else{
    $sql = "UPDATE  `smart_will`.`users` SET  `current_working_class` =  '".$input->current_class."' WHERE  `users`.`id` =".$input->user_id;
    if($conn->query($sql) === TRUE){
        $response = array("Status"=>"Ok", "Error"=>"", "Data"=>"");
        $conn->close();
        echo json_encode($response);
        exit;
    }
    else{
        $response = array("Status"=>"Error", "Error"=>$conn->error, "Data"=>"");
        $conn->close();
        echo json_encode($response);
        exit;
    }

}

$conn->close();
echo json_encode($response);
?>
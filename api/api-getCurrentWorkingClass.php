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

$sql = "SELECT * FROM  `users` where `id` = " . $input->id;
$result = $conn->query($sql);

if (!($result->num_rows > 0)) {
    $response = array("Status"=>"Error", "Error"=>"User Doesnot Exists", "Data"=>"");
    $conn->close();
    echo json_encode($response);
    exit;
}
else{
    $current_working_class = "login";
    while($row = $result->fetch_assoc()) {
        $current_working_class = $row['current_working_class'];
    }
    $response = array("Status"=>"Ok", "Error"=>"", "Data"=>$current_working_class);
    $conn->close();
    echo json_encode($response);
    exit;
}

$conn->close();
echo json_encode($response);
?>
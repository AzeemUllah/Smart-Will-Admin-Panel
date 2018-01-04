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

$sql = "SELECT * FROM  `executor` where `u_id`=". $input->user_id;
$result = $conn->query($sql);

if (!($result->num_rows > 0)) {
    $response = array("Status"=>"Error", "Error"=>"No Data.", "Data"=>"");
    $conn->close();
    echo json_encode($response);
    exit;
}
else{
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }

    $response = array("Status"=>"Ok", "Error"=>"", "Data"=>$rows);
    $conn->close();
    echo json_encode($response);
    exit;
}

$conn->close();
echo json_encode($response);
?>
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

$sql = "SELECT * FROM  `special_request` where `u_id`=". $input->user_id;
$result = $conn->query($sql);

if (!($result->num_rows > 0)) {
    $response = array("Status"=>"Error", "Error"=>"No Data.", "Data"=>"");
    $conn->close();
    echo json_encode($response);
    exit;
}
else{
    $buried_cremated	 = '';
    $home_owner = '';
    $music = '';
    $video_storage = '';
    $prepaid_plan = '';
    $request = '';
    $id = '';


    while($row = $result->fetch_assoc()) {
        $buried_cremated = $row['buried_cremated'];
        $home_owner =$row['home_owner'];
        $music = $row['music'];
        $video_storage = $row['video_storage'];
        $prepaid_plan = $row['prepaid_plan'];
        $request = $row['request'];
        $id = $row['id'];

    }

    $data = array("buried_cremated" => $buried_cremated	, "home_owner" => $home_owner, "music" => $music,
        "video_storage" => $video_storage,  "prepaid_plan" => $prepaid_plan, "request" => $request, "id" => 	$id);

    $response = array("Status"=>"Ok", "Error"=>"", "Data"=>$data);
    $conn->close();
    echo json_encode($response);
    exit;
}

$conn->close();
echo json_encode($response);
?>
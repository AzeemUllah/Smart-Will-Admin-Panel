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

$sql = "SELECT * FROM  `testator` where `u_id`=". $input->user_id;
$result = $conn->query($sql);

if (!($result->num_rows > 0)) {
    $response = array("Status"=>"Error", "Error"=>"No Data.", "Data"=>"");
    $conn->close();
    echo json_encode($response);
    exit;
}
else{
    $first_name = '';
    $middle_name = '';
    $last_name = '';
    $address = '';
    $post_code = '';
    $telephone = '';
    $email = '';
    $dob = '';
    $gender = '';

    while($row = $result->fetch_assoc()) {
        $first_name = $row['first_name'];
        $middle_name =$row['mid_name'];
        $last_name = $row['sur_name'];
        $address = $row['address'];
        $post_code = $row['post_code'];
        $telephone = $row['telephone'];
        $email = $row['email'];
        $dob = $row['date_of_birth'];
        $gender = $row['gender'];
    }

    $data = array("first_name" => $first_name, "middle_name" => $middle_name, "last_name" => $last_name,
       "address" => $address,  "post_code" => $post_code, "telephone" => $telephone, "email" => $email, "dob" => $dob, "gender" => $gender);

    $response = array("Status"=>"Ok", "Error"=>"", "Data"=>$data);
    $conn->close();
    echo json_encode($response);
    exit;
}

$conn->close();
echo json_encode($response);
?>
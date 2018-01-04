<?php

    $file_path = "./../fileserver/videos/users/";

    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        $sql = "UPDATE  `smart_will`.`special_request` SET  `video_storage` =  'http://128.199.50.69/fileserver/videos/users/" . basename($_FILES['uploaded_file']['name']) . "' WHERE  `special_request`.`u_id` =" . $_GET['user_id'] . ";";
        $servername = "localhost";
        $username = "root";
        $password = "4Slash1234!@#$";
        $dbname = "smart_will";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            $response = array("Status" => "Error", "Error" => $conn->connect_error, "Data" => "");
            echo json_encode($response);
            exit;
        }
        if ($conn->query($sql) === TRUE) {
            echo "done";
        } else {
            echo "fail";
        }
    } else{

    }

 ?>
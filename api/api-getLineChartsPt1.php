<?php

$input = json_decode(file_get_contents('php://input'));

header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "4Slash1234!@#$";
$dbname = "smart_will";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo $conn->connect_error;
    exit;
}

$sql = "SELECT DATE_FORMAT( (  `created_at` ) ,  '%b' ) AS date, COUNT(  `id` ) AS count
FROM  `users` 
GROUP BY DATE_FORMAT( (  `created_at` ) ,  '%b' ) ";

$result = $conn->query($sql);

if (!($result->num_rows > 0)) {
    echo "No data.";
    $conn->close();
    exit;
}
else{
    echo "[";
    while($row = $result->fetch_assoc()) {
        echo "'" . $row['date'] . "', ";
    }
    echo "]";
}

$conn->close();
exit;
?>
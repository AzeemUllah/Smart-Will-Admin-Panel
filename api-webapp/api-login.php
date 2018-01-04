<?php
include "config.php";
session_start();
	
$sql = "SELECT * FROM `admin_accounts` where `email` = '".$_POST['username']."' and `password` = '".$_POST['password']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$_SESSION["username"] = $row["username"];
		$_SESSION["user_id"] = $row["id"];
		$_SESSION["email"] = $row["email"];
    }
	echo 1;
} else {
   echo 0;
}
$conn->close();
?>

<?php
require("../../DBConnection.php");

$user_name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$type = $_POST['type'];
$photo = $_POST['photo'];
$phone_num = $_POST['phone_num'];
//$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO users (user_name, email, password, type, photo, register_date) VALUES ('$user_name', '$email', '$password', '$type', '$photo' , NOW());";
$result1 = $DB->query($sql);

$user_id = $DB->insert_id;
$sql = "INSERT INTO phones (user_id, phone) 
VALUES ($user_id, '$phone_num');";
$result2 = $DB->query($sql);

$DB->close();

if($result1 === TRUE && $result2 === TRUE){echo "true";}
else{echo "false";}

?>

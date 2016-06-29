<?php
require("../../DBConnection.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email';";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$row = $result->fetch_assoc();

if ($password == $row['password'])
{
$response = array("status" => "true","user_id" => $row['user_id'], "user_name" => $row['user_name'], "email"=>$row['email'], "type"=>$row['type'], "photo"=>$row['photo']);
$user_id = $row['user_id'];

$sql = "SELECT phone FROM phones WHERE user_id = $user_id;";
$result = $DB->query($sql);
if ($result->num_rows > 0)
{
$row = $result->fetch_assoc();
$response['phone_num'] = $row['phone'];
}

}

else
{
$response = array("status" => "wrong_pass");
}

}
else
{
$response = array("status" => "wrong email");
}
echo json_encode($response);
$DB->close();

?>

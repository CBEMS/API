<?php
require("../DBConnection.php");

$block_id = $_GET['block_id'];

$sql = "SELECT block_name, last_request, start_time, user_id
FROM blocks
WHERE blocks.block_id = $block_id;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$row = $result->fetch_assoc();
$block_name = $row['block_name'];
$last_request = $row['last_request'];
$start_time = $row['start_time'];
$user_id = $row['user_id'];

$jsonData = array("block_name" => $block_name, "last_request" => $last_request, "start_time" => $start_time, "user_id" => $user_id);
echo json_encode($jsonData);

}

$DB->close();
?>

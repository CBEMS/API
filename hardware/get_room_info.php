<?php
require("../DBConnection.php");

$room_id = $_GET['room_id'];

$sql = "SELECT rooms.name, rooms.block_id
FROM rooms
WHERE rooms.room_id = $room_id;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$row = $result->fetch_assoc();
$room_name = $row['name'];
$rooms_block_id = $row['block_id'];

$jsonData = array("room_name" => $room_name, "block_id" => $rooms_block_id);
echo json_encode($jsonData);

}

$DB->close();
?>

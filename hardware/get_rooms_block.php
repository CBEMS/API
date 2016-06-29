<?php
require("../DBConnection.php");

$user_id = $_GET['user_id'];
$block_id = $_GET['block_id'];

$sql = "SELECT room_id, name
FROM rooms, blocks
WHERE blocks.user_id = $user_id
AND rooms.block_id = $block_id;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$rooms_ids = array();
$rooms_names = array();

while ($row = $result->fetch_assoc())
{
$rooms_ids[] = $row['room_id'];
$rooms_names[] = $row['name'];
}

$jsonData = array("rooms_ids" => $rooms_ids, "rooms_names" => $rooms_names);
echo json_encode($jsonData);

}

$DB->close();
?>

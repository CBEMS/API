<?php
require("../DBConnection.php");

$user_id = $_GET['user_id'];
$node_id = $_GET['node_id'];

$sql = "SELECT device_id, device_name, state, rooms.room_id, blocks.block_id
FROM blocks, rooms, nodes, devices
WHERE blocks.user_id = $user_id
AND rooms.block_id = blocks.block_id
AND nodes.room_id = rooms.room_id
AND devices.node_id = $node_id
GROUP BY devices.device_id;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$devices_ids = array();
$devices_names = array();
$state = array();
$devices_room_id = array();
$devices_block_id = array();

while ($row = $result->fetch_assoc())
{
$devices_ids[] = $row['device_id'];
$devices_names[] = $row['device_name'];
$state[] = $row['state'];
$devices_room_id[] = $row['room_id'];
$devices_block_id[] = $row['block_id'];

}

$jsonData = array("devices_ids" => $devices_ids, "devices_names" => $devices_names, "state" => $state, "devices_room_id" => $devices_room_id, "devices_block_id" => $devices_block_id);
echo json_encode($jsonData);

}

$DB->close();
?>

<?php
require("../DBConnection.php");

$user_id = $_GET['user_id'];
$room_id = $_GET['room_id'];

$sql = "SELECT device_id, device_name, state, devices.node_id, rooms.room_id, blocks.block_id
FROM blocks, rooms, nodes, devices
WHERE blocks.user_id = $user_id
AND rooms.block_id = blocks.block_id
AND nodes.room_id = $room_id
AND devices.node_id = nodes.node_id
GROUP BY devices.device_id;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$devices_ids = array();
$devices_names = array();
$state = array();
$devices_node_id = array();

while ($row = $result->fetch_assoc())
{
$devices_ids[] = $row['device_id'];
$devices_names[] = $row['device_name'];
$state[] = $row['state'];
$devices_node_id[] = $row['node_id'];


}

$jsonData = array("devices_ids" => $devices_ids, "devices_names" => $devices_names, "state" => $state, "devices_node_id" => $devices_node_id);
echo json_encode($jsonData);

}

$DB->close();
?>

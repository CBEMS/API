<?php
require("../DBConnection.php");

$user_id = $_GET['user_id'];

$sql = "SELECT duration_id, durations.days, durations.start_time, durations.end_time, durations.repetition, durations.create_date, devices.device_id, devices.device_name, rooms.room_id, rooms.name, blocks.block_id, blocks.block_name
FROM blocks, rooms, nodes, devices, schedules, durations
WHERE blocks.user_id = $user_id
AND rooms.block_id = blocks.block_id
AND nodes.room_id = rooms.room_id
AND devices.node_id = nodes.node_id
AND schedules.device_id = devices.device_id
AND durations.schedule_id = schedules.schedule_id";

$result = $DB->query($sql);


if ($result->num_rows > 0)
{

$duration_id = array();
$durations_days = array();
$durations_start_time = array();
$durations_end_time = array();
$durations_repetition = array();
$durations_create_date = array();
$device_id = array();
$device_name = array();
$room_id = array();
$room_name = array();
$block_id = array();
$block_name = array();

while ($row = $result->fetch_assoc())
{
$duration_id[] = $row['duration_id'];
$durations_days[] = array($row['days']);
$durations_start_time[] = $row['start_time'];
$durations_end_time[] = $row['end_time'];
$durations_repetition[] = $row['repetition'];
$durations_create_date[] = $row['create_date'];
$device_id[] = $row['device_id'];
$device_name[] = $row['device_name'];
$room_id[] = $row['room_id'];
$room_name[] = $row['name'];
$block_id[] = $row['block_id'];
$block_name[] = $row['block_name'];
}

$jsonData = array("duration_id" => $duration_id, "durations_days" => $durations_days, "durations_start_time" => $durations_start_time, "durations_end_time" => $durations_end_time, "durations_repetition" => $durations_repetition, "durations_create_date" => $durations_create_date, "device_id" => $device_id, "device_name" => $device_name, "room_id" => $room_id, "room_name" => $room_name, "block_id" => $block_id, "block_name" => $block_name);
echo json_encode($jsonData);

}

$DB->close();
?>

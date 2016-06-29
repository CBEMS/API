<?php
require("../DBConnection.php");

$device_id = $_GET['device_id'];

$sql = "SELECT reading_id, reading_time, value, devices.device_name
FROM device_readings, devices
WHERE devices.device_id = $device_id
AND device_readings.device_id = $device_id;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$readings_ids = array();
$readings_times = array();
$readings_values = array();
$device_name;

while ($row = $result->fetch_assoc())
{
$readings_ids[] = $row['reading_id'];
$readings_times[] = $row['reading_time'];
$readings_values[] = $row['value'];
$device_name= $row['device_name'];
}

$jsonData = array("device_name" => $device_name, "readings_ids" => $readings_ids, "readings_times" => $readings_times, "readings_values" => $readings_values);
echo json_encode($jsonData);

}

$DB->close();
?>

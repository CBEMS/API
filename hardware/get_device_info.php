<?php
require("../DBConnection.php");

$device_id = $_GET['device_id'];

$sql = "SELECT device_id, device_name, state, node_id
FROM devices
WHERE devices.device_id = $device_id;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$row = $result->fetch_assoc();

$device_id = $row['device_id'];
$device_name = $row['device_name'];
$state = $row['state'];
$node_id = $row['node_id'];

$jsonData = array("device_id" => $device_id, "device_name" => $device_name, "state" => $state, "node_id" => $node_id);
echo json_encode($jsonData);

}

$DB->close();
?>

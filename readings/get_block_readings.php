<?php
require("../DBConnection.php");

$block_id = $_GET['block_id'];

$sql = "SELECT reading_id, reading_time, power_fact, active_power, voltage, current, blocks.block_name
FROM block_readings, blocks
WHERE blocks.block_id = $block_id
AND block_readings.block_id = $block_id;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$readings_ids = array();
$readings_times = array();
$readings_values = array();
$block_name;

while ($row = $result->fetch_assoc())
{
$readings_ids[] = $row['reading_id'];
$readings_times[] = $row['reading_time'];
$power_fact[] = $row['power_fact'];
$active_power[] = $row['active_power'];
$voltage[] = $row['voltage'];
$current[] = $row['current'];
$block_name= $row['block_name'];
}

$jsonData = array("block_name" => $block_name, "readings_ids" => $readings_ids, "readings_times" => $readings_times, "power_fact" => $power_fact , "active_power" => $active_power , "voltage" => $voltage , "current" => $current);
echo json_encode($jsonData);

}

$DB->close();
?>

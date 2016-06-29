<?php
require("../DBConnection.php");

$user_id = $_GET['user_id'];

$sql = "SELECT blocks.block_id, blocks.block_name, block_readings.value, MAX( block_readings.reading_time ) AS reading_time
FROM blocks, block_readings
WHERE blocks.user_id = $user_id
AND block_readings.block_id = blocks.block_id
GROUP BY block_readings.block_id;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$blocks_ids = array();
$blocks_names = array();
$blocks_readings = array();
$blocks_readings_time = array();
$user_total_consumption = 0;

while ($row = $result->fetch_assoc())
{
$blocks_ids[] = $row['block_id'];
$blocks_names[] = $row['block_name'];
$blocks_readings[] = $row['value'];
$blocks_readings_time[] = $row['reading_time'];
$user_total_consumption += $row['value'];
}

$jsonData = array("blocks_ids" => $blocks_ids, "blocks_names" => $blocks_names, "blocks_readings" => $blocks_readings, "blocks_readings_time" => $blocks_readings_time, "user_total_consumption" => $user_total_consumption);
echo json_encode($jsonData);

}


$DB->close();
?>

<?php
require("../DBConnection.php");

$user_id = $_GET['user_id'];
$block_id = $_GET['block_id'];

$sql = "SELECT blocks.block_name, block_readings.value, block_readings.reading_time
FROM blocks, block_readings
WHERE blocks.user_id = $user_id
AND blocks.block_id = $block_id
AND block_readings.block_id = blocks.block_id
AND block_readings.reading_time = (
SELECT MAX(block_readings.reading_time)
FROM blocks, block_readings
WHERE blocks.user_id = $user_id
AND blocks.block_id = $block_id
AND block_readings.block_id = blocks.block_id
);";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$row = $result->fetch_assoc();
$block_name = $row['block_name'];
$block_reading = $row['value'];
$reading_time = $row['reading_time'];

$jsonData = array("block_name" => $block_name, "block_reading" => $block_reading, "reading_time" => $reading_time);
echo json_encode($jsonData);

}

$DB->close();
?>

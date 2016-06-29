<?php
require("../DBConnection.php");

$user_id = $_GET['user_id'];

$sql = "SELECT block_readings.block_id, blocks.block_name, SUM(active_power) AS total_consumption
FROM blocks, block_readings
WHERE blocks.user_id = $user_id
AND blocks.block_id = block_readings.block_id
AND YEAR(reading_time) = YEAR(NOW())
AND MONTH(reading_time) = MONTH(NOW())
GROUP BY block_readings.block_id";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$blocks_ids = array();
$blocks_names = array();
$total_consumption = array();
$total_consumption = 0;

while ($row = $result->fetch_assoc())
{
$blocks_ids[] = $row['block_id'];
$blocks_names[] = $row['block_name'];
$blocks_consumption[] = $row['total_consumption'];
$total_consumption += $row['total_consumption'];
}

$jsonData = array("blocks_ids" => $blocks_ids, "blocks_names" => $blocks_names, "blocks_consumption" => $blocks_consumption, "total_consumtion" => $total_consumption);
echo json_encode($jsonData);

}

$DB->close();
?>

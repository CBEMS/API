<?php
require("../DBConnection.php");

$device_id = $_GET['device_id'];

$sql = "SELECT duration_id, durations.days, durations.start_time, durations.end_time, durations.repetition, durations.create_date 
FROM schedules, durations
WHERE schedules.device_id = $device_id
AND durations.schedule_id = schedules.schedule_id;";

$result = $DB->query($sql);


if ($result->num_rows > 0)
{

$durations_ids = array();
$days = array();
$start_time = array();
$end_time = array();
$repetition = array();
$create_date = array();

while ($row = $result->fetch_assoc())
{
$durations_ids[] = $row['duration_id'];
$days[] = array($row['days']);
$start_time[] = $row['start_time'];
$end_time[] = $row['end_time'];
$repetition[] = $row['repetition'];
$create_date[] = $row['create_date'];
}

$jsonData = array("durations_ids" => $durations_ids, "days" => $days, "start_time" => $start_time, "end_time" => $end_time, "repetition" => $repetition, "create_date" => $create_date);
echo json_encode($jsonData);

}

$DB->close();
?>

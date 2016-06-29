<?PHP
require("../DBConnection.php");

$JSON_data = $_POST['data'];
$data = array();
$data = json_decode( urldecode($_POST['data']), true);

$device_id = $data['device_id'];
$day = $data['day'];
$day = implode(",",$day);
$start_time = $data['start_time'];
$end_time = $data['end_time'];
$repetition = $data['repetition'];
 
$sql = "INSERT INTO schedules (device_id) VALUES ('$device_id');";
$result1 = $DB->query($sql);

$schedule_id = $DB->insert_id;

$sql = "INSERT INTO durations (days, start_time, end_time, repetition, schedule_id) 
VALUES ('$day', '$start_time', '$end_time', '$repetition', '$schedule_id');";
$result2 = $DB->query($sql);

if ($result1 === TRUE && $result2 === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();

?>

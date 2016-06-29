<?PHP
require("../DBConnection.php");

$device_id = $_GET['device_id'];
$reading = $_GET['reading'];

$sql = "INSERT INTO device_readings (device_id, reading_time, value)
VALUES ('$device_id', NOW(), '$reading');";

$result = $DB->query($sql);

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();
?>

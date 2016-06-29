<?PHP
require("../DBConnection.php");

$block_id = $_GET['block_id'];
$power_fact = $_GET['power_fact'];
$active_power = $_GET['active_power'];
$voltage = $_GET['voltage'];
$current = $_GET['current'];

$sql = "INSERT INTO block_readings (block_id, reading_time, power_fact, active_power, voltage, current)
VALUES ('$block_id', NOW(), '$power_fact', '$active_power', '$voltage', '$current');";

$result = $DB->query($sql);

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();
?>

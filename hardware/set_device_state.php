<?PHP
require("../DBConnection.php");

$device_id = $_GET['device_id'];
$state = $_GET['state'];

$sql = "UPDATE `devices`
SET `state` = '$state'
WHERE `devices`.`device_id` = $device_id;";

$result = $DB->query($sql);

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();
?>

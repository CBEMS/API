<?PHP
require("../DBConnection.php");

$device_id = $_GET['device_id'];
$message = $_GET['message'];


$sql = "SELECT devices.node_id
FROM devices
WHERE device_id = $device_id;";
$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$row = $result->fetch_assoc();
$node_id = $row['node_id'];

$sql = "INSERT INTO messages (node_id, message, state)
VALUES ('$node_id', '$message', 'not sent');";
$result = $DB->query($sql);

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }
}

$DB->close();
?>

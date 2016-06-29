<?PHP
require("../DBConnection.php");

$node_id = $_GET['node_id'];
$device_name = $_GET['device_name'];
$state = $_GET['state'];

if($node_id != 0)
{
$sql = "INSERT INTO devices (node_id, device_name, state)
VALUES ($node_id, '$device_name', '$state');";

$result = $DB->query($sql);
}

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();
?>

<?PHP
require("../DBConnection.php");

$room_id = $_GET['room_id'];
$ip_address = $_GET['ip_address'];
$connected = $_GET['connected'];

if($room_id != 0)
{
$sql = "INSERT INTO nodes (room_id, ip_address, connected, last_request)
VALUES ($room_id, '$ip_address', 'true', NOW());";

$result = $DB->query($sql);
}

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();
?>

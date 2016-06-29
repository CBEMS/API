<?PHP
require("../DBConnection.php");

$block_id = $_GET['block_id'];
$room_name = $_GET['room_name'];

if($block_id != 0)
{
$sql = "INSERT INTO rooms (block_id, name)
VALUES ($block_id, '$room_name');";

$result = $DB->query($sql);
}

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();
?>

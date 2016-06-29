<?PHP
require("../DBConnection.php");

$node_id = $_GET['node_id'];
$message = $_GET['message'];

$sql = "INSERT INTO messages (node_id, message, state)
VALUES ('$node_id', '$message', 'not sent');";

$result = $DB->query($sql);

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();
?>

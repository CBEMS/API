<?PHP
require("../DBConnection.php");

$user_id = $_GET['user_id'];
$content = $_GET['content'];

$sql = "INSERT INTO notifications (user_id, notification_time, content)
VALUES ('$user_id', NOW(), '$content');";

$result = $DB->query($sql);

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();
?>

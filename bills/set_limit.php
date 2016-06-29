<?PHP
require("../DBConnection.php");

$user_id = $_GET['user_id'];
$month = $_GET['month'];
$new_limit = $_GET['new_limit'];

$sql = "UPDATE `bills`
SET `limit` = '$new_limit'
WHERE `bills`.`user_id` = $user_id
AND `bills`.`month` = '$month';";

$result = $DB->query($sql);

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();
?>

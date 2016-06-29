<?PHP
require("../DBConnection.php");

$user_id = $_GET['user_id'];
$month = $_GET['month'];
$new_kwh_cost = $_GET['new_kwh_cost'];

$sql = "UPDATE `bills`
SET `KWH_cost` = '$new_kwh_cost'
WHERE `bills`.`user_id` = $user_id
AND `bills`.`month` = '$month';";

$result = $DB->query($sql);

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();
?>

<?PHP
require("../DBConnection.php");

$user_id = $_GET['user_id'];
$month = $_GET['month'];
$value = $_GET['value'];
$kwh_cost = $_GET['kwh_cost'];
$limit = $_GET['limit'];

if($user_id != 0)
{
$sql = "INSERT INTO bills (user_id, month, value, KWH_cost, `limit`)
VALUES ($user_id, '$month', '$value', '$kwh_cost', '$limit');";

$result = $DB->query($sql);
}

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();
?>

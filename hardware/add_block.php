<?PHP
require("../DBConnection.php");

$user_id = $_GET['user_id'];
$block_name = $_GET['block_name'];

if($user_id != 0)
{
$sql = "INSERT INTO blocks (user_id, block_name)
VALUES ($user_id, '$block_name');";

$result = $DB->query($sql);
}

if ($result === TRUE) { echo "done"; }
else { echo "wrong"; }

$DB->close();
?>

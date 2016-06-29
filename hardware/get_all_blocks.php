<?php
require("../DBConnection.php");

$user_id = $_GET['user_id'];

$sql = "SELECT block_id, block_name FROM blocks WHERE user_id = '$user_id';";

$result = $DB->query($sql);


if ($result->num_rows > 0)
{

$blocks_ids = array();
$blocks_names = array();
while ($row = $result->fetch_assoc())
{
$blocks_ids[] = $row['block_id'];
$blocks_names[] = $row['block_name'];
}

$jsonData = array("blocks_ids" => $blocks_ids, "blocks_names" => $blocks_names);
echo json_encode($jsonData);

}

$DB->close();
?>

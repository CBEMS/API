<?php
require("../DBConnection.php");

$user_id = $_GET['user_id'];
$room_id = $_GET['room_id'];

$sql = "SELECT node_id, ip_address, connected, last_request
FROM nodes, rooms, blocks
WHERE blocks.user_id = $user_id
AND rooms.block_id = blocks.block_id
AND nodes.room_id = $room_id
GROUP BY nodes.node_id;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$nodes_ids = array();
$nodes_ips = array();
$connected = array();
$last_request = array();

while ($row = $result->fetch_assoc())
{
$nodes_ids[] = $row['node_id'];
$nodes_ips[] = $row['ip_address'];
$connected[] = $row['connected'];
$last_request[] = $row['last_request'];
}

$jsonData = array("nodes_ids" => $nodes_ids,"nodes_ips" => $nodes_ips, "connected" => $connected, "last_request" => $last_request);
echo json_encode($jsonData);

}

$DB->close();
?>

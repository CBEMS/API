<?php
require("../DBConnection.php");

$node_id = $_GET['node_id'];

$sql = "SELECT node_id, ip_address, connected, last_request, room_id
FROM nodes
WHERE nodes.node_id = $node_id;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$row = $result->fetch_assoc();

$node_id = $row['node_id'];
$ip_address = $row['ip_address'];
$connected = $row['connected'];
$last_request = $row['last_request'];
$room_id = $row['room_id'];

$jsonData = array("node_id" => $node_id, "ip_address" => $ip_address, "connected" => $connected, "last_request" => $last_request, "room_id" => $room_id);
echo json_encode($jsonData);

}

$DB->close();
?>

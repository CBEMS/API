<?php
require("../DBConnection.php");

$node_id = $_GET['node_id'];

$sql = "SELECT message_id, message
FROM messages
WHERE node_id = $node_id
AND state = 'not sent'
LIMIT 1;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{
$row = $result->fetch_assoc();
echo $row['message'];

$message_id = $row['message_id'];
$sql = "UPDATE messages
SET state = 'sent'
WHERE message_id = $message_id;";
$DB->query($sql);
}

$DB->close();
?>

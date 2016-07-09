<?php
require("../DBConnection.php");

$user_id = $_GET['user_id'];

$sql = "SELECT notification_id, notification_time, content
FROM notifications
WHERE notifications.user_id = $user_id;";

$result = $DB->query($sql);

if ($result->num_rows > 0)
{

$notifications_ids = array();
$notifications_times = array();
$content = array();

while ($row = $result->fetch_assoc())
{
$notifications_ids[] = $row['notification_id'];
$notifications_times[] = $row['notification_time'];
$content[] = $row['content'];
}

$jsonData = array("notifications_ids" => $notifications_ids, "notifications_times" => $notifications_times, "content" => $content);
echo json_encode($jsonData);

}

$DB->close();
?>

<?php
require("../DBConnection.php");

$user_id = $_GET['user_id'];

$sql = "SELECT bill_id, month, value, KWH_cost, `limit`
FROM bills
WHERE bills.user_id = $user_id;";

$result = $DB->query($sql);


if ($result->num_rows > 0)
{

$bills_ids = array();
$bills_months = array();
$bills_values = array();
$KWH_cost = array();
$bills_limits = array();

while ($row = $result->fetch_assoc())
{
$bills_ids[] = $row['bill_id'];
$bills_months[] = $row['month'];
$bills_values[] = $row['value'];
$KWH_cost[] = $row['KWH_cost'];
$bills_limits[] = $row['limit'];
}

$jsonData = array("bills_ids" => $bills_ids, "bills_months" => $bills_months, "bills_values" => $bills_values, "KWH_Cost" => $KWH_cost, "bills_limits" => $bills_limits);
echo json_encode($jsonData);

}

$DB->close();
?>

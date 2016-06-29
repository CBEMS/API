<?php
$servername = "mysql4.000webhost.com";
$username = "a9882281_tester";
$password = "tester123";
$mysql_database = "a9882281_dbtest";
// Create connection
$DB =mysqli_connect($servername, $username, $password, $mysql_database);
// Check connection
if (!$DB) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 

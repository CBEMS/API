<?php
$servername = "localhost";
$username = "iotuser";
$password = "iotpassword";
$mysql_database = "iotDBv1";
// Create connection
$DB =mysqli_connect($servername, $username, $password, $mysql_database);
// Check connection
if (!$DB) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 

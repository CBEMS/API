<?php
require("../../DBConnection.php");

$email = $_GET['email'];

$sql = "SELECT * FROM users WHERE email = '$email';";

$result = $DB->query($sql);

if ($result->num_rows > 0) {echo "yes";}
else {echo "no";}

$DB->close();

?>

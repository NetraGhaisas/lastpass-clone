<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "lastpass";
$db_port = 3306;

// Create Connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name,$db_port);

// Check Connection
if($conn->connect_error) {
 die("connection failed");
}
?>
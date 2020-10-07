<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "lastpass";
$db_port = 3306;


$remote_user = "ukPa7mHSDr";
$remote_name = "ukPa7mHSDr";
$remote_password = "PEvnVlQSOw";
$remote_host = "remotemysql.com";
$remote_port = 3306;
// Create Connection
$conn = new mysqli($remote_host, $remote_user, $remote_password, $remote_name,$remote_port);
// $conn = new mysqli($db_host, $db_user, $db_password, $db_name,$db_port);

// Check Connection
if($conn->connect_error) {
 die("connection failed");
}
?>
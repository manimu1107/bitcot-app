<?php

$servername = "bitcotdb1.cvk8cgoimuvr.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "admin1234";
$database = "bitcotdb1";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>


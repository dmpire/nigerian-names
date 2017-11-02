<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "nigerian_names";
global $conn;
// Create connection. conn here stands for connection.
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

?>
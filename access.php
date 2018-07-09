<?php
$servername = "den1.mysql5.gear.host";
$username = "gableon01";
$password = $_GET['pass'];
$database = "gableon01";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$results = $conn->query("SELECT * FROM messages");
?>
